// npm package: datatables.net-bs5
// github link: https://github.com/DataTables/Dist-DataTables-Bootstrap5

$(function() {
  'use strict';

  $(function() {
    $('#dataTableExample').DataTable({
      paging: false, // Desactiva la paginación
      searching: false, // Desactiva el buscador
      info: false,
      responsive: true,
      autoWidth: false,
      "language": {
            "lengthMenu": "Mostrar _MENU_  usuarios por pagina",
            "zeroRecords": "Nada encontrado - Disculpa",
            "info": "Pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            "search":"Buscar",
            "paginate": {
              "next": "Siguiente",
              "previous": "Anterior"
            }
        }
    });
    $('#dataTableExample').each(function() {
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Search');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });
  });

});