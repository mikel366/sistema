<?php

class UsuariosControlador
{
    //Método para traer información
    static public function ctrMostrarUsuarios($item, $valor)
    {

        $tabla     = "usuarios";
        $respuesta = UsuariosModelo::mdlMostrarUsuarios($tabla, $item, $valor);

        return $respuesta;
    }

    static public function ctrMostrarUsuariosEliminados($item, $valor)
    {

        $tabla     = "usuarios_eliminados";
        $respuesta = UsuariosModelo::mdlMostrarUsuarios($tabla, $item, $valor);

        return $respuesta;
    }


    public function ctrAgregarUsuario()
    {
        if (isset($_POST["nombre_usuario"])) {

            $tabla = "usuarios";

            $password = crypt($_POST["password_usuario"], '$2a$07$hdgfamkdhdshsjhduaostyexdj$');


            $datos = array(
                "nombre_usuario" => $_POST["nombre_usuario"],
                "email_usuario" => $_POST["email_usuario"],
                "password_usuario" => $password,
                "id_rol_usuario" => $_POST["id_rol_usuario"],
                "estado_usuario" => $_POST["estado_usuario"]
            );

            //print_r($datos);

            //return;

            //podemos volver a la página de datos
            $url = PlantillaControlador::url() . "usuarios";

            $respuesta = UsuariosModelo::mdlAgregarUsuario($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert("success","El usuario se agregó correctamente", "' . $url . '"
                    );
                    </script>';
            }
        }
    }


    static public function ctrIngresoUsuario()
    {
        //Campo del formulario login
        if (isset($_POST["email_usuario"])) {

            if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][azA-Z0-9_]+)*[.][a-zAZ]{2,4}$/', $_POST["email_usuario"])) {

                $password = crypt($_POST["password_usuario"], '$2a$07$hdgfamkdhdshsjhduaostyexdj$');

                $tabla = "usuarios";
                //Campo de la BD para login de usuario
                $item = "email_usuario";
                $valor = $_POST["email_usuario"];

                $respuesta = UsuariosModelo::mdlMostrarUsuarios($tabla, $item, $valor);

                if (is_array($respuesta) && ($respuesta["email_usuario"] == $valor && $respuesta["password_usuario"] == $password)) {

                    // 2 - Activo
                    // 1 - Inactivo

                    if ($respuesta["estado_usuario"] == 2) {

                        $_SESSION["session"] = "ok";
                        $_SESSION["nombre_usuario"] = $respuesta["nombre_usuario"];
                        $_SESSION["email_usuario"] = $respuesta["email_usuario"];
                        $_SESSION["id_usuario"] = $respuesta["id_usuario"];

                        echo '<script>
                       fncSweetAlert("loading", "Ingresando...", "")
                       window.location = "home";
                       </script>';
                    } else {
                        echo '<div class="alert alert-danger">El usuario no está activado</div>';
                    }
                } else {
                    echo '<div class="alert alert-danger">Error en usuario o contraseña</div>';
                }
            } else {
                echo '<div class="alert alert-danger">Error al intentar acceder</div>';
            }
        }
    }

    static public function ctrExportarUsuario()
    {
        $url = PlantillaControlador::url() . "usuarios";


        if (isset($_GET["idUsuarioExportar"])) {

            $tabla = "usuarios";
            $dato = $_GET["idUsuarioExportar"];
            $respuesta = UsuariosModelo::mdlExportarUsuario($tabla, $dato);
            //if ($respuesta == "ok") {
            if ($respuesta == "ok") {
                echo '<script>
    fncSweetAlert("success", "El usuario se eliminó correctamente", "' . $url . '");
    </script>';
            }
            //}
        }
    }

    static public function ctrRestrablecerUsuario()
    {
        $url = PlantillaControlador::url() . "usuarios_eliminados";

        if (isset($_GET["idUsuarioRestabler"])) {
            $tabla = "usuarios_eliminados";
            $dato = $_GET["idUsuarioRestabler"];
            $respuesta = UsuariosModelo::mdlRestablecerUsuario($tabla, $dato);
            if ($respuesta == "ok") {
                echo '<script>
                fncSweetAlert("success", "El usuario se restableció correctamente", "' . $url . '");
                </script>';
            }
        }
    }

    static public function ctrEliminarUsuario()
    {
        $url = PlantillaControlador::url() . "usuarios_eliminados";


        if (isset($_GET["idUsuarioEliminar"])) {

            $tabla = "usuarios_eliminados";
            $dato = $_GET["idUsuarioEliminar"];
            $respuesta = UsuariosModelo::mdlEliminarUsuario($tabla, $dato);
            //if ($respuesta == "ok") {
            if ($respuesta == "ok") {
                echo '<script>
    fncSweetAlert("success", "El usuario se eliminó correctamente", "' . $url . '");
    </script>';
            }
            //}
        }
    }

    static public function ctrEditarUsuario()
    {
        if (isset($_POST["editar_nombre_usuario"])) {

            $usuario = UsuariosControlador::ctrMostrarUsuarios("id_usuario", $_POST["editar_id_usuario"]);
            // Verificamos si se proporcionó una nueva contraseña
            if (!empty($_POST["editar_password_usuario"])) {
                $password = crypt($_POST["editar_password_usuario"], '$2a$07$hdgfamkdhdshsjhduaostyexdj$');
            } else {
                // Si no se proporciona una nueva contraseña, mantenemos la contraseña actual
                $password = $usuario["password_usuario"];
            }

            $datos = array(
                "nombre_usuario" => $_POST["editar_nombre_usuario"],
                "email_usuario" => $_POST["editar_email_usuario"],
                "password_usuario" => $password,
                "id_rol_usuario" => $_POST["editar_id_rol_usuario"],
                "estado_usuario" => $_POST["editar_estado_usuario"],
                "id_usuario" => $_POST["editar_id_usuario"] // Agregamos el ID del usuario
            );

            $tabla = "usuarios";

            $url = PlantillaControlador::url() . "usuarios";

            $respuesta = UsuariosModelo::mdlEditarUsuario($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                fncSweetAlert("success","El usuario se modificó correctamente", "' . $url . '"
                );
                </script>';
            } else {
                echo '<script>
                fncSweetAlert("error","Error al modificar el usuario", "")
                </script>';
            }
        }
    }
}
