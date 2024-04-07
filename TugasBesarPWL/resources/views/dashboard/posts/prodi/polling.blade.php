@extends('dashboard.layouts.main')

@section('container')
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
                @foreach($pollings as $polling)
                <tr>
                    <td>{{ $polling->id_polling }}</td>
                    <td>{{ $polling->nama_polling }}</td>
                    <td>{{ $polling->tanggal_mulai }}</td>
                    <td>{{ $polling->tanggal_selesai }}</td>
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

    <div>
        <h3>Add Data Mata Kuliah</h3>
        <form method="post" action="{{ route('polling.post') }}">
            @csrf
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
@endsection
