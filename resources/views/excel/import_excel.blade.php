@extends('plantillas.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/pickr/themes/classic.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')

<div>

  <h2>Importar Datos desde Excel</h2>
  @if(session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif
  <form action="{{ route('excel.importar') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
          <label for="file">Seleccionar archivo Excel:</label>
          <input type="file" name="file" id="file" accept=".xlsx,.xls">
      </div>
      <button type="submit">Importar</button>
  </form>

  <h1>Import Results</h1>
  <p>Progreso de la importación: {{ session('import_progress', 0) }} filas procesadas</p>
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
@endpush