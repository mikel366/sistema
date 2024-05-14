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
                "estado_usuario" => 1
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

    /*=============================================
INGRESO DE USUARIO
=============================================*/
    // static public function ctrIngresoUsuario()
    // {
    //     //echo $_POST["ingresoEmail"];
    //     if (isset($_POST["ingresoEmail"])) {

    //         if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][azA-Z0-9_]+)*[.][a-zAZ]{2,4}$/', $_POST["ingresoEmail"])) {
    //             $encriptar = crypt(
    //                 $_POST["passwordUsuario"],
    //                 '$2a$07$hdgfamkdhdshsjhduaostyexdj$'
    //             );
    //             $tabla     = "usuarios";
    //             $item      = "email_usuario";
    //             $valor     = $_POST["ingresoEmail"];
    //             $respuesta = UsuariosModelo::mdlMostrarUsuarios(
    //                 $tabla,
    //                 $item,
    //                 $valor
    //             );
    //             if (is_array($respuesta) && ($respuesta["email_usuario"] ==
    //                 $_POST["ingresoEmail"] && $respuesta["password_usuario"] == $encriptar)) {
    //                 if ($respuesta["estado_usuario"] == 1) {
    //                     echo '<script>
    //                     fncSweetAlert("loading", "Ingresando..", "")
    //                     </script>';
    //                     $_SESSION["session"]   = "ok";
    //                     $_SESSION["idUsuario"] = $respuesta["id_usuario"];
    //                     $_SESSION["nombre"]    = $respuesta["nombre_usuario"];
    //                     $_SESSION["email"]     = $respuesta["email_usuario"];


    //                     echo '<script>
    //                     window.location = "inicio";
    //                     </script>';
    //                 } else {
    //                 }
    //             } else {
    //                 echo '<br>
    //     <div class="alert alert-danger">El usuario aún no
    //     está activado</div>';
    //             }
    //         } else {
    //             echo '<script>
    // fncSweetAlert("error", "Error al intentar acceder,

    // pruebe nuevamente", "' . PlantillaControlador::url() . '")
    // </script>';
    //         }
    //         //}
    //     }
    // }


    /*=============================================
INGRESO DE USUARIO
=============================================*/

    static public function ctrIngresoUsuario()
    {
        //Campo del formulario login
        if (isset($_POST["email_usuario"])) 
        {

            if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][azA-Z0-9_]+)*[.][a-zAZ]{2,4}$/', $_POST["email_usuario"])) 
            {

                $password = crypt($_POST["password_usuario"], '$2a$07$hdgfamkdhdshsjhduaostyexdj$');
                $tabla = "usuarios";
                //Campo de la BD para login de usuario
                $item = "email_usuario";
                $valor = $_POST["email_usuario"];

                $respuesta = UsuariosModelo::mdlMostrarUsuarios($tabla, $item, $valor);

                if (is_array($respuesta) && ($respuesta["email_usuario"] == $valor && $respuesta["password_usuario"] == $password)) 
                {

                    // 1 - Activo
                    // 0 - Inactivo

                    if ($respuesta["estado_usuario"] == 1) 
                    {

                        $_SESSION["session"] = "ok";
                        $_SESSION["nombre_usuario"] = $respuesta["nombre_usuario"];
                        $_SESSION["email_usuario"] = $respuesta["email_usuario"];
                        $_SESSION["id_usuario"] = $respuesta["id_usuario"];

                        echo '<script>
                       fncSweetAlert("loading", "Ingresando...", "")
                       window.location = "home";
                       </script>';
                    } 
                    else 
                    {
                        echo '<div class="alert alert-danger">El usuario no está activado</div>';
                    }
                } 
                else 
                {
                    echo '<div class="alert alert-danger">Error en usuario o contraseña</div>';
                }
            } 
            else 
            {
                echo '<div class="alert alert-danger">Error al intentar acceder</div>';
            }
        }
    }

}