@extends('plantillas.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/DataTables/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  
  <link href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Usuarios</h6>
                    <div style="text-align: center">
                        <a href="{{Route('user.create')}}" class="btn btn-success" style="text-align: center">Agregar usuario</a>
                    </div>
                    <div class="table-responsive">
                        <table  id="dataTableExample" class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Telefono</th>
                                    <th>Roles</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->telefono}}</td>
                                        <td>
                                            @if (!empty($user->getRoleNames()))
                                                @foreach ($user->getRoleNames() as $roleName)
                                                    <label class="badge rounded-pill bg-primary">{{$roleName}}</label>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @can('actualizar-usuarios')    
                                                <form action="{{route('user.edit',$user->id)}}" style="display:inline;" >
                                                    <button href="" class="btn btn-success  btn-xs" ype="submit">Editar</button>
                                                </form>
                                            @endcan
                                            @can('eliminar-usuarios')    
                                                <form action="{{route('user.delete', $user)}}" style="display:inline;" method="POST" onsubmit="submitForm(event,'{{$user->id}}')" id="{{$user->id}}">
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
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
  <script src="{{ asset('assets/js/sweet-alert.js') }}"></script>
  
    <!--captura de datos con exito-->
    @if (session('agregar')=='ok')
      <script>
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Lider agregado con exito!',
          showConfirmButton: false,
          timer: 1500
        }) 
      </script>
    @endif
    <!--END SWEET ALERTS-->
    <!--captura de datos con exito-->
    @if (session('actualizar')=='ok')
        <script>
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Lider actualizado con exito!',
            showConfirmButton: false,
            timer: 1500
          }) 
        </script>
    @endif
    <!--END SWEET ALERTS-->

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
@endpush