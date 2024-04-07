

<?php $__env->startSection('container'); ?>
    <div class="container">
        <div class="mt-5">
            <?php if($errors->any()): ?>
                <div class="col-12">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="alert alert-danger"><?php echo e($error); ?></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            <?php if(session()->has('error')): ?>
                <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
            <?php endif; ?>

            
            <?php if(session()->has('success')): ?>
                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
            <?php endif; ?>
        </div>
        <a href=" <?php echo e(route('login')); ?>">Login</a>
        <form action="<?php echo e(route('register.post')); ?>" method="POST" class="ms-auto me-auto mt-auto" style="width: 500px">
        <?php echo csrf_field(); ?>    
        <div>
                <label class="form-label">Fullname</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div>
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div>
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LARAVEL\project-pwl\resources\views/register.blade.php ENDPATH**/ ?>