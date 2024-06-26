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
        
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h6 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Busqueda individual
                            </button>
                        </h6>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <form action="{{Route('buscador')}}" method="get">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">busca al promovido por su nombre</label>
                                    <input type="text"  name="nombre" class="form-control">
                                </div>
                                <div style="text-align: center">
                                    <div class="d-grid gap-1 mb-3">
                                        <button class="btn btn-success btn-sm" type="submit">BUSCAR</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <form action="{{Route('filtro')}}" method="get">
                    <div class="accordion-item">
                        <h6 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseOne">
                                Filtros                            
                            </button>
                        </h6>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
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
                                                <label for="" class="form-label">Responsable/Cordinador</label>
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
                                                <label for="domicilio" class="form-label">domicilio</label>
                                                <input type="text" class="form-control"  name="domicilio" value="{{$domicilio}}">
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
                
                                        <div class="row mb-3">
                                            <div class="col md-6" >
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
                
                                            <div class="col md-6">
                                                <label for="edad" class="form-label">Edad</label>
                                                <input type="text" class="form-control"  name="edad" value="{{$edad}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-1 mb-3">
                                        <button class="btn btn-success btn-sm" type="submit">FILTRAR</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-1 m-3">
                            <button class="btn btn-success btn-sm" type="submit" formaction="{{ route('pdf') }}"> generar pdf</button>
                        </div>
                    </form>
                </div>
                
    </div>

    <div id="lista" class="">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Promovidos</h6>
                <div class="row mb-3">
                    <div style="text-align: left" class="col">
                        <a onclick="filtro()" class="btn btn-primary btn-icon"><i class="btn-icon-prepend" data-feather="settings"></i></a>
                        <a class="btn btn-primary btn-icon" href="{{Route('promovido.read')}}"><i class="btn-icon-prepend" data-feather="refresh-ccw"></i></a>
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
                                <th>Localidad</th>
                                <th>Domicilio</th>
                                <th>Clave Elector</th>
                                <th>Telefono</th>
                                <th>Fecha de Captura</th>
                                <th>Genero</th>
                                <th>Edad</th>
                                <th>Promotor</th>
                                <th>Lider</th>
                                <th>Estatus voto</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($promovidos as $promovido)
                                <tr>
                                    <td>{{$promovido->secciones->seccion}}</td>
                                    <td>{{$promovido->nombre}}</td>
                                    <td>{{$promovido->localidad}}</td>
                                    <td>{{$promovido->domicilio}}</td>                                    <td>{{$promovido->clave_elec}}</td>
                                    <td>{{$promovido->telefono}}</td>
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
                                    <td>{{$promovido->estatus_voto}}</td>
                                    <td>
                                        @can('actualizar-promovidos')
                                            <form   style="display:inline;" >
                                                <button href="" class="btn btn-success  btn-xs" type="button" onclick="openInNewTab('{{ route('promovido.edit', $promovido) }}')">Editar</button>
                                            </form>
                                        @endcan
                                        @can('eliminar-promovidos')
                                            <form action="{{route('promovido.delete', $promovido)}}" style="display:inline;" method="POST" onsubmit="submitForm(event,'{{$promovido->id}}')" id="delete{{$promovido->id}}">
                                                @csrf
                                                @method('delete')
                                                <button href="" class="btn btn-danger  btn-xs" type="submit">Eliminar</button>
                                            </form>
                                        @endcan
                                        @can('actualizar-promovidos')
                                            <form  action="{{route('votar', $promovido)}}" style="display:inline;" method="POST" onsubmit="submitVoto(event,'{{$promovido->id}}')" id="voto{{$promovido->id}}">
                                                @csrf
                                                @method('put')
                                                <button href="" class="btn btn-primary  btn-xs" type="submit" >Asignar voto</button>
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
            id="delete"+id;
            Swal.fire({
                title: 'estas seguro que deseas eliminar el registro ?',
                text: "no podras revertir esto!",
                icon: 'warning',
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

        function submitVoto(event,id){
            event.preventDefault();
            id="voto"+id;
            Swal.fire({
                title: 'estas seguro que deseas cambiar el voto de este promovido ? ',
                text: "no podras revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, cambiar!'
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
    <!--Alerta de actualización-->
    @if (session('voto')=='ok')
        <script>
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'voto agregado con exito',
            showConfirmButton: false,
            timer: 1500
          })
        </script>
    @endif
    <!--END-->
    <script>
        function openInNewTab(url) {
        var win = window.open(url, '_blank');
        win.focus();
        }
    </script>
@endpush