<div class="sidebar border-right col-md-3 col-lg-2 p-0">
    <div class="offcanvas-md offcanvas-end" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto" id="sidebar-icon">
            <div class="midle">
                <div class="circle1">
                    <img src="{{ asset('img/sebagai.jpeg') }}" alt="admin/user" class="admin-user">
                </div>
                <a class="name as-p " > {{ auth()->user()->name }}</a>
            </div>
            <hr>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                        <i class="fa-solid fa-house-chimney-window"></i>
                        <span class="sidebar-text">Dashboard </span>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <p class="nav-link ">
                    user
                    </p>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/pemilihansks') ? 'active' : '' }}" href="/dashboard/pemilihansks">
                        <i class="fa-solid fa-users"></i>
                        <span class="sidebar-text">User</span> 
                    </a>
                </li>

                                
                {{-- <li class="nav-item">
                    <p class="nav-link ">
                    Tools Prodi
                    </p>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/posts') ? 'active' : '' }}" href="/dashboard/posts">
                        <i class="fa-solid fa-table-list"></i>
                        <span class="sidebar-text">Matakuliah</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('') ? 'active' : '' }}" href="{{ url('') }}">
                        <i class="fa-solid fa-file-pen"></i>
                        <span class="sidebar-text">Buat Polling</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('#') ? 'active' : '' }}" href="{{ url('#') }}">
                        <i class="fa-solid fa-square-poll-horizontal"></i>
                        <span class="sidebar-text">Hasil Polling</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('#') ? 'active' : '' }}" href="{{ url('#') }}">
                        <i class="fa-regular fa-pen-to-square"></i>
                        <span class="sidebar-text">Edit</span>
                    </a>
                </li>
{{-- 
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/posts') ? 'active' : '' }}" href="/dashboard/polling">
                    <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                    Polling
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/posts') ? 'active' : '' }}" href="/dashboard/kuri">
                    <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                    Kurikulum
                    </a>
                </li>

                <li class="nav-item">
                    <p class="nav-link ">
                    Tools Admin
                    </p>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/posts') ? 'active' : '' }}" href="/dashboard/role">
                    <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                    Role
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/posts') ? 'active' : '' }}" href="/dashboard/user">
                    <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                    User
                    </a>
                </li> --}}
            </ul>
</div>

