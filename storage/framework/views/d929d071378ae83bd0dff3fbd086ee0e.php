<?php
    $setting = App\Models\Utility::colorset();

?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="<?php echo e($setting['SITE_RTL'] == 'on' ? 'rtl' : ''); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <?php if(env('SITE_RTL') == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-rtl.css')); ?>">
    <?php endif; ?>
    <style type="text/css">
        :root {
            --theme-color: #6676ef;
            --white: #ffffff;
            --black: #000000;
        }

        body {
            font-family: 'Lato', sans-serif;
        }

        p,
        li,
        ul,
        ol {
            margin: 0;
            padding: 0;
            list-style: none;
            line-height: 1.5;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table tr th {
            padding: 0.75rem;
            text-align: left;
        }

        table tr td {
            padding: 0.75rem;
            text-align: left;
        }

        table th small {
            display: block;
            font-size: 12px;
        }

        .invoice-preview-main {
            max-width: 700px;
            width: 100%;
            margin: 0 auto;
            background: #ffff;
            box-shadow: 0 0 10px #ddd;
        }

        .invoice-logo {
            max-width: 200px;
            width: 100%;
        }

        .invoice-header table td {
            padding: 15px 30px;
        }

        .text-right {
            text-align: right;
        }

        .no-space tr td {
            padding: 0;
        }

        .vertical-align-top td {
            vertical-align: top;
        }

        .view-qrcode {
            max-width: 114px;
            height: 114px;
            margin-left: auto;
            margin-top: 15px;
            background: var(--white);
        }

        .view-qrcode img {
            width: 100%;
            height: 100%;
        }

        .invoice-body {
            padding: 30px 25px 0;
        }

        table.add-border tr {
            border-top: 1px solid var(--theme-color);
        }

        tfoot tr:first-of-type {
            border-bottom: 1px solid var(--theme-color);
        }

        .total-table tr:first-of-type td {
            padding-top: 0;
        }

        .total-table tr:first-of-type {
            border-top: 0;
        }

        .sub-total {
            padding-right: 0;
            padding-left: 0;
        }

        .border-0 {
            border: none !important;
        }

        .invoice-summary td,
        .invoice-summary th {
            font-size: 13px;
            font-weight: 600;
        }

        .total-table td:last-of-type {
            width: 146px;
        }

        .invoice-footer {
            padding: 15px 20px;
        }

        .itm-description td {
            padding-top: 0;
        }

        html[dir="rtl"] table tr td,
        html[dir="rtl"] table tr th {
            text-align: right;
        }

        html[dir="rtl"] .text-right {
            text-align: left;
        }

        html[dir="rtl"] .view-qrcode {
            margin-left: 0;
            margin-right: auto;
        }

        p:not(:last-of-type) {
            margin-bottom: 15px;
        }

        .invoice-summary p {
            margin-bottom: 0;
        }
    </style>
</head>

<body>
    <div class="invoice-preview-main" id="boxes">
        <div class="invoice-header">
            <table class="vertical-align-top">
                <tbody>
                    <tr>
                        <td>
                            <h3
                                style=" display: block; text-transform: uppercase; font-size: 30px; font-weight: bold; padding: 15px; background: <?php echo e($color); ?>;color:<?php echo e($font_color); ?> ">
                                INVOICE</h3>
                            <div class="view-qrcode" style="margin-left: 0; margin-bottom: 15px;">
                                <?php echo DNS2D::getBarcodeHTML(
                                    route('pay.invoice', \Illuminate\Support\Facades\Crypt::encrypt($invoice->id)),
                                    'QRCODE',
                                    2,
                                    2,
                                ); ?>

                            </div>
                            <table class="no-space">
                                <tbody>
                                    <tr>
                                        <td>Number: </td>
                                        <td class="text-right">
                                            <?php echo e(\App\Models\Utility::invoiceNumberFormat($settings, $invoice->invoice)); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Issue Date:</td>
                                        <td class="text-right">
                                            <?php echo e(\App\Models\Utility::dateFormat($settings, $invoice->issue_date)); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>

                        <td class="text-right">
                            <img src="<?php echo e($img); ?>" style="max-width: 250px" />
                            <p style="margin-top: 15px;">
                                <strong data-v-f2a183a6=""><?php echo e(__('From')); ?>:</strong>
                                <?php if($settings['company_name']): ?>
                                    <?php echo e($settings['company_name']); ?>

                                <?php endif; ?>
                                <br>
                                <?php if($settings['company_address']): ?>
                                    <?php echo e($settings['company_address']); ?>

                                <?php endif; ?>
                                <?php if($settings['company_city']): ?>
                                    <br> <?php echo e($settings['company_city']); ?>,
                                <?php endif; ?>
                                <?php if($settings['company_state']): ?>
                                    <?php echo e($settings['company_state']); ?>

                                <?php endif; ?>
                                <?php if($settings['company_zipcode']): ?>
                                    - <?php echo e($settings['company_zipcode']); ?>

                                <?php endif; ?>
                                <?php if($settings['company_country']): ?>
                                    <br><?php echo e($settings['company_country']); ?>

                                <?php endif; ?>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="invoice-body">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <strong style="margin-bottom: 10px; display:block;">Bill To:</strong>
                            <p>
                                <?php echo e(!empty($user->name) ? $user->name : ''); ?><br>
                                <?php echo e(!empty($user->email) ? $user->email : ''); ?><br>
                                <?php echo e(!empty($user->mobile) ? $user->mobile : ''); ?><br>
                                <?php echo e(!empty($user->bill_address) ? $user->bill_address : ''); ?><br>
                                <?php echo e(!empty($user->bill_zip) ? $user->bill_zip : ''); ?><br>
                                <?php echo e(!empty($user->bill_city) ? $user->bill_city : '' . ''); ?>

                                <?php echo e(!empty($user->bill_state) ? $user->bill_state : ''); ?>

                                <?php echo e(!empty($user->bill_country) ? $user->bill_country : ''); ?>

                            </p>
                        </td>
                        <?php if($settings['shipping_display']=='on'): ?>
                        <td class="text-right">
                            <strong style="margin-bottom: 10px; display:block;">Ship To:</strong>
                            <p>
                                <?php echo e(!empty($user->name) ? $user->name : ''); ?><br>
                                <?php echo e(!empty($user->email) ? $user->email : ''); ?><br>
                                <?php echo e(!empty($user->mobile) ? $user->mobile : ''); ?><br>
                                <?php echo e(!empty($user->address) ? $user->address : ''); ?><br>
                                <?php echo e(!empty($user->zip) ? $user->zip : ''); ?><br>
                                <?php echo e(!empty($user->city) ? $user->city : '' . ', '); ?>,<?php echo e(!empty($user->state) ? $user->state : ''); ?>,<?php echo e(!empty($user->country) ? $user->country : ''); ?>

                            </p>
                        </td>
                        <?php endif; ?>
                    </tr>
                </tbody>
            </table>
            <table class="add-border invoice-summary" style="margin-top: 30px;">
                <thead style="background: <?php echo e($color); ?>;color:<?php echo e($font_color); ?>">
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Rate</th>
                        <th>Tax (%)</th>
                        <th>Discount</th>
                        <th>Price <small>before tax & discount</small></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($invoice->items) && count($invoice->items) > 0): ?>
                        <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr style="border-bottom:1px solid <?php echo e($color); ?>;">
                                <td><?php echo e($item->name); ?></td>
                                <td><?php echo e($item->quantity); ?></td>
                                <td><?php echo e(\App\Models\Utility::priceFormat($settings, $item->price)); ?></td>
                                <td>
                                    <?php $__currentLoopData = $item->itemTax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span><?php echo e($taxes['name']); ?></span> <span>(<?php echo e($taxes['rate']); ?>)</span>
                                        <span><?php echo e($taxes['price']); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <?php if($item->discount != 0): ?>
                                    <td><?php echo e(\App\Models\Utility::priceFormat($settings, $item->discount)); ?></td>
                                <?php else: ?>
                                    <td>-</td>
                                <?php endif; ?>
                                <td><?php echo e(\App\Models\Utility::priceFormat($settings, $item->price * $item->quantity)); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                    <?php endif; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td>Total</td>
                        <td><?php echo e($invoice->totalQuantity); ?></td>
                        <td><?php echo e(\App\Models\Utility::priceFormat($settings, $invoice->totalRate)); ?></td>
                        <td><?php echo e(\App\Models\Utility::priceFormat($settings, $invoice->totalTaxPrice)); ?></td>
                        <?php if($invoice->discount_apply == 1): ?>
                            <td><?php echo e(\App\Models\Utility::priceFormat($settings, $invoice->totalDiscount)); ?></td>
                        <?php else: ?>
                            <td>-</td>
                        <?php endif; ?>
                        <td><?php echo e(\App\Models\Utility::priceFormat($settings, $invoice->getSubTotal())); ?></td>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                        <td colspan="2" class="sub-total">
                            <table class="total-table">
                                <?php if($invoice->discount_apply == 1): ?>
                                    <?php if($invoice->getTotalDiscount()): ?>
                                        <tr>
                                            <td>Discount :</td>
                                            <td><?php echo e(\App\Models\Utility::priceFormat($settings, $invoice->getTotalDiscount())); ?>

                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if(!empty($invoice->taxesData)): ?>
                                    <?php $__currentLoopData = $invoice->taxesData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxName => $taxPrice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($taxName); ?> :</td>
                                            <td><?php echo e(\App\Models\Utility::priceFormat($settings, $taxPrice)); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <tr>
                                    <td>Total:</td>
                                    <td><?php echo e(\App\Models\Utility::priceFormat($settings, $invoice->getSubTotal() - $invoice->getTotalDiscount() + $invoice->getTotalTax())); ?>

                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </tfoot>
                <div class="d-header-50">
                    <p>
                        <?php echo e($settings['footer_title']); ?><br>
                        <?php echo e($settings['footer_notes']); ?>

                    </p>
                </div>
        </div>
    </div>
    <?php if(!isset($preview)): ?>
        <?php echo $__env->make('invoice.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</body>

</html>
<?php /**PATH /home/u265718333/domains/zampisoft.com/public_html/ZampiCrm/resources/views/invoice/templates/template5.blade.php ENDPATH**/ ?>