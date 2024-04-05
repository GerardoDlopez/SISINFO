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
    $("#login").validate({
      rules: {
        email: {
          required: true,
          email: true
        },
        password: {
          required: true,
          minlength: 5
        }
      },
      messages: {
        email: {
          required: "Por favor introduce un correo",
          email: "Por favor introduce un correo valido"
        },
        password: {
          required: "Por favor introduce una contraseña",
          minlength: "Tu contraseña debe tener mas de 7 caracteres"
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

    $("#lideres").validate({
      rules: {
        nombre: {
          required: true
        }
      },
      messages: {
        nombre: {
          required: "Por favor introduce un nombre"
        },
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
        //correo: {
        //  required: true,
        //  email: true
        //},
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

    $("#promovidos_update").validate({
      rules: {
        id_seccion: {
          required: true
        },
        nombre: {
          required: true,
          //email: true
        },
        id_usuario: {
          required: true
        }
      },
      messages: {
        id_seccion: {
          required: "Selecciona una sección electoral",
        },
        nombre: {
          required: "Introduce un nombre"
        },
        id_usuario: {
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

  $("#promovidos").validate({
    rules: {
      id_seccion: {
        required: true
      },
      nombre: {
        required: true,
      },
      id_usuario: {
        required: true
      }
    },
    messages: {
      id_seccion: {
        required: "Selecciona una sección electoral",
      },
      nombre: {
        required: "Introduce un nombre"
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