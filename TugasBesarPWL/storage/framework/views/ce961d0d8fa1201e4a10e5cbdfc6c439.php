

<?php $__env->startSection('container'); ?>

    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">id kurikulum</th>
                    <th scope="col">nama kurikulum</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $kuris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kuri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($kuri->id_kurikulum); ?></td>
                    <td><?php echo e($kuri->nama_kurikulum); ?></td>
                    <td>
                        <form id="hapusForm_<?php echo e($kuri->id_kurikulum); ?>" action="<?php echo e(route('kuri-hapus', ['kuri' => $kuri->id_kurikulum])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button type="submit" class="btn btn-hapus" data-id="<?php echo e($kuri->id_kurikulum); ?>">
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
        <form method="post" action="<?php echo e(route('kuri.post')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="id_kurikulum">id kurikulum</label>
                <input type="text" name="id_kurikulum" class="form-control">
            </div>
            <div class="form-group">
                <label for="nama_kurikulum">Nama kurikulum</label>
                <input type="text" name="nama_kurikulum" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\AWM\project-pwl\resources\views/dashboard/posts/prodi/kuri.blade.php ENDPATH**/ ?>