<?php
// echo "Valores recibidos por \$_POST en el controlador: <br>";
// var_dump($_POST);
// echo "<br><br>";

class UsuariosController
{

    static public function crearUsuarioCtrl()
    {

        if (isset($_POST['crearUsuario'])) {

            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['nombre']) && preg_match('/^[a-zA-Z0-9@.]+$/', $_POST['email']) && preg_match('/^[a-zA-Z0-9]+$/', $_POST['pass']) && preg_match('/^[a-zA-Z0-9]+$/', $_POST['tipo'])) {

                /*! Subir imagen */

                $imagen = $_FILES['foto'];
                //var_dump($imagen);

                if (!empty($imagen['name'])) {

                    // Comprobamos si es un tipo de archivo válido
                    if ($imagen['type'] == "image/jpg" || $imagen['type'] == "image/png" || $imagen['type'] == "image/jpeg") {

                        //Comprobamos si el tamaño es menor al máximo permitido
                        if ($imagen['size'] < 2000000) {

                            //Creamos el archivo y lo subimos a la carpeta destino
                            $foto_usuario = time() . $imagen['name'];
                            $destino = 'public/img/users/' . $foto_usuario;
                            $origen = $imagen['tmp_name'];

                            move_uploaded_file($origen, $destino);
                        } else {
                            echo '<script>

                        swal({

                            type: "error",
                            title: "¡El tamaño del archivo excede el máximo permitido, solamente se permiten archivos hasta 2MB!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"

                        }).then(function(result){

                            if(result.value){
                            
                                window.location = "index.php?page=usuarios";

                            }
                        });
                
                        </script>';
                        }
                    } else {
                        echo '<script>

					swal({

						type: "error",
						title: "¡Tipo de archivo no permitido, solamente se permiten archivos JPEG, JPG o PNG!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "index.php?page=usuarios";

						}
					});
			
					</script>';
                    }
                } else {
                    $foto_usuario = "default.png";
                }

                if ($foto_usuario != NULL) {

                    $datos = array(
                        'nombre' => htmlspecialchars($_POST['nombre']),
                        'email' => htmlspecialchars($_POST['email']),
                        'pass' => htmlspecialchars($_POST['pass']),
                        'tipo' => htmlspecialchars($_POST['tipo']),
                        'foto' => $foto_usuario
                    );

                    //Insertamos el usuario en la BBDD

                    $respuesta = UsuariosModel::crearUsuarioMdl($datos);

                    if ($respuesta == "ok") {
                        echo '<script>

                        swal({

                            type: "success",
                            title: "¡El usuario ' . $datos['nombre'] . ' ha sido creado con éxito!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"

                        }).then(function(result){

                            if(result.value){
                            
                                window.location = "index.php?page=usuarios";

                            }

                        });
                    </script>';
                    }
                }
            } else {
                echo '<script>

					swal({

						type: "error",
						title: "¡No se permite el uso de caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "index.php?page=usuarios";

						}

					});
				

					</script>';
            }
        }
    }

    static public function listarUsuariosCtrl()
    {

        $usuarios = UsuariosModel::listarUsuariosMdl();

        return $usuarios;
    }

    static public function mostrarUsuarioCtr($id)
    {

        $usuario = UsuariosModel::mostrarUsuarioMdl($id);

        return $usuario;
    }


    public function loginUsuarioCtr()
    {

        if (isset($_POST['login'])) {

            $error = "";

            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && preg_match('/^[a-zA-Z0-9]+$/', $_POST['pass'])) {

                $email = $_POST['email'];
                $pass = $_POST['pass'];

                $respuesta = UsuariosModel::loginUsuariosMdl($email);

                if ($respuesta != null) {
                    $emailDB = $respuesta['email'];
                    $passDB = $respuesta['pass'];
                    if (($emailDB == $email) && ($passDB == $pass)) {
                        $_SESSION['usuario'] = $respuesta['nombre'];
                        $_SESSION['rol'] = $respuesta['tipo'];
                        $_SESSION['foto_usuario'] = $respuesta['foto'];
                        echo '<script> window.location = "index.php"</script>';
                    } else {
                        $error = "Los datos introducidos no son correctos";
                        echo '<div class="alert alert-danger text-center mt-3" role="alert">' . $error . '</div>';
                    }
                } else {
                    $error = "Los datos introducidos no son correctos";
                    echo '<div class="alert alert-danger text-center mt-3" role="alert">' . $error . '</div>';
                    //echo $error;
                }



                //var_dump($respuesta);
            } else {
                $error = "No se permiten caracteres especiales";
                echo '<div class="alert alert-danger text-center mt-3" role="alert">' . $error . '</div>';
            }
        }
    }

    static public function editarUsuarioCtrl()
    {

        if (isset($_POST['editarUsuario'])) {

            if ($_POST['editarPass'] == "") {
                $pass = $_POST['lastPass'];
            } else {
                $pass = $_POST['editarPass'];
            }


            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['editarNombre']) && filter_var($_POST['editarEmail'], FILTER_VALIDATE_EMAIL) && preg_match('/^[a-zA-Z0-9 ]+$/', $pass) && preg_match('/^[a-zA-Z0-9 ]+$/', $_POST['editarTipo'])) {

                $imagen = $_FILES['nuevaFoto'];
                //var_dump($imagen);

                if (!empty($imagen['name'])) {

                    // Comprobamos si es un tipo de archivo válido
                    if ($imagen['type'] == "image/jpg" || $imagen['type'] == "image/png" || $imagen['type'] == "image/jpeg") {

                        //Comprobamos si el tamaño es menor al máximo permitido
                        if ($imagen['size'] < 2000000) {

                            //Creamos el archivo y lo subimos a la carpeta destino
                            $foto_usuario = time() . $imagen['name'];
                            $destino = 'public/img/users/' . $foto_usuario;
                            $origen = $imagen['tmp_name'];

                            move_uploaded_file($origen, $destino);
                        } else {
                            echo '<script>

                        swal({

                            type: "error",
                            title: "¡El tamaño del archivo excede el máximo permitido, solamente se permiten archivos hasta 2MB!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"

                        }).then(function(result){

                            if(result.value){
                            
                                window.location = "index.php?page=usuarios";

                            }
                        });
                
                        </script>';
                        }
                    } else {
                        echo '<script>

					swal({

						type: "error",
						title: "¡Tipo de archivo no permitido, solamente se permiten archivos JPEG, JPG o PNG!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "index.php?page=usuarios";

						}
					});
			
                    </script>';

                        die();
                    }
                } else {
                    $foto_usuario = $_POST['fotoUsuario'];
                }

                //echo $foto_usuario;
                $_SESSION['foto_usuario'] = $foto_usuario;

                $datos = array(
                    'id_usuario' => $_POST['id'],
                    'nombre' => htmlspecialchars($_POST['editarNombre']),
                    'email' => htmlspecialchars($_POST['editarEmail']),
                    'pass' => htmlspecialchars($pass),
                    'tipo' => htmlspecialchars($_POST['editarTipo']),
                    'foto' => $foto_usuario
                );

                //var_dump($datos);

                $respuesta = UsuariosModel::editarUsuarioMdl($datos);

                if ($respuesta == "ok") {
                    echo '<script>

					swal({

						type: "success",
						title: "¡El usuario ' . $datos['nombre'] . ' se ha actualizado con éxito!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "index.php?page=usuarios";

						}

					});
				

					</script>';
                }
            } else {
                echo '<script>

					swal({

						type: "error",
						title: "¡No se permite el uso de caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "index.php?page=usuarios";

						}

					});
				

					</script>';
            }
        }
    }

    static public function eliminarUsuarioCtr()
    {

        if (isset($_GET['user'])) {

            $usuario = $_GET['user'];

            $respuesta = UsuariosModel::eliminarUsuarioMdl($usuario);

            if ($respuesta == "ok") {
                echo '<script>
                swal({
                        type: "success",
                        title: "El usuario ha sido borrado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if(result.value){
                            window.location = "index.php?page=usuarios"
                        }
                    })
                </script>';
            }
        }
    }
}
