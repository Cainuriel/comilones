<?php

require_once '../controllers/db-connect.php';

class UsuariosModel
{

    const TABLA = 'usuarios';

    static public function crearUsuarioMdl($datos, $conn)
    {

        $tabla = 'usuarios';

        $nombre = $datos['nombre'];
        $email = $datos['email'];
        $pass = $datos['pass'];
        $tipo = $datos['tipo'];
        $foto = $datos['foto'];


        $create = "INSERT INTO $tabla (`nombre`, `email`, `pass`, `tipo`, `foto`) VALUES ( ? , ?, ?, ? , ? )";

    
        //$stmt = (conn::conectar())->prepare($create);
        $stmt = $conn->prepare($create);
        $stmt->bind_param('sssss', $nombre, $email, $pass, $tipo, $foto);
        $stmt->execute();

        $filas = $stmt->affected_rows;
        $id_nuevo_registro = $stmt->insert_id;

        if ($filas == 0) {
            return $stmt->error;
        } else {
            return "ok";
        }


        $stmt->close();
    }

    static public function listarUsuariosMdl($conn)
    {

        $read = "SELECT * FROM usuarios";
       

        $resultado = $conn->query($read);
        $num_resultados = $resultado->num_rows;

        $usuarios = array();
        for (
            $i = 0;
            $i < $num_resultados;
            $i++
        ) {
            $row = $resultado->fetch_assoc();
            $usuarios[] = $row;
        }

        $conn->close();

        return $usuarios;
    }

    static public function loginUsuariosMdl($mail, $conn)
    {

        $tabla = 'usuarios';

        $email = $mail;

        $login = "SELECT * FROM $tabla WHERE email = ?";

        $stmt = $conn->prepare($login);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $usuario = $resultado->fetch_assoc();

        return $usuario;

        $stmt->close();
    }

    static public function mostrarUsuarioMdl($id, $conn)
    {

        $tabla = 'usuarios';

        $id_usuario = $id;

        $readUser = "SELECT * FROM $tabla WHERE id_usuario = ?";

        $stmt = $conn->prepare($readUser);
        $stmt->bind_param('s', $id_usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $usuario = $resultado->fetch_assoc();

        return $usuario;

        $stmt->close();
    }

    static public function editarUsuarioMdl($datos, $conn)
    {

        $tabla = 'usuarios';

        $id = $datos['id_usuario'];
        $nombre = $datos['nombre'];
        $email = $datos['email'];
        $pass = $datos['pass'];
        $tipo = $datos['tipo'];
        $foto = $datos['foto'];

        $update = "UPDATE $tabla SET nombre = ?, email= ?, pass= ?, tipo= ?, foto= ? WHERE id_usuario = ?";


        $stmt = $conn->prepare($update);
        $stmt->bind_param('ssssss', $nombre, $email, $pass, $tipo, $foto, $id);
        $stmt->execute();

        $filas = $stmt->affected_rows;

        if ($filas == -1) {
            return $stmt->error;
        } else {
            return "ok";
        }

        $stmt->close();
    }

    static public function eliminarUsuarioMdl($id, $conn)
    {

        $tabla = "usuarios";

        $idUsuario = $id;

        $delete = "DELETE FROM $tabla WHERE id_usuario = ?";



        $stmt = $conn->prepare($delete);
        $stmt->bind_param("s", $idUsuario);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $conn->close();
    }
}
