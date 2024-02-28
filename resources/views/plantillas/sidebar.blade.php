<nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      SisInfo
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item ">
        <a href="" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item nav-category">web apps</li>
      @can('sorteo.show')
        <li class="nav-item ">
          <a href="{{Route('sorteo.show')}}" class="nav-link">
            <i class="link-icon" data-feather="message-square"></i>
            <span class="link-title">Sorteos</span>
          </a>
        </li>    
      @endcan

      @can('gastos.sorteos')
      <li class="nav-item ">
        <a href="{{Route('gastos.show')}}" class="nav-link">
          <i class="link-icon" data-feather="message-square"></i>
          <span class="link-title">gastos</span>
        </a>
      </li>    
      @endcan
      
      <li class="nav-item ">
        @can('user.show')
        <a class="nav-link" href="{{Route('user.show')}}">
          <i class="link-icon" data-feather="file"></i>
          <span class="link-title">Usuarios</span>
        </a>
        @endcan
      </li>
      
      <li class="nav-item nav-category">BOLETOS</li>
      
      @can('apartado.show')
        <li class="nav-item ">
          <a href="{{Route('apartado.show')}}" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Boletos Apartados</span>
          </a>
        </li>    
      @endcan

      @can('pagado.show')
        <li class="nav-item ">
          <a href="{{Route('pagado.show')}}" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Boletos Pagados</span>
          </a>
        </li>    
      @endcan
      
    </ul>
  </div>
</nav>