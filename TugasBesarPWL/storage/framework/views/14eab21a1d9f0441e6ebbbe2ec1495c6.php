<?php $__env->startSection('container'); ?>
    <h1>Halaman about</h1>
    <h3><?php echo e($name); ?></h3>
    <img src="img/<?php echo e($image); ?>" alt="<?php echo e($name); ?>" width="200">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\github\New folder\fuck\resources\views/about.blade.php ENDPATH**/ ?>