@extends('plantillas.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/DataTables/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    
    <link href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet" />
@endpush

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Credenciales</h6>
                <div style="text-align: center">
                    <a href="{{Route('credencial.create')}}" class="btn btn-success" style="text-align: center">Agregar credencial</a>
                </div>
                <div class="table-responsive">
                    <table  id="dataTableExample" class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Edad</th>
                                <th>Domicilio</th>
                                <th>Clave Elector</th>
                                <th>Curp</th>
                                <th>Fecha de nacimiento</th>
                                <th>Genero</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($credenciales as $credencial)
                                <tr>
                                    <td>{{$credencial->nombre}}</td>
                                    <td>{{$credencial->apellido_pat}}</td>
                                    <td>{{$credencial->apellido_mat}}</td>
                                    <td>{{$credencial->edad}}</td>
                                    <td>{{$credencial->domicilio}}</td>
                                    <td>{{$credencial->clave_elec}}</td>
                                    <td>{{$credencial->curp}}</td>
                                    <td>{{$credencial->fecha_nacimiento}}</td>
                                    <td>{{$credencial->genero}}</td>
                                    <td>
                                        <form action="{{route('credencial.edit',$credencial)}}" style="display:inline;" >
                                            <button href="" class="btn btn-success  btn-xs" type="submit">Editar</button>
                                        </form>
                                        <form action="{{route('credencial.delete', $credencial)}}" style="display:inline;" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button href="" class="btn btn-danger  btn-xs" type="submit">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush