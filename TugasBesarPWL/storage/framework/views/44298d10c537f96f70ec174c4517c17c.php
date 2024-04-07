

<?php $__env->startSection('container'); ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <?php if(auth()->guard()->check()): ?>
            <h3 class="h2">Selamat datang <?php echo e(auth()->user()->name); ?></h3>
        <?php else: ?>
            <h3 class="h2">Session expire please login again <a href="<?php echo e(route('login')); ?>">login</a></h3>
        <?php endif; ?>
    </div> 
    <h2>Pemilihan SKS Semester Antara</h2>
    <div class="table-responsive small">
        <form method="post" action="<?php echo e(route('salah')); ?>">
            <?php echo csrf_field(); ?>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Kode Mata Kuliah</th>
                        <th scope="col">Mata Kuliah</th>
                        <th scope="col">SKS</th>
                        <th scope="col">Kurikulum</th>
                        <th scope="col">check</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $matakuliahs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $matakuliah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($matakuliah->id_mk); ?></td>
                        <td><?php echo e($matakuliah->nama_mk); ?></td>
                        <td><?php echo e($matakuliah->sks); ?></td>
                        <td><?php echo e($matakuliah->kurikulum_id_kurikulum); ?></td>
                        <td><input type="checkbox" id="<?php echo e($matakuliah->id_mk); ?>" name="id-sks" value="<?php echo e($matakuliah->id_mk); ?>"></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>

    <div>
        <h3>Add Data Mata Kuliah</h3>
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

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LARAVEL\project-pwl\resources\views/dashboard/posts/usersks.blade.php ENDPATH**/ ?>