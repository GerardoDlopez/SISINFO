<nav class="navbar">
    <a href="#" class="sidebar-toggler">
      <i data-feather="menu"></i>
    </a>

    <div class="navbar-content">
      <img src="{{ asset('assets/imgs/logo.png') }}"  alt="" style="text-align: center; margin: 5px">
      <ul class="navbar-nav">
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span >{{auth()->user()->name}}</span>
          </a>
          <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
            <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
              <div class="mb-3">
                <span >{{auth()->user()->name}}</span>
              </div>
              <div class="text-center">
              </div>
            </div>
            <ul class="list-unstyled p-1">
              <li class="text-center">
                <form action="{{ Route('logout') }}" method="POST">
                  @csrf
                  <button class="dropdown-item" href="auth-logout.html"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</button>
                </form>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </nav>