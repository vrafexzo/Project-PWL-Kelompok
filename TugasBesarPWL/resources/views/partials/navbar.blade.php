<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="/">Web Polling</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ ($title === "Home") ? 'active' : '' }}" aria-current="page" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === "About") ? 'active' : '' }}" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === "Posts") ? 'active' : '' }}" href="/blog">Posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === "Roles") ? 'active' : '' }}" href="/role">Roles</a>
        </li>
        @auth
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}">logout</a>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Register") ? 'active' : '' }}" href="/register">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Login") ? 'active' : '' }}" href="/login">Login</a>
          </li>
        @endauth

        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <span class="navbar-text" style="text-align: left;">@auth{{ auth()->user()->name }}
        @endauth
      </span>
    </div>
  </div>
</nav>