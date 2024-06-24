<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">App Gereja</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item {{ ($active === "home") ? 'active' : '' }}">
            <a class="nav-link" href="/">@lang('navigation.home')</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "about") ? 'active' : '' }}" href="/about">@lang('navigation.about')</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "posts") ? 'active' : '' }}" href="/posts">@lang('navigation.posts')</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "categories") ? 'active' : '' }}" href="/categories/">@lang('navigation.categories')</a>
          </li>
          <li class="nav-item">
            <div class="dropdown">
                <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown">
                    @lang('navigation.language')
                </button>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="locale/en">@lang('navigation.english')</a></li>
                <li><a class="dropdown-item" href="locale/id">@lang('navigation.indonesian')</a></li>
                </ul>
                </div>
          </li>
        </ul>
      </div>
      <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarLogin">
        <ul class="navbar-nav">
            @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Welcome back, {{ auth()->user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a>
                  <div class="dropdown-divider"></div>
                  <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">
                      <i class="bi bi-box-arrow-right"></i> Logout</a>
                    </button>
                  </form>
                </div>
              </li>
            @else
                <li class="nav-item">
                    <a href="/login" class="nav-link {{ ($active === "login") ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                </li>
            @endauth
        </ul>
      </div>
    </div>
  </nav>
