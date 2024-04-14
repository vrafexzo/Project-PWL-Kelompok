@extends('dashboard.layouts.main')

@section('container')
    <form action="/" method="post" class="form-create-polling">
        <div class="judul-polling">
            <h3>Create Polling</h3>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">ID Polling</label>
            <input type="text" class="id-pol" placeholder="Masukkan ID Polling">
        </div>
        <div class="con-date">
            <div>
                <label for="input-tanggal">Tanggal Mulai:</label>
                <input type="datetime-local" name="tanggal-awal" class="date">
            </div>
            <div>
                <label for="input-tanggal">Tanggal Selesai:</label>
                <input type="datetime-local" name="tanggal-akhir" class="date">
            </div>
        </div>
        <div class="btn-con">
            <button type="submit" class="btn-polling btn-primary">Create Polling</button>
        </div>
    </form>
@endsection