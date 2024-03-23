<?php $__env->startSection('container'); ?>
    <?php if(auth()->guard()->check()): ?>
    <h1>HALO <?php echo e(auth()->user()->name); ?> di aplikasi <?php echo e(config('app.name')); ?></h1>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\github\New folder\fuck\resources\views/home.blade.php ENDPATH**/ ?>