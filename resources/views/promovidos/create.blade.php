@extends('plantillas.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/pickr/themes/classic.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
@endpush

@section('content')

<div class="row">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Datos</h4>
            <form id="credenciales" method="POST" action="{{Route('promovido.store')}}" >
              @csrf
              <div class="mb-3">
                <label for="seccion_elec" class="form-label">Sección Electoral</label>
                <input id="seccion_elec" class="form-control" name="seccion_elec" type="text">
              </div>
              <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input id="nombre" class="form-control" name="nombre" type="text">
              </div>
              <div class="mb-3">
                <label for="apellido_pat" class="form-label">Apellido Paterno</label>
                <input id="apellido_pat" class="form-control" name="apellido_pat" type="text">
              </div>
              <div class="mb-3">
                <label for="apellido_mat" class="form-label">Apellido Materno</label>
                <input id="apellido_mat" class="form-control" name="apellido_mat" type="text">
              </div>
              <div class="mb-3">
                <label for="domicilio" class="form-label">Domicilio</label>
                <input id="domicilio" class="form-control" name="domicilio" type="text">
              </div>
              <div class="mb-3">
                <label for="localidad" class="form-label">localidad</label>
                <input id="localidad" class="form-control" name="localidad" type="text">
              </div>
              <div class="mb-3">
                <label for="clave_elec" class="form-label">Clave Elector</label>
                <input id="clave_elec" class="form-control" name="clave_elec" type="text">
              </div>
              <div class="mb-3">
                <label for="curp" class="form-label">Curp</label>
                <input id="curp" class="form-control" name="curp" type="text">
              </div>
              
              <div class="mb-3">
                <label for="tel_celular" class="form-label">Telefono Celular</label>
                <input id="tel_celular" class="form-control" name="tel_celular" type="text">
              </div>
              
              <div class="mb-3">
                <label for="tel_fijo" class="form-label">Telefono Fijo</label>
                <input id="tel_fijo" class="form-control" name="tel_fijo" type="text">
              </div>
              
              <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input id="correo" class="form-control" name="correo" type="text">
              </div>
              
              <div class="mb-3">
                <label for="facebook" class="form-label">Facebook</label>
                <input id="facebook" class="form-control" name="facebook" type="text">
              </div>
              
              <div class="mb-3">
                <label for="ocupacion" class="form-label">Ocupación</label>
                <select id="ocupacion" class="form-select" name="id_ocupacion" type="text">
                  @foreach ($ocupaciones as $ocupacion)
                    <option value="{{$ocupacion->id}}">{{$ocupacion->nombre}}</option>                      
                  @endforeach
                </select>
              </div>
              
              <div class="mb-3">
                <label for="escolaridad" class="form-label">Escolaridad</label>
                <input id="escolaridad" class="form-control" name="escolaridad" type="text">
              </div>
              
              <div class="mb-3">
                <label for="observaciones" class="form-label">Observaciones</label>
                <select id="observaciones" name="observaciones[]" class="js-example-basic-multiple form-select select2-hidden-accessible form-control" data-width="100%" multiple aria-hidden="true" >
                  <option value="" disabled>Seleccione una observación</option>
                  @foreach ($observaciones as $observacion)
                      <option value="{{$observacion->id}}">
                        {{$observacion->nombre}}
                      </option>
                  @endforeach
                </select>
              </div>

              <div class="mb-3">
                <label for="fecha_captura">Fecha de Captura</label>
                <div class="input-group flatpickr" id="flatpickr-date">
                  <input type="text" class="form-control flatpickr-input" placeholder="Select date" data-input="" readonly="readonly" name="fecha_captura">
                  <span class="input-group-text input-group-addon" data-toggle=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></span>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="genero">Genero</label>
                <div>
                  <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="genero" id="gender1" value="H">
                    <label class="form-check-label" for="gender1">
                      H
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="genero" id="gender2" value="M">
                    <label class="form-check-label" for="gender2">
                      M
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="genero" id="gender3" value="otro">
                    <label class="form-check-label" for="gender3">
                      Other
                    </label>
                  </div>
                </div>
              </div>

              
              <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input id="edad" class="form-control" name="edad" type="text">
              </div>
              
              <div class="mb-3">
                <label for="id_usuario" class="form-label">Lider</label>
                <select id="id_usuario" class="form-select" name="id_usuario" type="text">
                  @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>                      
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
  <script src="{{ asset('assets/plugins/typeahead-js/typeahead.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/flatpickr/flatpickr.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/form-validation.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap-maxlength.js') }}"></script>
  <script src="{{ asset('assets/js/inputmask.js') }}"></script>
  <script src="{{ asset('assets/js/select2.js') }}"></script>
  <script src="{{ asset('assets/js/typeahead.js') }}"></script>
  <script src="{{ asset('assets/js/flatpickr.js') }}"></script>
@endpush