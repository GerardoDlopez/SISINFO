@extends('plantillas.master2')

@push('style')
<link href="{{ asset('css/login.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

@endpush

@section('content')
<div class="page-content d-flex align-items-center justify-content-center">

  <div class="row w-100 mx-0 auth-page">
    <div class="col col-xl-6 mx-auto">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="login-container">
              <div class="logo">
                  <img src="{{asset('assets/imgs/hormiga_logo.png')}}" alt="Logo de Hormigas 2024">
                  <img src="{{asset('assets/imgs/logo_bgwhite.png')}}" alt="Logo de Hormigas 2024">
              </div>
                <form class="login-form" action="{{Route('login_store')}}" method="post" id="login">
                  @csrf
                    <h2>HORMIGAS 2024</h2>
                    <div class="input-group">
                        <label for="email">Correo</label>
                        <input type="text" id="email" name="email" required>
                    </div>
                    <div class="input-group input-password">
                      <label for="password">Contraseña</label>
                      <input type="password" id="password" name="password" required>
                      <span class="toggle-password" id="togglePassword">
                          <i class="fas fa-eye" id="eyeIcon"></i>
                      </span>
                  </div>
                  <button type="submit">Ingresar</button>
                </form>
              </div>
      
          
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{asset('assets/js/login.js')}}"></script>
  <script src="{{ asset('assets/js/form-validation.js') }}"></script>
@endpush