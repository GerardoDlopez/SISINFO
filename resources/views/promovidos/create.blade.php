@extends('plantillas.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/pickr/themes/classic.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')

<style>
  .hidden {
      display: none;
  }
</style>

<div class="row">
    <div class="card">
        <div class="card-body">


            <h4 class="card-title">Datos</h4>
            <form id="promovidos" method="POST" action="{{Route('promovido.store')}}" >
              @csrf
              <div class="mb-3">
                <label for="seccion_elec" class="form-label">Sección Electoral</label>
                <input id="seccion_elec" class="form-control" name="seccion_elec" type="text"  maxlength="4" value="{{old('seccion_elec')}}">
              </div>
              <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input id="nombre" class="form-control" name="nombre" type="text" value="{{old('nombre')}}">
              </div>
              <div class="mb-3">
                <label for="apellido_pat" class="form-label">Apellido Paterno</label>
                <input id="apellido_pat" class="form-control" name="apellido_pat" type="text" value="{{old('apellido_pat')}}">
              </div>
              <div class="mb-3">
                <label for="apellido_mat" class="form-label">Apellido Materno</label>
                <input id="apellido_mat" class="form-control" name="apellido_mat" type="text" value="{{old('apellido_mat')}}">
              </div>
              <div class="mb-3">
                <label for="localidad_y_domicilio" class="form-label">localidad y domicilio</label>
                <input id="localidad_y_domicilio" class="form-control" name="localidad_y_domicilio" type="text" value="{{old('localidad_y_domicilio')}}">
              </div>
              <div class="mb-3">
                <label for="clave_elec" class="form-label">Clave Elector</label>
                <input id="clave_elec" class="form-control" name="clave_elec" type="text" maxlength="18" value="{{old('clave_elec')}}">
              </div>
              <div class="mb-3">
                <label for="telefono" class="form-label">Telefono</label>
                <input id="telefono" class="form-control" name="telefono" type="text" maxlength="10" value="{{old('telefono')}}">
              </div>
              
              <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input id="correo" class="form-control" name="correo" type="text" value="{{old('correo')}}">
              </div>
              
              <div class="mb-3">
                <label for="facebook" class="form-label">Facebook</label>
                <input id="facebook" class="form-control" name="facebook" type="text" value="{{old('facebook')}}">
              </div>
              
              <div class="mb-3">
                <label for="ocupacion" class="form-label">Ocupación</label>
                <select id="ocupacion" class="form-select" name="id_ocupacion" type="text">
                  @foreach ($ocupaciones as $ocupacion)
                    <option value="{{$ocupacion->id}}"
                      @if ($ocupacion->nombre == 'Ninguna' && old('id_ocupacion') == null) selected 
                      @elseif (old('id_ocupacion') == $ocupacion->id) selected 
                      @endif
                      >
                      {{$ocupacion->nombre}}
                    </option>                      
                  @endforeach
                    <option id="mostrar_ocupacion">Agregar nueva ocupacion</option>
                </select>
              </div>
              
              <div id="nueva_ocupacion" class="hidden" style="margin-left: 10%">
                <label for="inputOcupacion">Agrega una nueva ocupación</label>
                <input type="text" id="inputOcupacion" class="form-control" name="inputOcupacion" >
              </div>

              <div class="mb-3">
                <label for="escolaridad" class="form-label">Escolaridad</label>
                <select name="escolaridad"  class="form-select">
                  <option value="primaria" {{ old('escolaridad') == 'primaria' ? 'selected' : '' }}>Primaria</option>
                  <option value="secundaria" {{ old('escolaridad') == 'secundaria' ? 'selected' : '' }}>Secundaria</option>
                  <option value="preparatoria" {{ old('escolaridad') == 'preparatoria' ? 'selected' : '' }}>Preparatoria</option>
                  <option value="licenciatura" {{ old('escolaridad') == 'licenciatura' ? 'selected' : '' }}>Licenciatura</option>
                  <option value="ninguna" {{ (old('escolaridad') == 'ninguna' || old('escolaridad') == null) ? 'selected' : '' }}>Ninguna</option>
                </select>
              </div>
              
              <div class="mb-3">
                <label for="observaciones" class="form-label">Observaciones</label>
                <select id="observaciones" name="observaciones[]" class="js-example-basic-multiple form-select select2-hidden-accessible form-control" data-width="100%" multiple aria-hidden="true" >
                  @foreach ($observaciones as $observacion)
                      <option value="{{$observacion->id}}" {{ in_array($observacion->id, old('observaciones', [])) ? 'selected' : '' }}>
                        {{$observacion->nombre}}
                      </option>
                  @endforeach
                </select>
              </div>

              <div class="mb-3">
                  <label for="fecha_captura">Fecha de Captura</label>
                  <input id="fecha_captura" class="form-control"  name="fecha_captura" data-inputmask-inputformat="dd/mm/yyyy" data-inputmask="'alias': 'datetime'" inputmode="numeric" value="{{ old('fecha_captura') }}">
              </div>
              
              <div class="mb-3">
                <label for="id_usuario" class="form-label">Lider</label>
                <select id="id_usuario" class="form-select" name="id_usuario" type="text">
                  <option value="" selected disabled>Selecciona un lider</option>
                  @foreach ($users as $user)
                    <option value="{{$user->id}}" {{ old('id_usuario') == $user->id ? 'selected' : '' }}>
                      {{$user->name}}
                    </option>                      
                  @endforeach
                </select>
              </div>
              <input class="btn btn-primary" type="submit" value="Submit">
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
  @if (session('agregar')=='ok')
    <script>
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Promovido agregado con exito!',
        showConfirmButton: false,
        timer: 1500
      }) 
    </script>
  @endif
  <!--END SWEET ALERTS-->

    <!--mostrar input para agregar una nueva -->
    <script>
     document.getElementById('ocupacion').addEventListener('change', function(){
        var opcionMostrar = document.getElementById('mostrar_ocupacion');
        var inputDiv = document.getElementById('nueva_ocupacion');
        if (opcionMostrar.selected) {
            inputDiv.classList.remove('hidden');
        } else {
            inputDiv.classList.add('hidden');
        }
      });
    </script>
@endpush