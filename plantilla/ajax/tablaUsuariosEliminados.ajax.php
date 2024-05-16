<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";
require_once "../controladores/roles.controlador.php";


class TablaUsuariosEliminados
{
public function mostrarTablaUsuariosEliminados()
    {
        
        $usuarios = UsuariosControlador::ctrMostrarUsuariosEliminados(null, null);


        //print_r(count($productos));

        if (count($usuarios) == 0) {

            echo '{"data": []}';

            return;
        }

        $datosJson = '{"data" : [';

        for ($i = 0; $i < count($usuarios); $i++) {
            if ($usuarios[$i]["estado_usuario_eliminado"] == 1) {
                $estado = "<span class='badge text-bg-danger'>Inactivo</span>";
            } else {
                $estado = "<span class='badge text-bg-success'>Activo</span>";
            }

            $rol = RolesControlador::ctrObtenerNombreRol($usuarios[$i]["id_rol_usuario_eliminado"]);

            //Traemos las acciones
            $acciones = "<button type='button' class='btn btn-warning btnRestablecerUsuario' data-id_usuario='" . $usuarios[$i]["id_usuario_eliminado"] . "'><i class='mdi mdi-restore-alert'></i></button> <button type='button' data-id_usuario='" . $usuarios[$i]["id_usuario_eliminado"] . "' class='btn btn-danger btnEliminarUsuario'><i class='fas fa-trash'></i></button>";



            $datosJson .= '[
                        "' . $usuarios[$i]["nombre_usuario_eliminado"] . '",
                        "' . $usuarios[$i]["email_usuario_eliminado"] . '",
                        "' . $rol . '",
                        "' . $estado . '",
                        "' . $usuarios[$i]["fecha_eliminacion_usuario"] . '",
                        "' . $acciones . '"
                    ],';
        }
        $datosJson = substr($datosJson, 0, -1);

        $datosJson .= ']
        }';

        echo $datosJson;
    }
}
$activarUsuarios = new TablaUsuariosEliminados(); 
$activarUsuarios->mostrarTablaUsuariosEliminados();