$.extend( $.fn.dataTable.defaults, {
  responsive: true
} );

$(document).ready(function () {
  /* =========================================================
        ACTIVAR EL PLUGIN DE DATATABLES
  ==========================================================*/
  $(".tablas").dataTable({    
    stateSave: true, //Guarda la página actual de la paginación, al actualizar vuelve a la misma
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
    autoWidth: true
  });
  /* =========================================================
          MENÚ LATERAL
  ==========================================================*/
  $(".nav-item a").click(function (e) {
    //e.preventDefault();
    console.log("se ha pulsado un link del menú lateral");
    console.log($(this).attr("href"));
    $(this).addClass("active");
  });

// TODO Eliminar o documentar??
  /* =========================================================
          DATATABLES - Columnas ocultas
    ==========================================================*/
  // $(".tabla_col_hidden").dataTable({
  //   language: {
  //     sProcessing: "Procesando...",
  //     sLengthMenu: "Mostrar _MENU_ registros",
  //     sZeroRecords: "No se encontraron resultados",
  //     sEmptyTable: "Ningún dato disponible en esta tabla",
  //     sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
  //     sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0",
  //     sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
  //     sInfoPostFix: "",
  //     sSearch: "Buscar:",
  //     sUrl: "",
  //     sInfoThousands: ",",
  //     sLoadingRecords: "Cargando...",
  //     oPaginate: {
  //       sFirst: "Primero",
  //       sLast: "Último",
  //       sNext: "Siguiente",
  //       sPrevious: "Anterior",
  //     },
  //     oAria: {
  //       sSortAscending: ": Activar para ordenar la columna de manera ascendente",
  //       sSortDescending: ": Activar para ordenar la columna de manera descendente",
  //     },
  //   },
  //   responsive: true,
  //   autoWidth: true,
  //   // Oculto las columnas de la tabla  
  //   // FIXME No funciona responsive con las filas ocultadas - Descartado método
  //   columnDefs: [{
  //       "targets": [0],
  //       "visible": false
  //       // "searchable": false
  //     },
  //     {
  //       "targets": [3],
  //       "visible": false
  //     },
  //     {
  //       "targets": [4],
  //       "visible": false
  //     },
  //     {
  //       "targets": [5],
  //       "visible": false
  //     },
  //     {
  //       "targets": [6],
  //       "visible": false
  //     },
  //     {
  //       "targets": [7],
  //       "visible": false
  //     },
  //     {
  //       "targets": [8],
  //       "visible": false
  //     }
  //   ]
  // });
});
