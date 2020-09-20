$(document).ready(function () {

    // Funcion utilizada para las acciones de crear y editar
    // arg -> arrayAlergeno -> Son los alergenos que se eligieron cuándo se creo el producto. Necesario en accion = "editar"
    // arg -> accion -> la funcion "chequearCheckboxAlergenos" solo quiero que se ejecute cuándo accion = "editar"
    function getCategoriasAlergenos(arrayAlergeno, data_productos, accion) {
        // function getCategoriasAlergenos(callback) {

        // Preparo los datos para enviar por $_POST
        // Este dato no debo declararlo como variable ya que no lo necesito cuándo envíe en submit del form
        // accion = "listar_Categorias_Alergenos";
        var datos = [{
            name: "accion",
            value: "listar_Categorias_Alergenos"
        }];

        //! Creamos una conexión AJAX - XHR
        $.ajax({
            // async: false,
            url: "./ajax/productos.ajax.php",
            method: "POST",
            data: datos,
            dataType: "json",
            success: function (respuesta) {
                console.log("respuesta ", respuesta);

                // Borramos los datos que anteriormente se hayan cargado con append en anteriores consultas
                $(".selector-categoria").find('option').remove();
                // Borramos los datos que anteriormente se hayan cargado con append en anteriores consultas
                $("#alergenos").find('label').remove();

                // Añadimos la opción inicial al select selector-categoria
                $(".selector-categoria").append("<option value=''>Elige una categoría</option>");
                respuesta['categorias'].forEach(function (categoria, index) {
                    // Añadimos todas las categorias al select selector-categoria desde la BD
                    // $(".selector-categoria").append("<option value=" + categoria.id_categoria + ">" + categoria.tipo + "</option>"); ELIMINAR

                    $(".selector-categoria").append("<option value='" + categoria.id_categoria + "' tipo='" + categoria.tipo + "'>" + categoria.nombre_ES + "</option>")
                });

                // Añadimos todos los alergenos al div alergenos
                respuesta['alergenos'].forEach(function (alergenos, index) {

                    $("#alergenos").append('<label class="ml-2 mr-1" style="width:106px" name_es = "' + alergenos.nombre_ES + '"><input type="checkbox" class="mr-1 checkboxAlergeno" id="' + alergenos.id_alergeno + '" name = "alergenos[]" value="' + alergenos.nombre_ES + '">' + alergenos.nombre_ES + '</label>');

                });

                if (accion == "editar" || accion == "ver") {
                    chequearCheckboxAlergenos(arrayAlergeno);
                    $('#categoria').val(data_productos.dataset.categoria);

                    if (accion=="ver"){
                        inputReadOnlyTrue();    
                    }
                }
            }
        });

        // callback();
    }

    function chequearCheckboxAlergenos(arrayAlergeno) {
        $('.checkboxAlergeno').each(
            function () {
                unAlergeno = $(this);
                // console.log("El checkbox con valor " + $(this).val() + " existe");          
                arrayAlergeno.forEach(function (alergeno) {
                    if ((unAlergeno).val() == alergeno) {
                        $(unAlergeno).prop("checked", true);
                    }
                });
            }
        );
    }

    // Función para crear un array del string recibido de la BD
    function cadenaToArray(cadena) {
        var array = cadena.split(", ");
        return array;
    }
    
    // Inhabilita la escritura en el formulario
    function inputReadOnlyTrue(){
        $('#nombre_ES').attr('readonly', true);
        $('#descripcion_ES').attr('readonly', true);
        $('#nombre_EN').attr('readonly', true);
        $('#descripcion_EN').attr('readonly', true);
        $('#nombre_DE').attr('readonly', true);
        $('#descripcion_DE').attr('readonly', true);
        $('#nombre_CA').attr('readonly', true);
        $('#descripcion_CA').attr('readonly', true);
        
        // Para hacer un selector y checkbox de solo lectura es de la siguiente forma
        $('#categoria').attr('disabled',true);
        $('.checkboxAlergeno').attr('disabled', true);
        
        $('#radiobutton-categoria').hide();       

        $('#medida').attr('readonly', true);
        $('#precio').attr('readonly', true);             
        $('.group-activo').hide();
        $('.form-control-file').hide();
        $('#btnGuardar').hide();
    }

    // Habilita la escritura en el formulario
    function inputReadOnlyFalse(){
        $('#nombre_ES').attr('readonly', false);
        $('#descripcion_ES').attr('readonly', false);
        $('#nombre_EN').attr('readonly', false);
        $('#descripcion_EN').attr('readonly', false);
        $('#nombre_DE').attr('readonly', false);
        $('#descripcion_DE').attr('readonly', false);
        $('#nombre_CA').attr('readonly', false);
        $('#descripcion_CA').attr('readonly', false);
        
        // Para hacer un selector y checkbox de solo lectura es de la siguiente forma
        $('#categoria').attr('disabled',false);
        $('.checkboxAlergeno').attr('disabled', false);

        $('#radiobutton-categoria').show();

        $('#medida').attr('readonly', false);
        $('#precio').attr('readonly', false);             
        $('.group-activo').show();
        $('.form-control-file').show();
        $('#btnGuardar').show();
    }


    $(document).on("click", "#btnNuevo", function () {

        if (accion="ver"){
            inputReadOnlyFalse();
        }

        // Resetea los valores del form y de la imagen
        $("#formProductos").trigger("reset");
        $("#ModalMiImagen").attr('src', '');        
        $(".divImagenVisualizar").removeClass("border mt-3");
        $("#ModalMiImagen").removeClass("my-2");

        getCategoriasAlergenos(null, null, null);

        // Vacio el array datos si existe, para prepararlo para el submit del formulario
        if (typeof datos !== 'undefined') {
            datos.length = 0;
        }

        accion = "crear";
        idPlato = null;

        datos = [{
                name: "accion",
                value: accion
            },
            {
                name: "id_plato",
                value: idPlato
            }
        ];

        $(".modal-header").css("background-color", "blue");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Nuevo Producto");
        $("#ProductoModal").modal("show");
    });

    $(document).on("click", ".btnEliminar", function () {

        accion = "eliminar";
        idPlato = $(this).attr('id_Plato');

        var datos = [{
                name: "accion",
                value: accion
            },
            {
                name: "id_plato",
                value: idPlato
            }
        ];

        swal({
            type: "warning",
            title: "¿Estás seguro que deseas eliminar el Producto?",
            text: "¡Recuerde que esta acción no se puede deshacer!",
            showCancelButton: true,
            confirmButtonColor: "#17cf23",
            confirmButtonText: "Sí, borrar el producto",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar",
            reverseButtons: true,
            focusConfirm: false,
        }).then(function (result) {
            if (result.value) {
                //! Creamos una conexión AJAX - XHR
                $.ajax({
                    url: "./ajax/productos.ajax.php",
                    method: "POST",
                    data: datos,
                    dataType: "json",
                    success: function (resultado) {
                        // console.log("respuesta ", respuesta);
                        if (resultado.respuesta == 'exito') {
                            swal({
                                type: "success",
                                // title y text vienen con la respuesta del modelo
                                title: resultado.title,
                                text: resultado.text,
                                showCancelButton: false,
                                confirmButtonColor: "#17cf23",
                                confirmButtonText: "Aceptar"
                            }).
                            // Redirecciona a la página de nuevo para actualizar datos
                            then(function (result) {
                                if (result.value) {
                                    window.location = "index.php?page=productos";
                                }
                            });
                        } else {
                            swal({
                                type: "error",
                                title: resultado.title,
                                text: resultado.text,
                                showCancelButton: false,
                                confirmButtonColor: "grey",
                                confirmButtonText: "Aceptar"
                            });
                        }
                    }
                });
            }
        });
    });

    // $(document).on("click", "#btnExiste", function () {
    //     if ($("#1").length > 0) {
    //         // hacer algo aquí si el elemento existe            
    //         console.log("Existe el elemento");
    //         console.log($("#1").val());
    //         $('#1').prop("checked", true);
    //     } else {
    //         console.log("NOOOOO Existe el elemento");
    //     }
    // });

    
    $(document).on("click", ".btnEditar", function () {

        if (accion="ver"){
            inputReadOnlyFalse();
        }        

        // Vacio el array datos si existe, para prepararlo para el submit del formularios
        if (typeof datos !== 'undefined') {
            datos.length = 0;
        }

        accion = "editar";
        idPlato = $(this).attr('id_Plato');

        // -- Usamos JS para obtener los datos y cargarlos en el MODAL accediendo a los atributos data --------
        // ! Obtenemos todos los atributos de la etiqueta
        var data_productos = document.getElementById('span' + idPlato);

        // ! Mostramos por consola todo el array obtenido
        // console.log(data_productos.dataset);

        // ! Asignamos datos al Modal
        $('#nombre_ES').val(data_productos.dataset.nombre_es);
        $('#descripcion_ES').val(data_productos.dataset.descripcion_es);
        $('#nombre_EN').val(data_productos.dataset.nombre_en);
        $('#descripcion_EN').val(data_productos.dataset.descripcion_en);
        $('#nombre_DE').val(data_productos.dataset.nombre_de);
        $('#descripcion_DE').val(data_productos.dataset.descripcion_de);
        $('#nombre_CA').val(data_productos.dataset.nombre_ca);
        $('#descripcion_CA').val(data_productos.dataset.descripcion_ca);

        // Se coloca en la llamada AJAX despues de rellenar el select
        // $('#categoria').val(data_productos.dataset.categoria);

        // $('#alergenos').val(data_productos.dataset.alergenos);
        $('#medida').val(data_productos.dataset.medida);
        $('#precio').val(data_productos.dataset.precio);
        $('#activo').val(data_productos.dataset.activo);

        // Siguiente sentencia da fallo. A un input file no se le puede asignar un valor
        // $('#imagen').val(data_productos.dataset.imagen);
        // Toma los datos del dataset para volver a introducrlo en BD en caso de que no hayan modificaciones
        $('#imagen_guardada').val(data_productos.dataset.imagen);

        $("#ModalMiImagen").attr('src', './public/img/productos/' + data_productos.dataset.imagen);

        var alergenos = data_productos.dataset.alergenos;
        alergenos = cadenaToArray(alergenos);
        getCategoriasAlergenos(alergenos, data_productos, accion);
        // -- Usamos JS para obtener los datos y cargarlos en el MODAL accediendo a los atributos data --------


        // -- Usamos JQUERY para obtener los datos y cargarlos en el MODAL de forma tradicional -- Funciona OK-
        // ! Conseguimos los atributos mediante JQUERY
        // nombre_ES = $('#span' + idPlato).attr('data-nombre_ES');
        // descripcion_ES = $('#span' + idPlato).attr('data-descripcion_ES');
        // nombre_EN = $('#span' + idPlato).attr('data-nombre_EN');
        // descripcion_EN = $('#span' + idPlato).attr('data-descripcion_EN');
        // nombre_DE = $('#span' + idPlato).attr('data-nombre_DE');
        // descripcion_DE = $('#span' + idPlato).attr('data-descripcion_DE');
        // nombre_CA = $('#span' + idPlato).attr('data-nombre_CA');
        // descripcion_CA = $('#span' + idPlato).attr('data-descripcion_CA');
        // // alergenos = $('#span' + idPlato).attr('data-alergenos');
        // categoria = $('#span' + idPlato).attr('data-categoria');
        // medida = $('#span' + idPlato).attr('data-medida');
        // precio = $('#span' + idPlato).attr('data-precio');
        // activo = $('#span' + idPlato).attr('data-activo');
        // imagen = $('#span' + idPlato).attr('data-imagen');
        //
        // ! Asignamos datos al MODAL
        // $('#nombre_ES').val(nombre_ES);
        // $('#descripcion_ES').val(descripcion_ES);
        // $('#nombre_EN').val(nombre_EN);
        // $('#descripcion_EN').val(descripcion_EN);
        // $('#nombre_DE').val(nombre_DE);
        // $('#descripcion_DE').val(descripcion_DE);
        // $('#nombre_CA').val(nombre_CA);
        // $('#descripcion_CA').val(descripcion_CA);
        // $('#categoria').val(categoria);
        // // $('#alergenos').val(alergenos);
        // $('#medida').val(medida);
        // $('#precio').val(precio);
        // $('#activo').val(activo);
        // $('#imagen').val(imagen);
        // -- Usamos JQUERY para obtener los datos y cargarlos en el MODAL de forma tradicional -- Funciona O
        
        $(".divImagenVisualizar").addClass("border mt-3");
        $("#ModalMiImagen").addClass("my-2");
        
        $(".modal-header").css("background-color", "orange");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Producto");
        $("#ProductoModal").modal("show");
        // });

    });


    $(document).on("click", ".btnVer", function () {

        // inputReadOnlyTrue();

        // Vacio el array datos si existe, para prepararlo para el submit del formularios
        // if (typeof datos !== 'undefined') {
        //     datos.length = 0;
        // }

        accion = "ver";
        idPlato = $(this).attr('id_Plato');

        // -- Usamos JS para obtener los datos y cargarlos en el MODAL accediendo a los atributos data --------
        // ! Obtenemos todos los atributos de la etiqueta
        var data_productos = document.getElementById('span' + idPlato);        

        // ! Asignamos datos al Modal
        $('#nombre_ES').val(data_productos.dataset.nombre_es);
        $('#descripcion_ES').val(data_productos.dataset.descripcion_es);
        $('#nombre_EN').val(data_productos.dataset.nombre_en);
        $('#descripcion_EN').val(data_productos.dataset.descripcion_en);
        $('#nombre_DE').val(data_productos.dataset.nombre_de);
        $('#descripcion_DE').val(data_productos.dataset.descripcion_de);
        $('#nombre_CA').val(data_productos.dataset.nombre_ca);
        $('#descripcion_CA').val(data_productos.dataset.descripcion_ca);                
        $('#medida').val(data_productos.dataset.medida);
        $('#precio').val(data_productos.dataset.precio);
        $('#activo').val(data_productos.dataset.activo);
      
        $("#ModalMiImagen").attr('src', './public/img/productos/' + data_productos.dataset.imagen);

        var alergenos = data_productos.dataset.alergenos;
        alergenos = cadenaToArray(alergenos);
        getCategoriasAlergenos(alergenos, data_productos, accion);
        // -- Usamos JS para obtener los datos y cargarlos en el MODAL accediendo a los atributos data --------
        
        $(".divImagenVisualizar").addClass("border mt-3");
        $("#ModalMiImagen").addClass("my-2");
        
        $(".modal-header").css("background-color", "green");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Ver Producto");
        $("#ProductoModal").modal("show");        

    });

    //TODO radiobutton
    //Muestra y oculta las categorias                                                
    $("#bebida, #comida, #sinFiltro").change(function () {
        if ($("#bebida").is(":checked")) {
            $('.selector-categoria option[tipo="comida"]').hide();
            $('.selector-categoria option[tipo="bebida"]').show();
        } else if ($("#comida").is(":checked")) {
            $('.selector-categoria option[tipo="bebida"]').hide();
            $('.selector-categoria option[tipo="comida"]').show();
        } else if ($("#sinFiltro").is(":checked")) {
            $('.selector-categoria option[tipo="bebida"]').show();
            $('.selector-categoria option[tipo="comida"]').show();
        }
    });  


    $("#formProductos").submit(function (e) {
        e.preventDefault();

        // #707 this equivale a los datos enviados por submit
        // var datos = $(this).serializeArray();

        var formProductos = document.getElementById("formProductos");

        var datos = new FormData(formProductos);
        var file = $('#imagen')[0].files[0];
        datos.append('imagen', file);
        datos.append("accion", accion);
        datos.append("id_plato", idPlato);

        // añade al POST la clave acción con el valor de la tarea a realizar, en la última posición
        // 
        // // TODO Agrego files ya que desde el submit normal el ajax no lo toma
        // datos[indice++] = ({
        //     name: "imagen",
        //     value: imagen.value
        // });

        // datos[indice++] = ({
        //     name: "accion",
        //     value: accion
        // });
        // datos[indice++] = ({
        //     name: "id_plato",
        //     value: idPlato
        // });

        $.ajax({
            // #707 destino a dónde se van a enviar los datos. Lo obtiene del atributo action del form
            url: $(this).attr('action'),
            // #707 tipo de envío de datos get o post. Obtiene el tipo del atributo method del form
            // type: $(this).attr('method'),
            // #707 tomamos los datos a enviar
            // data: datos,
            // #707 formato del envío de los datos. En este caso json            
            dataType: "json",
            // #707 success -> significa que si tuvo éxito la llamada ajax hacer lo siguiente

            dataType: "json",
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            //  url: url,
            data: datos,



            success: function (data) {
                var resultado = data;
                if (resultado.respuesta == 'exito') {
                    swal({
                        type: "success",
                        // title y text vienen con la respuesta del modelo
                        title: resultado.title,
                        // text: resultado.text,
                        html: resultado.text,
                        showCancelButton: false,
                        confirmButtonColor: "#17cf23",
                        confirmButtonText: "Aceptar"
                    }).
                    // Redirecciona a la página de nuevo para actualizar datos
                    then(function (result) {
                        if (result.value) {                            
                            window.location = "index.php?page=productos";
                        }
                    });
                } else {
                    swal({
                        type: "error",
                        title: resultado.title,
                        // text: resultado.text,
                        html: resultado.text,
                        showCancelButton: false,
                        confirmButtonColor: "grey",
                        confirmButtonText: "Aceptar"
                    });
                }
            }

            // TODO Cargar datos en tabla sin hacer consulta a la BD modificara para este proyecto
            // success: function(data){  
            //     console.log(data);
            //     id = data[0].id;            
            //     nombre = data[0].nombre;
            //     pais = data[0].pais;
            //     edad = data[0].edad;
            //     if(opcion == 1){tablaPersonas.row.add([id,nombre,pais,edad]).draw();}
            //     else{tablaPersonas.row(fila).data([id,nombre,pais,edad]).draw();}            

        });
        $("#ProductoModal").modal("hide");
    });
});