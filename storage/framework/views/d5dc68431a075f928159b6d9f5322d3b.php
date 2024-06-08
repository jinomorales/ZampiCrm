<?php echo e(Form::open(array('url'=>'product_tax','method'=>'post'))); ?>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('tax_name',__('Tax Name'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('tax_name',null,array('class'=>'form-control','placeholder'=>__('Enter Product Brand'),'required'=>'required'))); ?>

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('rate',__('Rate'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('rate',null,array('class'=>'form-control','placeholder'=>__('Enter Product Brand'),'required'=>'required'))); ?>

        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
        <?php echo e(Form::submit(__('Save'),array('class'=>'btn btn-primary'))); ?>

    </div>
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /home/u265718333/domains/zampisoft.com/public_html/ZampiCrm/resources/views/producttax/create.blade.php ENDPATH**/ ?>