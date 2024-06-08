<?php $__env->startSection('title', __('Not Found')); ?>
<?php $__env->startSection('code', '404'); ?>
<?php $__env->startSection('message',__($exception->getMessage() ?: 'Not Found')); ?>

<?php echo $__env->make('errors::minimal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u265718333/domains/zampisoft.com/public_html/ZampiCrm/resources/views/errors/404.blade.php ENDPATH**/ ?>