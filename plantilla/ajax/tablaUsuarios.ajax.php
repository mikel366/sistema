<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";
require_once "../controladores/roles.controlador.php";


class TablaUsuarios
{
    /*========================
    MOSTRAR TABLA DE PRODUCTOS
    =============================================*/

    public function mostrarTablaUsuarios()
    {
        $usuarios = UsuariosControlador::ctrMostrarUsuarios(null, null);


        //print_r(count($productos));

        if (count($usuarios) == 0) {

            echo '{"data": []}';

            return;
        }

        $datosJson = '{"data" : [';

        for ($i = 0; $i < count($usuarios); $i++) {
            if ($usuarios[$i]["estado_usuario"] == 1) {
                $estado = "<span class='badge text-bg-danger'>Inactivo</span>";
            } else {
                $estado = "<span class='badge text-bg-success'>Activo</span>";
            }

            $rol = RolesControlador::ctrObtenerNombreRol($usuarios[$i]["id_rol_usuario"]);

            //Traemos las acciones
            $acciones = "<button type='button' class='btn btn-warning btnBoton' tipo='editar' idUsuario='" . $usuarios[$i]["id_usuario"] . "' data-bs-toggle='modal' data-bs-target='#editarUsuarioModal'><i class='fas fa-edit'></i></button> <button type='button' id_usuario='" . $usuarios[$i]["id_usuario"] . "' class='btn btn-danger btnEliminarUsuario'><i class='fas fa-trash'></i></button>";


            $datosJson .= '[
                        "' . $usuarios[$i]["nombre_usuario"] . '",
                        "' . $usuarios[$i]["email_usuario"] . '",
                        "' . $rol . '",
                        "' . $estado . '",
                        "' . $acciones . '"
                    ],';
        }
        $datosJson = substr($datosJson, 0, -1);

        $datosJson .= ']
        }';

        echo $datosJson;
    }
}


$activarUsuarios = new TablaUsuarios(); 
$activarUsuarios->mostrarTablaUsuarios();