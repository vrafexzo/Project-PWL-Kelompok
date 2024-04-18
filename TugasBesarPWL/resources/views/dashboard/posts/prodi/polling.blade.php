@extends('dashboard.layouts.main')

@section('container')
    <div>
        <h3>Tambah Jadwal Polling</h3>
        <form method="post" action="{{ route('polling.post') }}">
            @csrf
            <div class="form-group">
                <label for="id_polling">ID Polling</label>
                <input type="text" name="id_polling" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nama_polling">Nama Polling</label>
                <input type="text" name="nama_polling" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tanggal_mulai">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tanggal_selesai">Tanggal Selesai</label>
                <input type="date" name="tanggal_selesai" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class="table-responsive mt-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Polling</th>
                    <th scope="col">Tanggal Mulai</th>
                    <th scope="col">Tanggal Selesai</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pollings as $polling)
                <tr>
                    <td>{{ $polling->id_polling }}</td>
                    <td>{{ $polling->nama_polling }}</td>
                    <td>{{ $polling->tanggal_mulai }}</td>
                    <td>{{ $polling->tanggal_selesai }}</td>
                    <td>
                        @if($polling->tanggal_selesai < now())
                            Expired
                        @elseif($polling->tanggal_mulai > now())
                            Belum Aktif
                        @else
                            Aktif
                        @endif
                    </td>
                    <td>
                        <form id="hapusForm_{{ $polling->id_polling }}" action="{{ route('polling-hapus', ['polling' => $polling->id_polling]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button type="submit" class="btn btn-hapus" data-id="{{ $polling->id_polling }}">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
