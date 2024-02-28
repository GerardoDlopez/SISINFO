<nav class="navbar">
    <a href="#" class="sidebar-toggler">
      <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="wd-30 ht-30 rounded-circle" src="{{ url('https://via.placeholder.com/30x30') }}" alt="profile">
          </a>
          <div class="dropdown-menu p-0" style="background: #0C1427" aria-labelledby="profileDropdown">
            <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
              <div class="mb-3">
                <img class="wd-80 ht-80 rounded-circle" src="{{ url('https://via.placeholder.com/80x80') }}" alt="">
              </div>
              <div class="text-center">
              </div>
            </div>
            <ul class="list-unstyled p-1">
              <li class="text-center">
                <form action="" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-icon"><i class="btn-icon-prepend " data-feather="log-out"></i></button>
                </form>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </nav>