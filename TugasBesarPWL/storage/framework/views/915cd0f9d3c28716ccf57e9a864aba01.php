<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="/">Web Polling</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?php echo e(($title === "Home") ? 'active' : ''); ?>" aria-current="page" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo e(($title === "About") ? 'active' : ''); ?>" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo e(($title === "Posts") ? 'active' : ''); ?>" href="/blog">Posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo e(($title === "Roles") ? 'active' : ''); ?>" href="/role">Roles</a>
        </li>
        <?php if(auth()->guard()->check()): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('logout')); ?>">logout</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link <?php echo e(($title === "Register") ? 'active' : ''); ?>" href="/register">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo e(($title === "Login") ? 'active' : ''); ?>" href="/login">Login</a>
          </li>
        <?php endif; ?>

        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <span class="navbar-text" style="text-align: left;"><?php if(auth()->guard()->check()): ?><?php echo e(auth()->user()->name); ?>

        <?php endif; ?>
      </span>
    </div>
  </div>
</nav><?php /**PATH D:\github\New folder\fuck\resources\views/partials/navbar.blade.php ENDPATH**/ ?>