@extends('dashboard.layouts.main')

@section('container')
    <div class="table-responsive container-edit">
        <div class="pd">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingUsername" placeholder="ID">
                <label for="ID">ID</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingName" placeholder="Name">
                <label for="name">Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="RetypePassword">
                <label for="floatingPassword">Retype Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="NewPassword">
                <label for="floatingPassword">New Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingProdi" placeholder="Prodi">
                <label for="prodi">Prodi</label>
            </div>
            <div class="btn-group mb-3 justify-content-end">
                <button type="button" class="btn-dd btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Role
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Admin</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">User</a></li>
                </ul>
            </div>
            <div class="wrap-up">
                <input class="btn-up btn-primary" type="submit" value="Update">
                <input class="btn-up btn-primary" type="reset" value="Cencel">
            </div>
        </div>
    </div>
@endsection