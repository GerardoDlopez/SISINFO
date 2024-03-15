// npm package: jquery-validation
// github link: https://github.com/jquery-validation/jquery-validation

$(function() {
  'use strict';

  //$.validator.setDefaults({
  //  submitHandler: function() {
  //    alert("submitted!");
  //  }
  //});
  $(function() {
    // validate signup form on keyup and submit
    $("#lideres").validate({
      rules: {
        nombre: {
          required: true
        },
        correo: {
          required: true,
          email: true
        },
        telefono: {
          required: true,
          minlength: 10
        },
        contraseña: {
          required: true,
          minlength: 5
        },
        confirmar_contraseña: {
          required: true,
          equalTo: "#contraseña"
        },
        roles: {
          required: true,
        }
      },
      messages: {
        nombre: {
          required: "Por favor introduce un nombre"
        },
        correo: {
          required: "Por favor introduce un correo",
          email: "Por favor introduce un correo valido"
        },
        telefono: {
          required: "Por favor introduce un numero telefonico",
          minlength: "introduce 10 numeros"
        },
        contraseña: {
          required: "Por favor introduce una contraseña",
          minlength: "Tu contraseña debe tener mas de 7 caracteres"
        },
        confirmar_contraseña: {
          required: "Por favor confirma la contraseña",
          equalTo: "Por favor ingrese la misma contraseña que arriba"
        },
        roles: {
          required: "Por favor selecciona un permiso"
        }
      },
      errorPlacement: function(error, element) {
        error.addClass( "invalid-feedback" );

        if (element.parent('.input-group').length) {
          error.insertAfter(element.parent());
        }
        else if (element.prop('type') === 'radio' && element.parent('.radio-inline').length) {
          error.insertAfter(element.parent().parent());
        }
        else if (element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
          error.appendTo(element.parent().parent());
        }
        else {
          error.insertAfter(element);
        }
      },
      highlight: function(element, errorClass) {
        if ($(element).prop('type') != 'checkbox' && $(element).prop('type') != 'radio') {
          $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        }
      },
      unhighlight: function(element, errorClass) {
        if ($(element).prop('type') != 'checkbox' && $(element).prop('type') != 'radio') {
          $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        }
      }
    });

    $("#update_lideres").validate({
      rules: {
        nombre: {
          required: true
        },
        correo: {
          required: true,
          email: true
        },
        telefono: {
          required: true,
          minlength: 10
        },
        roles: {
          required: true,
        }
      },
      messages: {
        nombre: {
          required: "Por favor introduce un nombre"
        },
        correo: {
          required: "Por favor introduce un correo",
          email: "Por favor introduce un correo valido"
        },
        telefono: {
          required: "Por favor introduce un numero telefonico",
          minlength: "introduce 10 numeros"
        },
        roles: {
          required: "Por favor selecciona un permiso"
        }
      },
      errorPlacement: function(error, element) {
        error.addClass( "invalid-feedback" );

        if (element.parent('.input-group').length) {
          error.insertAfter(element.parent());
        }
        else if (element.prop('type') === 'radio' && element.parent('.radio-inline').length) {
          error.insertAfter(element.parent().parent());
        }
        else if (element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
          error.appendTo(element.parent().parent());
        }
        else {
          error.insertAfter(element);
        }
      },
      highlight: function(element, errorClass) {
        if ($(element).prop('type') != 'checkbox' && $(element).prop('type') != 'radio') {
          $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        }
      },
      unhighlight: function(element, errorClass) {
        if ($(element).prop('type') != 'checkbox' && $(element).prop('type') != 'radio') {
          $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        }
      }
    });

    $("#promovidos").validate({
      rules: {
        seccion_elec: {
          required: true,
          digits: true,
          minlength: 4
        },
        nombre: {
          required: true,
          //email: true
        },
        apellido_pat: {
          required: true
        },
        apellido_mat: {
          required: true
        },
        domicilio: {
          required: true
        },
        localidad: {
          required: true
        },
        clave_elec: {
          required: true,
          minlength: 18
        },
        curp: {
          required: true,
          minlength: 18
        },
        tel_celular: {
          required: true,
          digits: true,
          minlength: 10
        },
        tel_fijo: {
          digits: true,
          minlength: 10
        },
        correo: {
          email: true
        },
        ocupacion: {
        },
        escolaridad: {
        },
        observaciones: {
        },
        fecha_captura: {
          required: true
        },
        genero: {
          required: true
        },
        edad: {
          required: true
        },
        id_usuario: {
          required: true
        }
      },
      messages: {
        seccion_elec: {
          required: "Introduce una sección electoral",
          digits: "Introduce solo numeros",
          minlength: "Introduce 4 digitos"
        },
        nombre: {
          required: "Introduce un nombre"
        },
        apellido_pat: {
          required: "Introduce un apellido"
        },
        apellido_mat: {
          required: "Introduce un apellido"
        },
        domicilio: {
          required: "Introduce un domicilio"
        },
        localidad: {
          required: "Introduce una localidad"
        },
        clave_elec: {
          required: "Introduce una clave electoral",
          minlength: "Introduce 18 caracteres"
        },
        curp: {
          required: "Introduce una curp",
          minlength: "Introduce 18 caracteres"
        },
        tel_celular: {
          required: "Introduce un numero de telefono",
          digits: "Introduce solo numeros",
          minlength: "Introduce 10 caracteres"
        },
        tel_fijo: {
          digits: "Introduce solo numeros",
          minlength: "Introduce 10 caracteres"
        },
        correo: {
          email: "Introduce un correo electronico valido"
        },
        fecha_captura: {
          required: "Introduce la fecha de captura"
        },
        genero: {
          required: "Seleccion un genero"
        },
        edad: {
          required: "Introduce una edad"
        },id_usuario: {
          required: "Selecciona un lider"
        }
      },
      errorPlacement: function(error, element) {
        error.addClass( "invalid-feedback" );

        if (element.parent('.input-group').length) {
          error.insertAfter(element.parent());
        }
        else if (element.prop('type') === 'radio' && element.parent('.radio-inline').length) {
          error.insertAfter(element.parent().parent());
        }
        else if (element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
          error.appendTo(element.parent().parent());
        }
        else {
          error.insertAfter(element);
        }
      },
      highlight: function(element, errorClass) {
        if ($(element).prop('type') != 'checkbox' && $(element).prop('type') != 'radio') {
          $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        }
      },
      unhighlight: function(element, errorClass) {
        if ($(element).prop('type') != 'checkbox' && $(element).prop('type') != 'radio') {
          $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        }
      }
    });
  });
});