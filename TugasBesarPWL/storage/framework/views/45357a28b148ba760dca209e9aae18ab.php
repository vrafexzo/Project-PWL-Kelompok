

<?php $__env->startSection('container'); ?>
    <h2><?php echo e($post->title); ?></h2>
    
    <?php echo $post->body; ?>

    <br>
    <a href="/blog">Back to Posts</a>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LARAVEL\project-pwl\resources\views/post.blade.php ENDPATH**/ ?>