@extends('plantillas.master')

@push('plugin-styles')
  <!--select2-->
  <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
  <!--Sweet alert 2-->
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="row">
  <div class="col-xl-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Bar chart</h6>
        <canvas id="chartjsBar"></canvas>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Secciones</h4>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 40%;">
                  Seccion
                </th>
                <th style="width: 60%;">
                  Progreso
                </th>
                <th>
                  Meta
                </th>
              </tr>
            </thead>

            <tbody>
              @foreach ($secciones as $seccion)
                  <tr>
                    <td>
                        {{$seccion->seccion}} {{$seccion->nombre}}
                    </td>
                    <td>
                        <div class="progress" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="promovidos: {{$seccion->promovidos_count}}  meta: {{$seccion->meta}}">
                          
                          <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: {{$seccion->porcentaje_femenino}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Mujeres">{{$seccion->porcentaje_femenino}}%</div>
                          <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: {{$seccion->porcentaje_masculino}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Hombres">{{$seccion->porcentaje_masculino}}%</div>
                        </div>
                        {{$seccion->porcentaje}}%
                    </td>
                    <td>
                      <div style="text-align: center">

                        {{$seccion->meta}}
                        <button type="button" class="btn btn-primary btn-icon btn-xs" data-bs-toggle="modal" data-bs-target="#exampleModal{{$seccion->id}}">
                          <i data-feather="edit"></i>
                        </button>
                      </div>

                      <div class="modal fade" id="exampleModal{{$seccion->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$seccion->id}}" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edita la meta de la seccion {{$seccion->seccion}}</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                            </div>
                            <form action="{{Route('meta', $seccion)}}" method="POST">
                              <div class="modal-body">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                  <label for="meta_actual" class="form-label">Meta actual:  {{$seccion->meta}}</label>
                                </div>
                                <div class="mb-3">
                                  <label for="meta" class="form-label">Nueva meta</label>
                                  <input name="meta" class="form-control">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-primary" type="submit">Guardar cambios</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

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
  <script src="{{ asset('assets/plugins/chartjs/chart.umd.js') }}"></script>
@endpush

@push('custom-scripts')
<script>
  window.labels = @json($labels); // Convertir la variable PHP $data a JSON y asignarla como una propiedad del objeto window
  window.promovidos = @json($promovidos); // Convertir la variable PHP $data a JSON y asignarla como una propiedad del objeto window
  window.meta = @json($meta);
</script>
<script src="{{ asset('assets/js/chartjs.js') }}"></script>
@endpush