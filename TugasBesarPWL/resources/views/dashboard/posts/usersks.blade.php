@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        @auth
            <h3 class="h2">Selamat datang {{ auth()->user()->name }}</h3>
        @else
            <h3 class="h2">Session expire please login again <a href="{{ route('login') }}">login</a></h3>
        @endauth
    </div> 
    <h2>Pemilihan SKS Semester Antara</h2>
    <div class="table-responsive small">
        <form method="post" action="{{ route('salah') }}">
            @csrf
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
                    @foreach($matakuliahs as $matakuliah)
                    <tr>
                        <td>{{ $matakuliah->id_mk }}</td>
                        <td>{{ $matakuliah->nama_mk }}</td>
                        <td>{{ $matakuliah->sks }}</td>
                        <td>{{ $matakuliah->kurikulum_id_kurikulum }}</td>
                        <td><input type="checkbox" id="{{ $matakuliah->id_mk }}" name="id-sks" value="{{ $matakuliah->sks }}"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    <div>Total SKS yang dipilih: <span id="total-sks">0</span></div>

    <div>
        <h3>Add Data Mata Kuliah</h3>
    </div>
@endsection

<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const maxSks = 9; // Maksimal jumlah SKS yang dapat dipilih
        let totalSks = 0; // Inisialisasi total SKS yang dipilih

        // Fungsi untuk memperbarui total SKS yang dipilih
        function updateTotalSks() {
            totalSks = 0;
            document.querySelectorAll('input[name="id-sks"]:checked').forEach(checkbox => {
                totalSks += parseInt(checkbox.value);
            });
            // Perbarui teks pada elemen dengan ID 'total-sks'
            document.getElementById('total-sks').innerText = totalSks;
        }

        // Memanggil fungsi updateTotalSks saat halaman dimuat atau kotak centang berubah
        document.querySelectorAll('input[name="id-sks"]').forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                updateTotalSks();
                // Memeriksa apakah total SKS melebihi batas maksimal
                if (totalSks > maxSks) {
                    this.checked = false; // Tidak membiarkan kotak centang terpilih
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Jumlah SKS yang dipilih melebihi batas maksimal!',
                    });
                    updateTotalSks(); // Memastikan total SKS diperbarui setelah pembatalan centang
                }
            });
        });

        // Menangani pengiriman form hapus dan Swal.fire
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
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
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
