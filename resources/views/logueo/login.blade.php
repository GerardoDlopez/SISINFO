@extends('plantillas.master2')

@section('content')
<div class="page-content d-flex align-items-center justify-content-center">

  <div class="row w-100 mx-0 auth-page">
    <div class="col col-xl-6 mx-auto">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col ps-md-0">
              <div class="auth-form-wrapper px-4 py-5" >
                <div style="text-align: center">
                  <div class="mb-5">
                    <h1 class="" style="color: black">Hormigas 2024</h1>
                  </div>
                  <form class="forms-sample" method="POST" action="{{Route('login_store')}}">
                  @csrf
                  <div class="mb-3">
                    <label for="userEmail" class="form-label">Correo Electronico</label>
                    <input type="text" class="form-control" id="input-username" placeholder="Enter User Name" name="email">
                  </div>
                  <div class="mb-3">
                    <label for="userPassword" class="form-label">Contraseña</label>
                    <input type="password" class="form-control pe-5" id="password-input" placeholder="Enter Password" name="password">
                  </div>
                  <div >
                    <button class="btn btn-primary me-2 mb-2 mb-md-0">Login</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection