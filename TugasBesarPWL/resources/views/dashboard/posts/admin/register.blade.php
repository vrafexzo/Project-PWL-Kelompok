@extends('dashboard.layouts.main')

@section('container')
<div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">id role</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role_id_role }}</td>
            <td>
                <form id="hapusForm_{{ $user->id }}" action="{{ route('user-hapus', ['user' => $user->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-edit">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button type="submit" class="btn btn-hapus" data-id="{{ $user->id }}">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>    
</table>
    <div class="container">
        <div class="mt-5">
            @if($errors->any())
                <div class="col-12">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            
            @if(session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
        </div>
        <form action="{{ route('register.post') }}" method="POST" class="ms-auto me-auto mt-auto" style="width: 500px">
        @csrf    
        <div>
                <label class="form-label">Fullname</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div>
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div>
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div>
                <label class="form-label">id role</label>
                <input type="text" class="form-control" name="role_id">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection

