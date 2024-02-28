@extends('plantillas.master2')

@section('content')
<div class="page-content d-flex align-items-center justify-content-center">

  <div class="row w-100 mx-0 auth-page">
    <div class="col col-xl-6 mx-auto">
      <div class="card">
        <div class="row">
          <div class="col ps-md-0">
            <div class="auth-form-wrapper px-4 py-5">
              <h5 class="text-muted fw-normal mb-4">Bienvenido de nuevo ingresa tus datos!</h5>
              <form class="forms-sample">
                <div class="mb-3">
                  <label for="userEmail" class="form-label">Correo Electronico</label>
                  <input type="email" class="form-control" id="userEmail" placeholder="Email">
                </div>
                <div class="mb-3">
                  <label for="userPassword" class="form-label">Contraseña</label>
                  <input type="password" class="form-control" id="userPassword" autocomplete="current-password" placeholder="Password">
                </div>
                <div class="form-check mb-3">
                  <input type="checkbox" class="form-check-input" id="authCheck">
                  <label class="form-check-label" for="authCheck">
                    Recordar
                  </label>
                </div>
                <div style="text-align: center">
                  <a href="{{ url('/') }}" class="btn btn-primary me-2 mb-2 mb-md-0">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection