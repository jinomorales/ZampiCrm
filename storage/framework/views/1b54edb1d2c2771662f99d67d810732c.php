<?php
$settings = Utility::settings();
?>

<?php $__env->startSection('title'); ?>
<?php echo e(__('Referral Program')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
<li class="breadcrumb-item"><?php echo e(__('Referral Program')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>
<script>

    $(document).ready(function() {
        // Attach a click event handler to an element with id "myButton"    
        $('.cp_link').on('click', function() {
            var value = $(this).attr('data-link');
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(value).select();
            document.execCommand("copy");
            $temp.remove();
                show_toastr('Success', '<?php echo e(__('Link Copy on Clipboard')); ?>', 'success')
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-3">
        <?php echo $__env->make('layouts.referral_setup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="col-9">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-lg-10 col-md-10 col-sm-10">
                        <h5><?php echo e(__('Guideline')); ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="border p-3">
                                <h4><?php echo e(__('Refer ')); ?><?php echo e(env('APP_NAME')); ?><?php echo e(__(' and earn')); ?> <?php echo e(isset($settings['site_currency_symbol']) ? $settings['site_currency_symbol'] : '$'); ?> <?php echo e(isset($referralSettings->minimum_amount) ? $referralSettings->minimum_amount : ''); ?> <?php echo e(__('per paid signup!')); ?></h4>
                                <p><?php echo isset($referralSettings->guidelines) ? $referralSettings->guidelines : ''; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 mt-5">
                        <h4 class="text-center"><?php echo e(__('Share Your Link')); ?></h4>
                        <div class="d-flex justify-content-between">
                            <a href="#!" class="btn btn-sm btn-light-primary w-100 cp_link" data-link="<?php echo e(route('register', ['ref_id' => \Auth::user()->referral_code])); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Click to copy business link">
                                <?php echo e(route('register', ['ref' => \Auth::user()->referral_code])); ?>

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy ms-1">
                                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                    <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <?php if(isset($referralSettings) && $referralSettings->is_referral_enabled == 'off' || (empty($referralSettings))): ?>
                    <h6 class="text-end text-danger text-md mt-2"><?php echo e(__('Note : super admin has disabled the referral program.')); ?></h6>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u265718333/domains/zampisoft.com/public_html/ZampiCrm/resources/views/referral_setting/guideline.blade.php ENDPATH**/ ?>