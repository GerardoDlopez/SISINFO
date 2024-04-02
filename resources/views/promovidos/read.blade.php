@extends('plantillas.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/DataTables/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')

<div class="row">
    <div id="filtro" class="col-lg-2 col-xl-2 grid-margin grid-margin-xl-0 stretch-card" style="display: none">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Filtros</h6>
                <form action="{{Route('filtro')}}" method="get">
                    <div class="mb-3">
                        <div class="row">
                            <div class="mb-3">
                                <label for="id_seccion" class="form-label">Sección Electoral</label>
                                <select name="id_seccion" id="id_seccion" class="js-example-basic-single form-select" data-width="100%">
                                    <option value="" disabled selected>Elige una seccion electoral</option>
                                  @foreach ($secciones as $seccion)
                                      <option value="{{$seccion->id}}"
                                        {{($seccion_selected == $seccion->id) ? 'selected' : 'true' }}
                                        >
                                        {{$seccion->seccion}} {{$seccion->nombre}}
                                      </option>
                                  @endforeach
                                </select>
                              </div>

                            <div class="mb-3 col">
                                <label for="" class="form-label">Lideres</label>
                                <select name="lider" id="" class="js-example-basic-single form-select" data-width="100%">
                                    <option value="" selected disabled>Selecciona un lider</option>
                                    @foreach ($usuarios as $usuario)
                                    <option value="{{$usuario->id}}"{{($usuario->id == $lider_selected) ? 'selected' : 'true' }}>{{$usuario->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col">
                                <label for="localidad_y_domicilio" class="form-label">Localidadad y domicilio</label>
                                <input type="text" class="form-control"  name="localidad_y_domicilio" value="{{$localidad_y_domicilio}}">
                            </div>

                            <div class="mb-3 col">
                                <label for="ocupacion" class="form-label">Ocupación</label>
                                <select name="ocupacion" class="js-example-basic-single form-select" data-width="100%">
                                    <option value="" selected disabled>Selecciona una ocupacion</option>
                                    @foreach ($ocupaciones as $ocupacion)
                                        <option value="{{$ocupacion->id}}" {{($ocupacion->id == $ocupacion_selected) ? 'selected' : 'true' }} >{{$ocupacion->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col">
                                <label for="escolaridad" class="form-label">Escolaridad</label>
                                <select name="escolaridad" id="" class="form-select" data-width="100%">
                                    <option value="" selected disabled>Selecciona una escolaridad</option>
                                    <option value="primaria" {{('primaria' == $escolaridad) ? 'selected' : 'true' }}>Primaria</option>
                                    <option value="secundaria" {{('secundaria' == $escolaridad) ? 'selected' : 'true' }}>Secundaria</option>
                                    <option value="preparatoria" {{('preparatoria' == $escolaridad) ? 'selected' : 'true' }}>Preparatoria</option>
                                    <option value="licenciatura"{{('licenciatura' == $escolaridad) ? 'selected' : 'true' }}>Licenciatura</option>
                                    <option value="ninguna">Ninguna</option>
                                </select>
                            </div>

                            <div class="mb-3 col">
                                <label for="observaciones" class="form-label">Observaciones</label>
                                <select name="observacion" id="" class="js-example-basic-single form-select" data-width="100%">
                                    <option value="" selected disabled>Selecciona una observación</option>
                                    @foreach ($observaciones as $observacion)
                                    <option value="{{$observacion->nombre}}"{{($observacion->nombre == $observacion_selected) ? 'selected' : 'true' }}>{{$observacion->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col" >
                                <label class="form-label" for="genero">Genero</label>
                                <div>
                                  <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="genero" id="gender1" value="H" {{($genero == "H") ? 'checked' : 'true' }}>
                                    <label class="form-check-label">
                                      H
                                    </label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="genero" id="gender2" value="M" {{($genero == "M") ? 'checked' : 'true' }}>
                                    <label class="form-check-label">
                                      M
                                    </label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="genero" id="gender3" value="otro" {{($genero == "Other") ? 'checked' : 'true' }}>
                                    <label class="form-check-label">
                                      Otro
                                    </label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="genero" id="gender4" value="" {{($genero == "") ? 'checked' : 'true' }}>
                                    <label class="form-check-label">
                                      Ninguno
                                    </label>
                                  </div>
                                </div>
                            </div>

                            <div class="mb-3 col">
                                <label for="edad" class="form-label">Edad</label>
                                <input type="text" class="form-control"  name="edad" value="{{$edad}}">
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-1 mb-3">
                        <button class="btn btn-success btn-sm" type="submit">FILTRAR</button>
                    </div>
                    <div class="d-grid gap-1 mb-3">
                        <button class="btn btn-success btn-sm" type="submit" formaction="{{ route('pdf') }}"> generar pdf</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="lista" class="">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Promovidos</h6>
                <div class="row mb-3">
                    <div style="text-align: left" class="col">
                        <a onclick="filtro()" class="btn btn-primary btn-icon-text"><i class="btn-icon-prepend" data-feather="settings"></i>Mostrar filltros</a>
                        <a class="btn btn-primary btn-icon-text" href="{{Route('promovido.read')}}">Limpiar filtros</a>
                    </div>
                    <div style="text-align: center" class="col">
                        <a href="{{Route('promovido.create')}}" class="btn btn-success btn-icon-text" style="text-align: center"><i  class="btn-icon-prepend" data-feather="file-plus"></i>Agregar</a>
                    </div>
                    <div class="col" style="text-align: center">
                        <label for="">{{$filtrados_count}} Promovidos filtrados de {{$allpromovidos_count}}</label>
                    </div>
                </div>
                <div class="table-responsive row">
                    <table  id="dataTableExample" class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Sección</th>
                                <th>Nombre</th>
                                <th>Ap Paterno</th>
                                <th>Ap Materno</th>
                                <th>Localidad y domicilio</th>
                                <th>Clave Elector</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>Facebook</th>
                                <th>Ocupación</th>
                                <th>Escolaridad</th>
                                <th>Observaciones</th>
                                <th>Fecha de Captura</th>
                                <th>Genero</th>
                                <th>Edad</th>
                                <th>Promotor</th>
                                <th>Lider</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($promovidos as $promovido)
                                <tr>
                                    <td>{{$promovido->secciones->seccion}}</td>
                                    <td>{{$promovido->nombre}}</td>
                                    <td>{{$promovido->apellido_pat}}</td>
                                    <td>{{$promovido->apellido_mat}}</td>
                                    <td>{{$promovido->localidad_y_domicilio}}</td>
                                    <td>{{$promovido->clave_elec}}</td>
                                    <td>{{$promovido->telefono}}</td>
                                    <td>{{$promovido->correo}}</td>
                                    <td>{{$promovido->facebook}}</td>
                                    @if ($promovido->ocupaciones)
                                        <td>{{$promovido->ocupaciones->nombre}}</td>
                                    @else
                                        <td>Sin ocupaciones</td>
                                    @endif
                                    <td>{{$promovido->escolaridad}}</td>
                                    <td>
                                        @foreach ($promovido->observaciones as $observacion)
                                            {{$observacion->nombre}},
                                        @endforeach
                                    </td>
                                    <td>{{$promovido->fecha_captura}}</td>
                                    <td>{{$promovido->genero}}</td>
                                    <td>{{$promovido->edad}}</td>
                                    @if ($promovido->promotores)
                                        <td>{{$promovido->promotores->name}}</td>
                                    @else
                                        <td>Sin asignar</td>
                                    @endif
                                    @if ($promovido->lideres)
                                        <td>{{$promovido->lideres->name}}</td>
                                    @else
                                        <td>Sin asignar</td>
                                    @endif
                                    <td>
                                        @can('actualizar-promovidos')
                                            <form action="{{route('promovido.edit',$promovido)}}" style="display:inline;" >
                                                <button href="" class="btn btn-success  btn-xs" type="submit">Editar</button>
                                            </form>
                                        @endcan
                                        @can('eliminar-promovidos')
                                            <form action="{{route('promovido.delete', $promovido)}}" style="display:inline;" method="POST" onsubmit="submitForm(event,'{{$promovido->id}}')" id="{{$promovido->id}}">
                                                @csrf
                                                @method('delete')
                                                <button href="" class="btn btn-danger  btn-xs" type="submit">Eliminar</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="pagination row m-3">
                    <div class="col">
                        <span>
                            {{ __('Página') }} {{ $promovidos->currentPage() }} {{ __('de') }} {{ $promovidos->lastPage() }}
                        </span>
                    </div>
                    <div class="col" style="text-align: right">
                            <ul class="pagination" style="float: right;">
                                <li class="page-item">
                                    @if ($promovidos->currentPage() > 1)
                                        <a href="{{ $promovidos->withQueryString()->url(1) }}" class="page-link">{{('<<') }}</a>
                                    @endif
                                </li>
                                @if ($promovidos->previousPageUrl())
                                    <li class="page-item">
                                        <a href="{{ $promovidos->withQueryString()->previousPageUrl() }}" class="page-link" rel="prev">&laquo; {{ __('') }}</a>
                                    </li>
                                @endif
                                @php
                                    $currentPage = $promovidos->currentPage();
                                @endphp
                            
                                <li class="page-item active">
                                    <span class="page-link">{{ $currentPage }}</span>
                                </li>
                                
                                @if ($promovidos->nextPageUrl())
                                    <li class="page-item">
                                        <a href="{{ $promovidos->withQueryString()->nextPageUrl() }}" class="page-link" rel="next">{{ __('') }} &raquo;</a>
                                    </li>
                                @endif
                                <li class="page-item">
                                    @if ($promovidos->currentPage() < $promovidos->lastPage())
                                        <a href="{{ $promovidos->withQueryString()->url($promovidos->lastPage()) }}" class="page-link">{{('>>') }}</a>
                                    @endif
                                </li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('plugin-scripts')
<script src="{{ asset('assets/plugins/DataTables/dataTables.js') }}"></script>
<script src="{{ asset('assets/plugins/DataTables/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/plugins/DataTables/dataTables.responsive.js') }}"></script>
<script src="{{ asset('assets/plugins/DataTables/responsive.bootstrap5.js') }}"></script>

<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

<script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <!--Mostra filtro-->
    <script>
        function filtro() {
            var filtro = document.getElementById("filtro");
            var table = document.getElementById("lista")
            if(filtro.style.display=='none'){
                filtro.style.display = 'block';
                table.className += " col-lg-10";
                table.className += " col-xl-10";
            }else{
                filtro.style.display = 'none';
                table.className = "stretch-card";
            }
        }
    </script>
    <!--END-->

    <!--Alerta para confirmar eliminación-->
    <script>
        function submitForm(event,id){
            event.preventDefault();

            Swal.fire({
                title: 'estas seguro que deseas eliminar el registro ?',
                text: "no podras revertir esto!",
                icon: 'Cuidado',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    elemento= document.getElementById(id);
                    elemento.submit();
                }
            })

        }
    </script>
    <!--END SWEET ALERTS-->

    <!--Alerta de eliminación-->
    @if (session('eliminar')=='ok')
    <script>
      Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'Registro Eliminado',
        showConfirmButton: false,
        timer: 1500
      })
    </script>
    @endif
    <!--END-->
    <!--Alerta de actualización-->
    @if (session('actualizar')=='ok')
        <script>
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Registro editado con exito',
            showConfirmButton: false,
            timer: 1500
          })
        </script>
    @endif
    <!--END-->
@endpush