<div class="card sticky-top" style="top:30px">
    <div class="list-group list-group-flush" id="useradd-sidenav">
        <?php if(\Auth::user()->type == 'super admin'): ?>
        <a href="<?php echo e(route('transaction.index')); ?>" class="list-group-item list-group-item-action border-0 <?php echo e(request()->is('transaction*') ? 'active' : ''); ?>"><?php echo e(__('Transaction')); ?>

            <div class="float-end"><i class="ti ti-chevron-right"></i></div>
        </a>
        <a href="<?php echo e(route('payout_request.index')); ?>" class="list-group-item list-group-item-action border-0 <?php echo e(request()->is('payout_request*') ? 'active' : ''); ?>"><?php echo e(__('Payout Request')); ?>

            <div class="float-end"><i class="ti ti-chevron-right"></i></div>
        </a>
        <a href="<?php echo e(route('referral_setting.index')); ?>" class="list-group-item list-group-item-action border-0 <?php echo e(request()->is('referral_setting*') ? 'active' : ''); ?>"><?php echo e(__('Settings')); ?>

            <div class="float-end"><i class="ti ti-chevron-right"></i></div>
        </a>
        <?php endif; ?>
        <?php if(\Auth::user()->type == 'owner'): ?>
        <a href="<?php echo e(route('referral_setting.guideline')); ?>" class="list-group-item list-group-item-action border-0 <?php echo e(request()->is('guideline*') ? 'active' : ''); ?>"><?php echo e(__('Guideline')); ?>

            <div class="float-end"><i class="ti ti-chevron-right"></i></div>
        </a>
        <a href="<?php echo e(route('referral_transaction.company_index')); ?>" class="list-group-item list-group-item-action border-0 <?php echo e(request()->is('referral_transaction*') ? 'active' : ''); ?>"><?php echo e(__('Referral Transaction')); ?>

            <div class="float-end"><i class="ti ti-chevron-right"></i></div>
        </a>
        <a href="<?php echo e(route('company_payout')); ?>" class="list-group-item list-group-item-action border-0 <?php echo e(request()->is('company_payout*') ? 'active' : ''); ?>"><?php echo e(__('Payout')); ?>

            <div class="float-end"><i class="ti ti-chevron-right"></i></div>
        </a>
        <?php endif; ?>
    </div>
</div><?php /**PATH /home/u265718333/domains/zampisoft.com/public_html/ZampiCrm/resources/views/layouts/referral_setup.blade.php ENDPATH**/ ?>