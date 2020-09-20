$(document).ready(function () {
/* =========================================================
      EDITAR ALERGENOS
==========================================================*/
    $(document).on('click', ".btn-warning", function (e) {

    //Prevenimos el comportamiento por defecto del enlace    
        e.preventDefault();

    //Mostramos el modal
        $('#alergenoEditModal').modal('show');
        
    // Capturamos la informacion de la fila
        console.log(e);
        
        // ! Capturamos el id del Alergeno pulsado
        var idAlergeno = $(this).attr('alergenoid');
        console.log("idAlergeno pulsado", idAlergeno);
        
        // ! Capturamos en un array todos los datos de ese alérgeno usando un atributo que hemos añadido a cada td de la tabla
        var datosAlergeno = $('[datoId ="'+idAlergeno+'"]');    
        console.log("datosAlergeno", datosAlergeno);
        

    
        //! Guardamos en variables los datos del array
        var imagen = datosAlergeno[0].lastElementChild.alt; // nombre imagen con su extension
        var nombre_ES = datosAlergeno[1].innerHTML;
        var nombre_CA = datosAlergeno[2].innerHTML;
        var nombre_EN = datosAlergeno[3].innerHTML;
        var nombre_DE = datosAlergeno[4].innerHTML;

        console.log('lo hemos pillado? :', imagen);
    // ! He comentado la forma anterior de coger los datos
    // var alergeno = e.currentTarget.parentElement.parentNode;
    // var nombre_ES = alergeno.children[1].innerHTML;
    // var nombre_CA = alergeno.children[2].innerHTML;
    // var nombre_EN = alergeno.children[3].innerHTML;
    // var nombre_DE = alergeno.children[4].innerHTML;

        
    //! Pintamos los datos de las variables en el modal
    $('#edit_imagen').text(imagen);
    $('#original_imagen').val(imagen);  // para recuperar la imagen original si la nueva no es valida    
    $('#edit_nombre_ES').val(nombre_ES);
    $('#edit_nombre_CA').val(nombre_CA);
    $('#edit_nombre_EN').val(nombre_EN);
    $('#edit_nombre_DE').val(nombre_DE);
        
  //! No olvidemos el id!
        $('#edit_id_alergeno').val(idAlergeno);


    });
    
    // =============================================
    //            BORRAR ALERGENO
    // =============================================


    $(document).on('click', ".btnBorrarAlergeno", function (e) {
        console.log(e);
        e.preventDefault();
        // var id = e.target.parentElement.attributes[1].value;
        var id = $(this).attr("alergenoId");

        swal({
            type: "warning",
            title: "¿Estás seguro que deseas eliminar éste alérgeno?",
            text: "¡Recuerde que esta acción no se puede deshacer!",
            showCancelButton: true,
            confirmButtonColor: "#17cf23",
            confirmButtonText: "Sí, borrar el alérgeno",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar",
            reverseButtons: true,
            focusConfirm: false,
        }).then(function (result) {
            if (result.value) {
                window.location = "index.php?page=alergenos&id=" + id;
            }
        });
    });

});