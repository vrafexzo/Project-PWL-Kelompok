<div class="sidebar border-right col-md-3 col-lg-2 p-0 bg-dark">
    <div class="offcanvas-md offcanvas-end" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request('dashboard') ? 'active' : ''); ?>" aria-current="page" href="/dashboard">
                    <svg class="bi"><use xlink:href="#house-fill"/></svg>
                    Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('dashboard/pemilihansks') ? 'active' : ''); ?>" href="/dashboard/pemilihansks">
                    <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                     Pemilihan SKS 
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('dashboard/posts') ? 'active' : ''); ?>" href="/dashboard/posts">
                    <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                     Administrator
                    </a>
                </li>
            </ul>
</div>

<?php /**PATH D:\LARAVEL\project-pwl\resources\views/dashboard/layouts/sidebar.blade.php ENDPATH**/ ?>