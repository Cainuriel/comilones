$(document).ready(function () {

  // console.log("Se está cargando el archivo categorias.js");

  $(".tablaCategorias").on('click','.btnEditarCategoria', function (e) {
      e.preventDefault();
      // console.log("Botón editar");
      $('#editarCategoriaModal').modal('show');
      
      var categoria = e.currentTarget.parentElement.parentNode;
      var nombre_ES = categoria.children[1].innerHTML;
      var nombre_EN = categoria.children[2].innerHTML;
      var nombre_DE = categoria.children[3].innerHTML;
      var nombre_CA = categoria.children[4].innerHTML;
      var tipo = categoria.children[0].innerHTML;
      var idCategoria = $(this).attr("idCategoria");
  
      $('#editarnombre_ES').val(nombre_ES);
      $('#editarnombre_EN').val(nombre_EN);
      $('#editarnombre_DE').val(nombre_DE);
      $('#editarnombre_CA').val(nombre_CA);
      $('#rolCat').val(tipo);
      $('#rolCat').text(tipo);
      $('#idCategoria').val(idCategoria);
      // console.log("idCategoria", idCategoria);

      
  
  });
  $(".tablaCategorias").on('click','.btnBorrarCategoria', function () {
    var idCat = $(this).attr("idCategoria");

    
    swal({
      type: "warning",
      title: "¿Estás seguro que deseas eliminar esta categoría?",
      text: "¡Recuerde que esta acción no se puede deshacer!",
      showCancelButton: true,
      confirmButtonColor: "#17cf23",
      confirmButtonText: "Sí, borrar la categoría",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      reverseButtons: true,
      focusConfirm: false
    }).then(function (result) {
      if (result.value) {
        window.location = "index.php?page=categorias&cat=" + idCat;
      }
    });
  });
  
  });

