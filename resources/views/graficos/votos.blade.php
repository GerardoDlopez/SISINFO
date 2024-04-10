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
        <canvas id="voto"></canvas>
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
  window.votos = @json($votos);
</script>
<script src="{{ asset('assets/js/chartjs.js') }}"></script>
@endpush