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
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="id_usuario" class="form-label">Cordinador</label>
                  <select id="id_usuario" class="js-example-basic-single form-select" data-width="100%" name="id_usuario" type="text">
                    <option value="" selected disabled>Selecciona un lider</option>
                    @foreach ($users as $user)
                      @if ($user->rol === "responsable")
                      <option value="{{$user->id}}" >
                        {{$user->name}}
                      </option>
                      @endif                      
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="id_promotor" class="form-label">Promotor</label>
                  <div class="row align-items-center">
                    <div class="col">
                      <select id="id_promotor" class="js-example-basic-single form-select" name="id_promotor" type="text" style="width: 100%">
                        <option value="" selected disabled>Selecciona un Promotor</option>
                        @foreach ($users as $user)
                        @if ($user->rol == "responsable" || $user->rol == "promotor")
                        <option value="{{$user->id}}" >
                          {{$user->name}}
                        </option>
                        @endif                      
                        @endforeach
                        <option value="">Ninguno</option>
                      </select>
                    </div>
                    <div class="col-auto">
                      <button type="button" class="btn btn-primary btn-icon" onclick="mostrarPromotor()">
                        <i data-feather="file-plus"></i>
                      </button>
                    </div>
                  </div>
                  <div id="nuevo_promotor" class="hidden" style="margin-left: 10%">
                    <label for="inputPromotor">Agrega un nuevo promotor</label>
                    <input type="text" id="inputPromotor" class="form-control" name="inputPromotor" >
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-4">
                  <label for="apellido_pat" class="form-label">Apellido paterno</label>
                  <input id="apellido_pat" class="form-control" name="apellido_pat" type="text">
                </div>
                <div class="col-md-4">
                  <label for="apellido_mat" class="form-label">Apellido materno</label>
                  <input id="apellido_mat" class="form-control" name="apellido_mat" type="text">
                </div>
                <div class="col-md-4">
                  <label for="nombre" class="form-label">Nombre(s)</label>
                  <input id="nombre" class="form-control" name="nombre" type="text" >
                </div>
              </div>
              
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="clave_elec" class="form-label">Clave Elector</label>
                  <input id="clave_elec" class="form-control" name="clave_elec" type="text" maxlength="18" >
                </div>
                <div class="col-md-6">
                  <label for="id_seccion" class="form-label">Sección Electoral</label>
                  <select name="id_seccion" id="id_seccion" class="js-example-basic-single form-select" style="width: 100%">
                    <option value="" disabled selected>Elige una seccion electoral</option>
                    @foreach ($secciones as $seccion)
                    <option value="{{$seccion->id}}">
                      {{$seccion->seccion}} {{$seccion->nombre}}
                    </option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="localidad" class="form-label">Localidad</label>
                  <input id="localidad" class="form-control" name="localidad" type="text">
                </div>
                <div class="col-md-6">
                  <label for="domicilio" class="form-label">Direccion</label>
                  <input id="domicilio" class="form-control" name="domicilio" type="text" >
                </div>
              </div>
              
              <div class="row mb-3">
                <div class="col-md-6">
                    <label for="ocupacion" class="form-label">Ocupación</label>
                    <div class="row align-items-center">
                      <div class="col">
                        <select id="ocupacion" class="js-example-basic-single form-select" name="id_ocupacion" type="text" style="width: 100%">
                          <option value="">Selecciona una ocupación</option>
                          @foreach ($ocupaciones as $ocupacion)
                          <option value="{{$ocupacion->id}}">
                            {{$ocupacion->nombre}}
                          </option>                      
                          @endforeach
                        </select>
                      </div>
                    </div>
                </div>
                <div class="col-md-6">
                  <label for="telefono" class="form-label">Telefono</label>
                  <input id="telefono" class="form-control" name="telefono" type="text">
                </div>
              </div>

              <div style="text-align: center">
                <input class="btn btn-primary" type="submit" value="Enviar formulario">
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

      function mostrarPromotor() {
        var inputDiv = document.getElementById('nuevo_promotor');
        if (inputDiv.classList == 'hidden') {
            inputDiv.classList.remove('hidden');
        } else {
            inputDiv.classList.add('hidden');
        }
      }
    </script>
@endpush