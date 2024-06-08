<div class="row">
    <div class="col-lg-12">

            <div class="">
                <dl class="row">
                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('Name')); ?></span></dt>
                    <dd class="col-md-5"><span class="text-md"><?php echo e($document->name); ?></span></dd>


                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('Status')); ?></span></dt>
                    <dd class="col-md-5">
                        <?php if($document->status == 0): ?>
                            <span class="badge bg-success p-2 px-3 rounded"><?php echo e(__(\App\Models\Document::$status[$document->status])); ?></span>
                        <?php elseif($document->status == 1): ?>
                            <span class="badge bg-info p-2 px-3 rounded"><?php echo e(__(\App\Models\Document::$status[$document->status])); ?></span>
                        <?php elseif($document->status == 2): ?>
                            <span class="badge bg-warning p-2 px-3 rounded"><?php echo e(__(\App\Models\Document::$status[$document->status])); ?></span>
                        <?php elseif($document->status == 3): ?>
                            <span class="badge bg-danger p-2 px-3 rounded"><?php echo e(__(\App\Models\Document::$status[$document->status])); ?></span>
                        <?php endif; ?>
                    </dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('Type')); ?></span></dt>
                    <dd class="col-md-5"><span class="text-md"><?php echo e($document->types->name); ?></span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('Account')); ?></span></dt>
                    <dd class="col-md-5"><span class="text-md"><?php echo e(!empty($document->accounts)?$document->accounts->name:'-'); ?></span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('Opportunities')); ?></span></dt>
                    <dd class="col-md-5"><span class="text-md"><?php echo e(!empty($document->opportunitys)?$document->opportunitys->name:'-'); ?></span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('Publish Date')); ?></span></dt>
                    <dd class="col-md-5"><span class="text-md"><?php echo e(\Auth::user()->dateFormat($document->publish_date)); ?></span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('Expiration Date')); ?></span></dt>
                    <dd class="col-md-5"><span class="text-md"><?php echo e(\Auth::user()->dateFormat($document->expiration_date)); ?></span></dd>


                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('Description')); ?></span></dt>
                    <dd class="col-md-5"><span class="text-md"><?php echo e($document->description); ?></span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('File')); ?></span></dt>
                    <dd class="col-md-5"><span class="text-md"><?php echo e(!empty($document->attachment)?$document->attachment:'No File'); ?></span></dd>

                    <dt class="col-sm-5"><span class="h6 text-sm mb-0"><?php echo e(__('Assigned User')); ?></span></dt>
                    <dd class="col-sm-7"><span class="text-sm"><?php echo e(!empty($document->assign_user)?$document->assign_user->name:''); ?></span></dd>

                    <dt class="col-sm-5"><span class="h6 text-sm mb-0"><?php echo e(__('Created')); ?></span></dt>
                    <dd class="col-sm-7"><span class="text-sm"><?php echo e(\Auth::user()->dateFormat($document->created_at)); ?></span></dd>
                </dl>
            </div>

    </div>

    <div class="w-100 text-end pr-2">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Document')): ?>
        <div class="action-btn bg-info ms-2">
            <a href="<?php echo e(route('document.edit',$document->id)); ?>" class="mx-3 btn btn-sm d-inline-flex align-items-center text-white "data-bs-toggle="tooltip" data-title="<?php echo e(__('Document Edit')); ?>"  title="<?php echo e(__('Edit')); ?>"><i class="ti ti-edit"></i>
            </a>
        </div>

        <?php endif; ?>
    </div>
</div>


<?php /**PATH /home/u265718333/domains/zampisoft.com/public_html/ZampiCrm/resources/views/document/view.blade.php ENDPATH**/ ?>