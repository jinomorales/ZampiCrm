<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Utility;
use App\Models\User;
use App\Models\Plan;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LoginDetail;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Constructor to handle installation check.
     */
    public function __construct()
    {
        if (!file_exists(storage_path('installed'))) {
            header('Location: install');
            exit;
        }
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && $user->type != 'company' && $user->type != 'super admin') {
            $companyUser = User::where('created_by', $user->id)->first();
            if ($user->is_enable_login == 0 || ($companyUser && $companyUser->is_enable_login == 0)) {
                return redirect()->back()->with('status', __('Your Account is disabled, please contact your Administrator.'));
            }
        }

        if ($user && isset($user->is_active) && $user->is_active == 0) {
            return redirect()->back()->with('status', 'User is not Active. Please Activate User.');
        }

        if ($user && $user->is_disable == 0 && $user->type != 'company' && $user->type != 'super admin') {
            return redirect()->back()->with('status', __('Your Account is disabled, please contact your Administrator.'));
        }

        if ($user && $user->is_enable_login == 0 && $user->type != 'super admin') {
            return redirect()->back()->with('status', __('Your Account is disabled by the company.'));
        }

        $validation = [];
        if (Utility::getValByName('recaptcha_module') == 'yes') {
            $validation['g-recaptcha-response'] = 'required';
        }
        $this->validate($request, $validation);

        $request->authenticate();
        $request->session()->regenerate();

        $setting = Utility::settings();
        $user = Auth::user();

        if (Auth::user()->type == 'company') {
            $user = User::find(Auth::user()->id);
            $plan = Plan::first();
            if ($plan) {
                $datetime1 = new \DateTime(!empty($user->trial_expire_date) ? $user->trial_expire_date : $user->plan_expire_date);
                $datetime2 = new \DateTime(date('Y-m-d'));
                $interval = $datetime2->diff($datetime1);
                $days = $interval->format('%r%a');

                if ($days <= 0) {
                    $user->assignPlan($plan->id);
                    $user->plan_expire_date = null;
                    $user->trial_expire_date = null;
                    $user->save();

                    return redirect()->route('plans.index')->with('error', __('Your Plan is expired.'));
                }
            }
        }

        $ip = $_SERVER['REMOTE_ADDR']; // your ip address here
        $query = @unserialize(file_get_contents('http://ip-api.com/php/' . $ip));
        $whichbrowser = new \WhichBrowser\Parser($_SERVER['HTTP_USER_AGENT']);
        if ($whichbrowser->device->type == 'bot') {
            return;
        }
        $referrer = isset($_SERVER['HTTP_REFERER']) ? parse_url($_SERVER['HTTP_REFERER']) : null;
        $query['browser_name'] = $whichbrowser->browser->name ?? null;
        $query['os_name'] = $whichbrowser->os->name ?? null;
        $query['browser_language'] = isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? mb_substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) : null;
        $query['device_type'] = get_device_type($_SERVER['HTTP_USER_AGENT']);
        $query['referrer_host'] = !empty($referrer['host']) ? $referrer['host'] : null;
        $query['referrer_path'] = !empty($referrer['path']) ? $referrer['path'] : null;

        isset($query['timezone']) ? date_default_timezone_set($query['timezone']) : '';

        $json = json_encode($query);
        $user = Auth::user();

        if ($user->type != 'owner' && $user->type != 'super admin') {
            LoginDetail::create([
                'user_id' => $user->id,
                'ip' => $ip,
                'date' => now(),
                'details' => $json,
                'created_by' => Auth::user()->creatorId(),
            ]);
        }

        if ($user->delete_status == 1) {
            auth()->logout();
        }

        if ($user->type == 'Owner') {
            $plan = Plan::find($user->plan);
            if ($plan && $plan->duration != 'lifetime') {
                $datetime1 = new \DateTime($user->plan_expire_date);
                $datetime2 = new \DateTime(date('Y-m-d'));
                $interval = $datetime2->diff($datetime1);
                $days = $interval->format('%r%a');
                if ($days <= 0) {
                    $user->assignPlan(1);

                    return redirect()->intended(RouteServiceProvider::HOME)->with('error', __('Your Plan is expired.'));
                }
            }
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function showLoginForm($lang = '')
    {
        if (empty($lang)) {
            $lang = Utility::getValByName('default_language');
        }

        \App::setLocale($lang);

        return view('auth.login', compact('lang'));
    }

    public function showLinkRequestForm($lang = '')
    {
        if (empty($lang)) {
            $lang = Utility::getValByName('default_language');
        }

        \App::setLocale($lang);

        return view('auth.forgot-password', compact('lang'));
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function showVerification($lang = 'en')
    {
        if ($lang == 'en') {
            $lang = env('DEFAULT_ADMIN_LANG', 'en');
        }

        \App::setLocale($lang);

        return view('auth.verify-email', compact('lang'));
    }
}

function get_device_type($user_agent)
{
    $mobile_regex = '/(?:phone|windows\s+phone|ipod|blackberry|(?:android|bb\d+|meego|silk|googlebot) .+? mobile|palm|windows\s+ce|opera mini|avantgo|mobilesafari|docomo)/i';
    $tablet_regex = '/(?:ipad|playbook|(?:android|bb\d+|meego|silk)(?! .+? mobile))/i';
    if (preg_match($mobile_regex, $user_agent)) {
        return 'mobile';
    } elseif (preg_match($tablet_regex, $user_agent)) {
        return 'tablet';
    } else {
        return 'desktop';
    }
}
