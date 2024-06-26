

<?php $__env->startSection('container'); ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <?php if(auth()->guard()->check()): ?>
            <h1 class="h2">Selamat datang <?php echo e(auth()->user()->name); ?></h1>
        <?php else: ?>
            <h1 class="h2">Session expire please login again <a href="<?php echo e(route('login')); ?>">login</a></h1>
        <?php endif; ?>
    </div> 

    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Kode Mata Kuliah</th>
                    <th scope="col">Mata Kuliah</th>
                    <th scope="col">SKS</th>
                    <th scope="col">Kurikulum</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $matakuliahs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $matakuliah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($matakuliah->id_mk); ?></td>
                    <td><?php echo e($matakuliah->nama_mk); ?></td>
                    <td><?php echo e($matakuliah->sks); ?></td>
                    <td><?php echo e($matakuliah->kurikulum_id_kurikulum); ?></td>
                    <td>
                        <form id="hapusForm_<?php echo e($matakuliah->id_mk); ?>" action="<?php echo e(route('mk-hapus', ['matakuliah' => $matakuliah->id_mk])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button type="submit" class="btn btn-hapus" data-id="<?php echo e($matakuliah->id_mk); ?>">
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
        <form method="post" action="<?php echo e(route('mk-insert')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="id_mk">ID</label>
                <input type="text" name="id_mk" id="id_mk" class="form-control">
            </div>
            <div class="form-group">
                <label for="nama_mk">Nama Mata Kuliah</label>
                <input type="text" name="nama_mk" id="nama_mk" class="form-control">
            </div>
            <div class="form-group">
                <label for="sks">SKS</label>
                <select name="sks" id="sks" class="form-control">
                    <?php for($i = 0; $i <= 9; $i++): ?>
                        <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="kurikulum_id_kurikulum">ID Kurikulum</label>
                <input type="text" name="kurikulum_id_kurikulum" id="kurikulum_id_kurikulum" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Menangani pengiriman form hapus
        document.querySelectorAll('.btn-hapus').forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                const id_mk = this.getAttribute('data-id');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda tidak akan dapat mengembalikan data ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Send the delete request using AJAX
                        fetch(`/dashboard/mk-hapus/${id_mk}`, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                            }
                        })
                        .then(response => {
                            if (response.ok) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: 'Data berhasil dihapus!',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                // Reload the page after the delete request is successful
                                location.reload();
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: 'Terjadi kesalahan saat menghapus data!',
                                    showConfirmButton: true
                                });
                            }
                        })
                        .catch(error => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Terjadi kesalahan saat menghapus data!',
                                showConfirmButton: true
                            });
                            console.error(error);
                        });
                    }
                });
            });
        });
    });
</script>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LARAVEL\project-pwl\resources\views/dashboard/posts/index.blade.php ENDPATH**/ ?>