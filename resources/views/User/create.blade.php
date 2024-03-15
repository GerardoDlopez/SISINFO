@extends('plantillas.master')

@push('plugin-styles')
  <!--select2-->
  <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
  <!--Sweet alert 2-->
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Forms</a></li>
      <li class="breadcrumb-item active" aria-current="page">Advanced Elements</li>
    </ol>
</nav>

<div class="row">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Datos</h4>
            <form id="lideres" action="{{Route('user.store')}}" method="POST">
              @csrf
              <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input id="nombre" class="form-control" name="nombre" type="text">
              </div>

              <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input id="correo" class="form-control" name="correo" type="text">
              </div>

              
              <div class="mb-3">
                <label for="telefono" class="form-label">Telefono</label>
                <input id="telefono" class="form-control" name="telefono" type="text" maxlength="10">
              </div>
              
              <div class="mb-3">
                <label for="contraseña" class="form-label">Contraseña</label>
                <input id="contraseña" class="form-control" name="contraseña" type="text">
              </div>

              <div class="mb-3">
                <label for="confirmar_contraseña" class="form-label">Confirmar contraseña</label>
                <input id="confirmar_contraseña" class="form-control" name="confirmar_contraseña" type="text">
              </div>

              <div class="mb-5">
                <label for="roles">Roles</label>
                <select id="roles" name="roles[]" class="js-example-basic-multiple form-select select2-hidden-accessible form-control" data-width="100%" multiple aria-hidden="true" >
                  <option value="" disabled>Seleccione un rol</option>
                  @foreach ($roles as $rol)
                      <option value="{{$rol}}">
                        {{$rol}}
                      </option>
                  @endforeach
                </select>
              </div>
 
              <button class="btn btn-primary" type="submit">Enviar formulario</button>
            </form>
        </div>
    </div>
</div>

@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
  
  <script src="{{ asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/form-validation.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap-maxlength.js') }}"></script>
  <script src="{{ asset('assets/js/select2.js') }}"></script>

  <script src="{{ asset('assets/js/bootstrap-maxlength.js') }}"></script>
@endpush