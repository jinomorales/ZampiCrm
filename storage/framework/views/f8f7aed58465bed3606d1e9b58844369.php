<?php echo e(Form::open(array('url'=>'case_type','method'=>'post'))); ?>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('name',__('Case Type'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Case Type'),'required'=>'required'))); ?>

        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn  btn-light"
            data-bs-dismiss="modal">Close</button>
            <?php echo e(Form::submit(__('Save'),array('class'=>'btn  btn-primary '))); ?><?php echo e(Form::close()); ?>

    </div>
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /home/u265718333/domains/zampisoft.com/public_html/ZampiCrm/resources/views/case_type/create.blade.php ENDPATH**/ ?>