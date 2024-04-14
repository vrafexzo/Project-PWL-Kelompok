@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3>Tambah Matakuliah</h3>
        {{-- @auth
            <h1 class="h2">Selamat datang {{ auth()->user()->name }}</h1>
        @else
            <h1 class="h2">Session expire please login again <a href="{{ route('login') }}">login</a></h1>
        @endauth --}}
    </div> 

    <div class="table-responsive bor-mk">
        <table class="table tb-mk table-striped table-sm">
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
                @foreach($matakuliahs as $matakuliah)
                <tr>
                    <td>{{ $matakuliah->id_mk }}</td>
                    <td>{{ $matakuliah->nama_mk }}</td>
                    <td>{{ $matakuliah->sks }}</td>
                    <td>{{ $matakuliah->kurikulum_id_kurikulum }}</td>
                    <td>
                        <form id="hapusForm_{{ $matakuliah->id_mk }}" action="{{ route('mk-hapus', ['matakuliah' => $matakuliah->id_mk]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-edit">
                                <i class="fa-solid icn-size fa-pen-to-square"></i>
                            </button>
                            <button type="submit" class="btn btn-hapus" data-id="{{ $matakuliah->id_mk }}">
                                <i class="fa-solid icn-size fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <button id="toggleButton" onclick="hide()">
            <i class="fa-solid add-mk fa-folder-plus"></i>
            Add Data Mata Kuliah
        </button><br>
        <div id="formContainer">
            <h3>Add Data Mata Kuliah</h3>
            <form method="post" action="{{ route('mk-insert') }}">
                @csrf
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
                        @for ($i = 0; $i <= 9; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="form-group">
                    <label for="kurikulum_id_kurikulum">ID Kurikulum</label>
                    <input type="text" name="kurikulum_id_kurikulum" id="kurikulum_id_kurikulum" class="form-control">
                </div>
                <br>
                <button type="submit" class="send btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

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

    function hide(){
        const formContainer=document.getElementById('formContainer');
        if (formContainer.style.display=='none'){
            formContainer.style.display='block';
        }else {formContainer.style.display='none';}
    }


</script>
