@extends('plantillas.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/pickr/themes/classic.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
@endpush

@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Forms</a></li>
      <li class="breadcrumb-item active" aria-current="page">Advanced Elements</li>
    </ol>
</nav>

<div class="row">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Datos</h4>
            <form id="signupForm">
              <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input id="name" class="form-control" name="name" type="text">
              </div>
              <div class="mb-3">
                <label for="name" class="form-label">Apellido Paterno</label>
                <input id="name" class="form-control" name="name" type="text">
              </div>
              <div class="mb-3">
                <label for="name" class="form-label">Apellido Materno</label>
                <input id="name" class="form-control" name="name" type="text">
              </div>
              <div class="mb-3">
                <label for="name" class="form-label">Edad</label>
                <input id="name" class="form-control" name="name" type="text">
              </div>
              <div class="mb-3">
                <label for="name" class="form-label">Domicilio</label>
                <input id="name" class="form-control" name="name" type="text">
              </div>
              <div class="mb-3">
                <label for="name" class="form-label">Clave Elector</label>
                <input id="name" class="form-control" name="name" type="text">
              </div>
              <div class="mb-3">
                <label for="name" class="form-label">Curp</label>
                <input id="name" class="form-control" name="name" type="text">
              </div>

              <div class="input-group flatpickr mb-3" id="flatpickr-date">
                <input type="text" class="form-control flatpickr-input" placeholder="Select date" data-input="" readonly="readonly">
                <span class="input-group-text input-group-addon" data-toggle=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></span>
              </div>

              <div class="mb-3">
                <label class="form-label">Genero</label>
                <div>
                  <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="gender_radio" id="gender1">
                    <label class="form-check-label" for="gender1">
                      H
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="gender_radio" id="gender2">
                    <label class="form-check-label" for="gender2">
                      M
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="gender_radio" id="gender3">
                    <label class="form-check-label" for="gender3">
                      Other
                    </label>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="name" class="form-label">Lider</label>
                <input id="name" class="form-control" name="name" type="text">
              </div>
              <div class="mb-3">
                <label for="name" class="form-label">Edad</label>
                <input id="name" class="form-control" name="name" type="text">
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