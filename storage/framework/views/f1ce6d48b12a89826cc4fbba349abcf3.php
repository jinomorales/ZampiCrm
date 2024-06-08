<div class="row">
    <div class="col-lg-12">

            <div class="">
                <dl class="row">
                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('Name')); ?></span></dt>
                    <dd class="col-md-7"><span class="text-md"><?php echo e($campaign->name); ?></span></dd>


                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('Status')); ?></span></dt>
                    <dd class="col-md-7">
                        <?php if($campaign->status == 0): ?>
                            <span class="badge bg-warning p-2 px-3 rounded"><?php echo e(__(\App\Models\Campaign::$status[$campaign->status])); ?></span>
                        <?php elseif($campaign->status == 1): ?>
                            <span class="badge bg-success p-2 px-3 rounded"><?php echo e(__(\App\Models\Campaign::$status[$campaign->status])); ?></span>
                        <?php elseif($campaign->status == 2): ?>
                            <span class="badge bg-danger p-2 px-3 rounded"><?php echo e(__(\App\Models\Campaign::$status[$campaign->status])); ?></span>
                        <?php elseif($campaign->status == 3): ?>
                            <span class="badge bg-info p-2 px-3 rounded"><?php echo e(__(\App\Models\Campaign::$status[$campaign->status])); ?></span>
                        <?php endif; ?>
                    </dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('Type')); ?></span></dt>
                    <dd class="col-md-7"><span class="text-md"><?php echo e($campaign->types->name); ?></span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('Budget')); ?></span></dt>
                    <dd class="col-md-7"><span class="text-md"><?php echo e(\Auth::user()->priceFormat($campaign->budget)); ?></span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('Start Date')); ?></span></dt>
                    <dd class="col-md-7"><span class="text-md"><?php echo e(\Auth::user()->dateFormat($campaign->start_date)); ?></span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('End Date')); ?></span></dt>
                    <dd class="col-md-7"><span class="text-md"><?php echo e(\Auth::user()->dateFormat($campaign->end_date)); ?></span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('Target Lists')); ?></span></dt>
                    <dd class="col-md-7"><span class="text-md"><?php echo e($campaign->target_lists->name); ?></span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('Excluding Target Lists')); ?></span></dt>
                    <dd class="col-md-7"><span class="text-md"><?php echo e(!empty($campaign->target_lists)?$campaign->target_lists->name:'-'); ?></span></dd>


                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('Description')); ?></span></dt>
                    <dd class="col-md-7"><span class="text-md"><?php echo e($campaign->description); ?></span></dd>

                    <dt class="col-sm-5"><span class="h6 text-sm mb-0"><?php echo e(__('Assigned User')); ?></span></dt>
                    <dd class="col-sm-7"><span class="text-sm"><?php echo e(!empty($campaign->assign_user)?$campaign->assign_user->name:''); ?></span></dd>

                    <dt class="col-sm-5"><span class="h6 text-sm mb-0"><?php echo e(__('Created')); ?></span></dt>
                    <dd class="col-sm-7"><span class="text-sm"><?php echo e(\Auth::user()->dateFormat($campaign->created_at)); ?></span></dd>

                </dl>
            </div>

    </div>

    <div class="w-100 text-end pr-2">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Campaign')): ?>
        <div class="action-btn bg-info ms-2">
            <a href="<?php echo e(route('campaign.edit',$campaign->id)); ?>" class="mx-3 btn btn-sm d-inline-flex align-items-center text-white "data-bs-toggle="tooltip" data-title="<?php echo e(__('Campaign Edit')); ?>" title="<?php echo e(__('Edit')); ?>"><i class="ti ti-edit"></i>
            </a>
        </div>

        <?php endif; ?>
    </div>
</div>

<?php /**PATH /home/u265718333/domains/zampisoft.com/public_html/ZampiCrm/resources/views/campaign/view.blade.php ENDPATH**/ ?>