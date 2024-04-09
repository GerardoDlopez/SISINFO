<nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      HORMIGUERO
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
        @can('ver-usuarios')
          <li class="nav-item nav-category">Usuarios</li>
          <li class="nav-item ">
            <a href="{{Route('user.read')}}" class="nav-link">
              <i class="link-icon" data-feather="users"></i>
              <span class="link-title">Lista de usuarios</span>
            </a>
          </li>
        @endcan
        @can('agregar-usuarios')  
          <li class="nav-item ">
            <a href="{{Route('user.create')}}" class="nav-link">
              <i class="link-icon" data-feather="user-plus"></i>
              <span class="link-title">Agregar usuario</span>
            </a>
          </li>
        @endcan
        @can('ver-promovidos|agregar-promovidos')
            
        @endcan
        <li  class="nav-item nav-category">Promovidos</li>
        @can('ver-promovidos')    
          <li class="nav-item ">
            <a href="{{Route('promovido.read')}}" class="nav-link">
              <i class="link-icon" data-feather="file"></i>
              <span class="link-title">Lista de promovidos</span>
            </a>
          </li>
        @endcan
        @can('agregar-promovidos')    
        <li class="nav-item ">
          <a href="{{Route('promovido.create')}}" class="nav-link">
            <i class="link-icon" data-feather="file-plus"></i>
            <span class="link-title">Agregar promovido</span>
          </a>
        </li>
        @endcan
        <li  class="nav-item nav-category">Importar excel</li>
        @can('ver-promovidos')    
          <li class="nav-item ">
            <a href="{{Route('excel.read')}}" class="nav-link">
              <i class="link-icon" data-feather="file"></i>
              <span class="link-title">Importar promovidos</span>
            </a>
          </li>
        @endcan
        @can('ver-promovidos')    
        <li  class="nav-item nav-category">Gráficos</li>
          <li class="nav-item ">
            <a href="{{Route('grafico.read')}}" class="nav-link">
              <i class="link-icon" data-feather="bar-chart-2"></i>
              <span class="link-title">Mostrar graficos</span>
            </a>
          </li>
        @endcan
    </ul>
  </div>
</nav>