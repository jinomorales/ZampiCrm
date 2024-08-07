<?php echo e(Form::model($opportunitiesStage, array('route' => array('opportunities_stage.update', $opportunitiesStage->id), 'method' => 'PUT'))); ?>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('name',__('Stage Name'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Opportunities Stage')))); ?>

            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-name" role="alert">
                    <strong class="text-danger"><?php echo e($message); ?></strong>
                </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn  btn-light"
        data-bs-dismiss="modal">Close</button>
        <?php echo e(Form::submit(__('Update'),array('class'=>'btn  btn-primary '))); ?><?php echo e(Form::close()); ?>

</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /home/u265718333/domains/zampisoft.com/public_html/ZampiCrm/resources/views/opportunities_stage/edit.blade.php ENDPATH**/ ?>