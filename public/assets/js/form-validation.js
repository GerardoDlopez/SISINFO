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
    $("#usuarios").validate({
      rules: {
        nombre: {
          required: true
        },
        correo: {
          required: true,
          email: true
        },
        contraseña: {
          required: true,
          minlength: 5
        },
        confirmar_contraseña: {
          required: true,
          equalTo: "#contraseña"
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
        contraseña: {
          required: "Por favor introduce una contraseña",
          minlength: "Tu contraseña debe tener mas de 7 caracteres"
        },
        confirmar_contraseña: {
          required: "Por favor confirma la contraseña",
          equalTo: "Por favor ingrese la misma contraseña que arriba"
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

    $("#credenciale").validate({
      rules: {
        numero: {
          required: true,
          minlength: 3
        },
        nombre: {
          required: true,
          //email: true
        },
        carrera: {
          required: true
        },
        sistema: {
          required: true
        },
        turno: {
          required: true
        },
        fecha: {
          required: true
        }
      },
      messages: {
        numero: {
          required: "Please enter a name",
          minlength: "Name must consist of at least 3 characters"
        },
        nombre: {
          required: "tu nombre"
        },
        carrera: {
          required: "tu carrera"
        },
        sistema: {
          required: "tu sistema"
        },
        turno: {
          required: "tu turno"
        },
        fecha: {
          required: "tu fecha"
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