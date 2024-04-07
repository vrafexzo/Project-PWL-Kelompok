@extends('dashboard.layouts.main')

@section('container')

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
                @foreach($kuris as $kuri)
                <tr>
                    <td>{{ $kuri->id_kurikulum }}</td>
                    <td>{{ $kuri->nama_kurikulum }}</td>
                    <td>
                        <form id="hapusForm_{{ $kuri->id_kurikulum }}" action="{{ route('kuri-hapus', ['kuri' => $kuri->id_kurikulum]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button type="submit" class="btn btn-hapus" data-id="{{ $kuri->id_kurikulum }}">
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
        <form method="post" action="{{ route('kuri.post') }}">
            @csrf
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
@endsection
