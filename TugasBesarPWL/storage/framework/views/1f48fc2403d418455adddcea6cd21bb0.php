

<?php $__env->startSection('container'); ?>
    <h1>Halaman About</h1>
    <h3><?php echo e($name); ?></h3>
    <p><?php echo e($email); ?></p>
    <img src="img/<?php echo e($image); ?>" alt="<?php echo e($name); ?>" width="200px" class="img-thumbnail rounded-circle">
    <i class="fas fa-arrow-right"></i>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LARAVEL\project-pwl\resources\views/about.blade.php ENDPATH**/ ?>