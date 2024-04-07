

<?php $__env->startSection('container'); ?>
<div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">id role</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
    <tbody>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($user->id); ?></td>
            <td><?php echo e($user->name); ?></td>
            <td><?php echo e($user->email); ?></td>
            <td><?php echo e($user->role_id_role); ?></td>
            <td>
                <form id="hapusForm_<?php echo e($user->id); ?>" action="<?php echo e(route('user-hapus', ['user' => $user->id])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-edit">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button type="submit" class="btn btn-hapus" data-id="<?php echo e($user->id); ?>">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>    
</table>
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
            <div>
                <label class="form-label">id role</label>
                <input type="text" class="form-control" name="role_id">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\AWM\project-pwl\resources\views/dashboard/posts/admin/register.blade.php ENDPATH**/ ?>