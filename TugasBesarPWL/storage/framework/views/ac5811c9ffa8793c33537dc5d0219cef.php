

<?php $__env->startSection('container'); ?>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">id polling</th>
                    <th scope="col">nama polling</th>
                    <th scope="col">tanggal mulai</th>
                    <th scope="col">tanggal selesai</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $pollings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $polling): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($polling->id_polling); ?></td>
                    <td><?php echo e($polling->nama_polling); ?></td>
                    <td><?php echo e($polling->tanggal_mulai); ?></td>
                    <td><?php echo e($polling->tanggal_selesai); ?></td>
                    <td>
                        <form id="hapusForm_<?php echo e($polling->id_polling); ?>" action="<?php echo e(route('polling-hapus', ['polling' => $polling->id_polling])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button type="submit" class="btn btn-hapus" data-id="<?php echo e($polling->id_polling); ?>">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <div>
        <h3>Add Data Mata Kuliah</h3>
        <form method="post" action="<?php echo e(route('polling.post')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="id_polling">id polling</label>
                <input type="text" name="id_polling" class="form-control">
            </div>
            <div class="form-group">
                <label for="nama_polling">nama polling</label>
                <input type="text" name="nama_polling" class="form-control">
            </div>
            <div class="form-group">
                <label for="tanggal_mulai">tanggal mulai</label>
                <input type="text" name="tanggal_mulai" class="form-control">
            </div>
            <div class="form-group">
                <label for="tanggal_selesai">tanggal selesai</label>
                <input type="text" name="tanggal_selesai" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\AWM\project-pwl\resources\views/dashboard/posts/prodi/polling.blade.php ENDPATH**/ ?>