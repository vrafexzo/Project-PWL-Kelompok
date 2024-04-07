@extends('dashboard.layouts.main')


@section('container')
<div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
    <tbody>
        @foreach($roles as $role)
        <tr>
            <td>{{ $role->id_role }}</td>
            <td>{{ $role->nama_role }}</td>
            <td></td>
        </tr>
        @endforeach
    </tbody>    
</table>


@endsection

