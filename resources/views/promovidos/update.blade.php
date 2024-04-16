@extends('plantillas.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/pickr/themes/classic.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')


<div class="row">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Datos</h4>
            <form id="promovidos_update" method="POST" action="{{Route('promovido.update',$promovido)}}" >
              @csrf
              @method('put')
              <div class="mb-3">
                <label for="id_seccion" class="form-label">Sección Electoral</label>
                <select name="id_seccion" id="id_seccion" class="js-example-basic-single form-select">
                    <option value="" disabled selected>Elige una seccion electoral</option>
                  @foreach ($secciones as $seccion)
                      <option value="{{$seccion->id}}"
                        {{($seccion->id == $promovido->id_seccion) ? 'selected' : '' }}
                        >
                        {{$seccion->seccion}} {{$seccion->nombre}}
                      </option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input id="nombre" class="form-control" name="nombre" type="text" value="{{$promovido->nombre}}">
              </div>     
              <div class="mb-3">
                <label for="localidad" class="form-label">localidad</label>
                <input id="localidad" class="form-control" name="localidad" type="text" value="{{$promovido->localidad}}">
              </div>
              <div class="mb-3">
                <label for="domicilio" class="form-label">domicilio</label>
                <input id="domicilio" class="form-control" name="domicilio" type="text" value="{{$promovido->domicilio}}">
              </div>
              <div class="mb-3">
                <label for="clave_elec" class="form-label">Clave Elector</label>
                <input id="clave_elec" class="form-control" name="clave_elec" type="text" value="{{$promovido->clave_elec}}" maxlength="18">
              </div>

              <div class="mb-3">
                <label for="telefono" class="form-label">Telefono</label>
                <input value="{{$promovido->telefono}}" id="telefono" class="form-control" name="telefono" type="text" maxlength="10">
              </div>
              
              <div class="mb-3">
                <label for="ocupacion" class="form-label">Ocupación</label>
                <select id="ocupacion" name="ocupacion" class="js-example-basic-single form-select">
                  <option value="" selected disabled>Selecciona una ocupacion</option>
                  @foreach ($ocupaciones as $ocupacion)
                  <option value="{{$ocupacion->id}}" {{($ocupacion->id == $promovido->id_ocupacion) ? 'selected' : '' }}>{{$ocupacion->nombre}}</option>
                  @endforeach
                </select>
              </div>

              <div class="mb-3">
                <label for="genero">genero</label>
                <input type="text" name="genero" class="form-control" value="{{$promovido->genero}}">
              </div>

              <div class="mb-3">
                <label for="edad">edad</label>
                <input type="text" name="edad" class="form-control" value="{{$promovido->edad}}">
              </div>

              <div class="mb-3">
                <label for="id_promotor" class="form-label">Promotor</label>
                <select id="id_promotor" class="js-example-basic-single form-select" name="id_promotor" type="text">
                    <option value="" selected disabled>Selecciona un Promotor</option>
                  @foreach ($users as $user)
                    <option value="{{$user->id}}" {{($promovido->id_promotor == $user->id) ? 'selected' : 'true' }}>{{$user->name}}</option>                      
                  @endforeach
                    <option value="">Ninguno</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="id_usuario" class="form-label">Cordinador/Responable</label>
                <select id="id_usuario" class="js-example-basic-single form-select" name="id_usuario" type="text">
                  <option value="" selected disabled>Selecciona un Lider</option>
                  @foreach ($users as $user)
                    <option value="{{$user->id}}" {{($promovido->id_usuario == $user->id) ? 'selected' : 'true' }}>{{$user->name}}</option>                      
                  @endforeach
                  <option value="">Ninguno</option>
                </select>
              </div>
              <div style="text-align: center">
                <input class="btn btn-primary" type="submit" value="Submit">
              </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/form-validation.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap-maxlength.js') }}"></script>
  <script src="{{ asset('assets/js/inputmask.js') }}"></script>
  <script src="{{ asset('assets/js/select2.js') }}"></script>
  <script src="{{ asset('assets/js/sweet-alert.js') }}"></script>
  <!--SWEET ALERTS-->
  @if ($errors->any())
    <!--error validacion-->
    <script>
        const errores = {!! json_encode($errors->all()) !!};
        Swal.fire({
          position: 'center',
          icon: 'error',
          title: 'Error de validación:',
          text: errores
        }) 
    </script>
  @endif
  <!--captura de datos con exito-->
  @if (session('actualizar')=='ok')
    <script>
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Promovido actualizado con exito!',
        showConfirmButton: false,
        timer: 1500
      }) 
    </script>
  @endif
  <!--END SWEET ALERTS-->
@endpush