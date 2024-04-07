<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
      <a class="navbar-brand" href="/">PWL Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link <?php echo e(($title === "Home") ? 'active' : ''); ?>" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo e(($title === "About") ? 'active' : ''); ?>" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo e(($title === "Posts") ? 'active' : ''); ?>" href="/blog">Blog</a>
          </li>
          <?php if(auth()->guard()->check()): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('logout')); ?>">logout</a>
          </li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link" href="/dashboard">Dashboard</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php /**PATH D:\LARAVEL\project-pwl\resources\views/partials/navbar.blade.php ENDPATH**/ ?>