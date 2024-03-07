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
      <li class="nav-item nav-category">Usuarios</li>
        <li class="nav-item ">
          <a href="{{Route('user.read')}}" class="nav-link">
            <i class="link-icon" data-feather="users"></i>
            <span class="link-title">Usuario Editar/Eliminar</span>
          </a>
        </li>
        <li class="nav-item ">
          <a href="{{Route('user.create')}}" class="nav-link">
            <i class="link-icon" data-feather="user-plus"></i>
            <span class="link-title">Agregar usuario</span>
          </a>
        </li>
      <li  class="nav-item nav-category">Credenciales</li>
        <li class="nav-item ">
          <a href="{{Route('credencial.read')}}" class="nav-link">
            <i class="link-icon" data-feather="file"></i>
            <span class="link-title">Credenciales Editar/Eliminar</span>
          </a>
        </li>

        <li class="nav-item ">
          <a href="{{Route('credencial.create')}}" class="nav-link">
            <i class="link-icon" data-feather="file-plus"></i>
            <span class="link-title">Agregar credenciales</span>
          </a>
        </li>
    </ul>
  </div>
</nav>