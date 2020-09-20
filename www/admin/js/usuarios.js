$(document).ready(function () {
  console.log("Se está cargando el archivo Usuarios.js");

  //! =============================================
  //            EDITAR USUARIOS
  //! =============================================

  //$(".btnEditarUsuario").click(function (e) {
  $(document).on('click', ".btnEditarUsuario", function (e) {
  
    var idUsuario = $(this).attr("idUsuario");
    console.log("idUsuario", idUsuario);

    var datos = new FormData(); // Objeto de JS para recoger datos de form
    datos.append("idUser", idUsuario);

    //! Creamos una conexión AJAX - XHR
    $.ajax({
      url: "./ajax/usuarios.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
        console.log("respuesta", respuesta);

        var imagenUsuario = 'public/img/users/' + respuesta.foto;

        //*Una vez recibimos la respuesta por AJAX rellenamos los datos en el formulario
        $("#userId").val(respuesta.id_usuario);
        $("#editarNombre").val(respuesta.nombre);
        $("#editarEmail").val(respuesta.email);
        $("#lastPass").val(respuesta.pass);
        $('#foto_usuario').val(respuesta.foto);
        $('#fotoAnterior').attr('src', imagenUsuario );
        $("#rolUser").val(respuesta.tipo);
        $("#rolUser").text(respuesta.tipo);

      },
    });
  });

  //! =============================================
  //            BORRAR USUARIO
  //! =============================================

  //$(".btnBorrarUsuario").on("click", function (e) {
  $(document).on('click', ".btnBorrarUsuario", function (e) {
    console.log(e);
    e.preventDefault();
    // var idUser = e.target.parentElement.attributes[1].value;
    // console.log(idUser);
    var idUser = $(this).attr("idUsuario");

    console.log("Estas intentando borrar el usuario ", idUser);
    swal({
      type: "warning",
      title: "¿Estás seguro que deseas eliminar el usuario?",
      text: "¡Recuerde que esta acción no se puede deshacer!",
      showCancelButton: true,
      confirmButtonColor: "#17cf23",
      confirmButtonText: "Sí, borrar el usuario",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      reverseButtons: true,
      focusConfirm: false,
    }).then(function (result) {
      if (result.value) {
        window.location = "index.php?page=usuarios&user=" + idUser;
      }
    });
  });
});
