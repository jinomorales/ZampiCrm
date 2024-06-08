<?php $__env->startSection('page-title'); ?>
<?php echo e(__('Referral Program')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<?php echo e(__('Referral Program')); ?>

<?php $__env->stopSection(); ?>
<?php
$payment = App\Models\Utility::set_payment_settings();
?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
<li class="breadcrumb-item"><?php echo e(__('Referral Program')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-3">
        <?php echo $__env->make('layouts.referral_setup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="col-9">

        <div class="card">
            <div class="card-header">
                <h5><?php echo e(__('Transaction')); ?></h5>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col"><?php echo e(__('#')); ?></th>
                                <th scope="col"><?php echo e(__('Company Name')); ?></th>
                                <th scope="col"><?php echo e(__('Referral Company Name')); ?></th>
                                <th scope="col"><?php echo e(__('Plan Name')); ?></th>
                                <th scope="col"><?php echo e(__('Plan Price')); ?></th>
                                <th scope="col"><?php echo e(__('Commission(%)')); ?></th>
                                <th scope="col"><?php echo e(__('Commission Amount')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $key = 1 
                        ?>
                            <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td><?php echo e($key++); ?></td>
                                <td><?php echo e(isset($transaction->ref_company_name) ? $transaction->ref_company_name->name : ''); ?></td>
                                <td><?php echo e(isset($transaction->company_name) ? $transaction->company_name->name : ''); ?></td>
                                <td><?php echo e(isset($transaction->plan_name) ? $transaction->plan_name->name : ''); ?></td>
                                <td><?php echo e(isset($payment['currency_symbol']) ? $payment['currency_symbol'] : '$'); ?> <?php echo e(isset($transaction->plan_price) ? $transaction->plan_price : ''); ?></td>
                                <td><?php echo e(isset($transaction->commission) ? $transaction->commission : ''); ?></td>
                                <td><?php echo e(isset($payment['currency_symbol']) ? $payment['currency_symbol'] : '$'); ?> <?php echo e(isset($transaction->amount) ? $transaction->amount : ''); ?></td>

                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u265718333/domains/zampisoft.com/public_html/ZampiCrm/resources/views/transaction/index.blade.php ENDPATH**/ ?>