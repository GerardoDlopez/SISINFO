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