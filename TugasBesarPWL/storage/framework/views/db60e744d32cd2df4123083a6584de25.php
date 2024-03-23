<?php $__env->startSection('container'); ?>
<table border=1px>
    <thead>
        <tr style="border-bottom: 2px solid black;">
            <th>ID</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td style="border: 1px solid black;"><?php echo e($role->id_role); ?></td>
            <td style="border: 1px solid black;"><?php echo e($role->nama_role); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>    
</table>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\github\New folder\fuck\resources\views/role.blade.php ENDPATH**/ ?>