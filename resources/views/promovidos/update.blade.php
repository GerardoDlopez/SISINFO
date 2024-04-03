@extends('plantillas.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/pickr/themes/classic.min.css') }}" rel="stylesheet" />
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
                <label for="localidad_y_domicilio" class="form-label">localidad y domicilio</label>
                <input id="localidad_y_domicilio" class="form-control" name="localidad_y_domicilio" type="text" value="{{$promovido->localidad_y_domicilio}}">
              </div>
              <div class="mb-3">
                <label for="clave_elec" class="form-label">Clave Elector</label>
                <input id="clave_elec" class="form-control" name="clave_elec" type="text" value="{{$promovido->clave_elec}}" maxlength="18">
              </div>

              <div class="mb-3">
                <label for="telefono" class="form-label">Telefono Celular</label>
                <input value="{{$promovido->telefono}}" id="tel_celular" class="form-control" name="telefono" type="text" maxlength="10">
              </div>
              
              <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input value="{{$promovido->correo}}" id="correo" class="form-control" name="correo" type="text">
              </div>
              
              <div class="mb-3">
                <label for="facebook" class="form-label">Facebook</label>
                <input value="{{$promovido->facebook}}" id="facebook" class="form-control" name="facebook" type="text">
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
                <label for="escolaridad" class="form-label">Escolaridad</label>
                <select name="escolaridad" id="escolaridad" class="form-select">
                  <option value="" selected disabled>Seleccione una escolaridad</option>
                  <option value="primaria"{{('primaria' == $promovido->escolaridad) ? 'selected' : 'true' }}>Primaria</option>
                  <option value="secundaria"{{('secundaria' == $promovido->escolaridad) ? 'selected' : 'true' }}>Secundaria</option>
                  <option value="preparatoria"{{('preparatoria' == $promovido->escolaridad) ? 'selected' : 'true' }}>Preparatoria</option>
                  <option value="licenciatura"{{('licenciatura' == $promovido->escolaridad) ? 'selected' : 'true' }}>Licenciatura</option>
                  <option value="ninguna"{{('ninguna' == $promovido->escolaridad) ? 'selected' : 'true' }}>Ninguna</option>
                </select>
              </div>
              
              <div class="mb-3">
                <label for="observaciones" class="form-label">Observaciones</label>
                <select id="observaciones" name="observaciones[]" class="js-example-basic-multiple form-select select2-hidden-accessible form-control" data-width="100%" multiple aria-hidden="true" >
                  @foreach ($observaciones as $observacion)
                      <option 
                        value="{{$observacion->id}}"
                        {{in_array($observacion->nombre,$observacion_selected) ? 'selected' : '' }}
                      >
                        {{$observacion->nombre}}
                      </option>
                  @endforeach
                </select>
              </div>

              <div class="mb-3">
                <label for="fecha_captura">Fecha de Captura</label>
                <input id="fecha_captura" class="form-control"  name="fecha_captura" data-inputmask-inputformat="dd/mm/yyyy" data-inputmask="'alias': 'datetime'" inputmode="numeric" value="{{$fecha_captura}}">
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
                <label for="id_usuario" class="form-label">Lider</label>
                <select id="id_usuario" class="js-example-basic-single form-select" name="id_usuario" type="text">
                  <option value="" selected disabled>Selecciona un Lider</option>
                  @foreach ($users as $user)
                    <option value="{{$user->id}}" {{($promovido->id_usuario == $user->id) ? 'selected' : 'true' }}>{{$user->name}}</option>                      
                  @endforeach
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