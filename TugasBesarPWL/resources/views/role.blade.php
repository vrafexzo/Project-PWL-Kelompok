@extends('layouts.main')

@section('container')
<table border=1px>
    <thead>
        <tr style="border-bottom: 2px solid black;">
            <th>ID</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $role)
        <tr>
            <td style="border: 1px solid black;">{{ $role->id_role }}</td>
            <td style="border: 1px solid black;">{{ $role->nama_role }}</td>
        </tr>
        @endforeach
    </tbody>    
</table>

@endsection

