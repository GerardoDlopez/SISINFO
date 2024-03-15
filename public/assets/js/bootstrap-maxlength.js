// npm package: bootstrap-maxlength
// github link: https://github.com/mimo84/bootstrap-maxlength

$(function() {
  'use strict';

  $('#seccion_elec').maxlength({
    warningClass: "badge mt-1 bg-danger",
    limitReachedClass: "badge mt-1 bg-success"
  });

  $('#tel_celular').maxlength({
    warningClass: "badge mt-1 bg-danger",
    limitReachedClass: "badge mt-1 bg-success"
  });

  $('#tel_fijo').maxlength({
    warningClass: "badge mt-1 bg-danger",
    limitReachedClass: "badge mt-1 bg-success"
  });

  $('#clave_elec').maxlength({
    warningClass: "badge mt-1 bg-danger",
    limitReachedClass: "badge mt-1 bg-success"
  });

  $('#curp').maxlength({
    warningClass: "badge mt-1 bg-danger",
    limitReachedClass: "badge mt-1 bg-success"
  });

  $('#telefono').maxlength({
    warningClass: "badge mt-1 bg-danger",
    limitReachedClass: "badge mt-1 bg-success"
  });
});