<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";
require_once "../controladores/roles.controlador.php";

/*class TablaUsuarios
{
    

    public function mostrarTablaUsuarios()
    {
        $item = null;
        $valor = null;
        $usuarios = UsuariosControlador::ctrMostrarUsuarios($item, $valor);

        if(count($usuarios)== 0)
        {
            echo '{"data":[]}';
            return;
        }

        $datosJson='{"data": [';

        for($i=0; $i<count($usuarios); $i++)
        {
            if($usuarios[$i]["estado_usuario"]==0)
            {
                $colorEstado = "btn-danger";
                $textoEstado = "No disponible";
                $estadoUsuario = 1;
            }
            else
            {
                $colorEstado = "btn-succes";
                $textoEstado = "Disponible";
                $estadoUsuario = 0;
            }

            $estado = "<button class='btn " . $colorEstado . " btn-xxs btnActivar' estado_usuario='" . $estadoUsuario . "' id_usuario='" . $usuarios[$i]["id_usuario"] . "'>" . $textoEstado . "</button>";

            $btnEditar = "";
            $btnEliminar = "";

            if($_SESSION["permisosMod"]["u"])
            {
                $btnEditar = "<button class='btn btn-primary shadow btn-xs sharp me-1 btnEditarUsuario' id_usuario='" . $usuarios[$i]["id_usuario"] . "' data-bs-toggle='modal' data-bs-target='#modalEditarUsuario'><i class='fa fa-pencil'></i></button>"; 
            }
            if($_SESSION["permisosMod"]["d"])
            {
                $btnEliminar = "<button class='btn btn-danger shadow btn-xs sharp btnEliminarUsuario' id_rol_usuario='" . $usuarios[$i]["id_rol_usuario"] . "' id_usuario='" . $usuarios[$i]["id_usuario"] . "'><i class='fas fa-trash'></i></button>";
            }

            $botones = $btnEditar. '' . $btnEliminar;

            $datosJson.='[
                "' . str_replace("\"", "'", $usuarios[$i]["nombre_usuario"]) . '",
                "' . str_replace("\"", "'", $usuarios[$i]["email_usuario"]) . '",
                "' . str_replace("\"", "'", $usuarios[$i]["id_rol_usuario"]) . '",
                "' . $estado . '",
                "' . $botones . '"
            ],'; 
        }

        $datosJson = substr($datosJson, 0, -1);

        $datosJson .= ']
        }';

        echo $datosJson;
    }
        
}*/

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
                $estado = "<span class='badge text-bg-success'>Activo</span>";
            } else {
                $estado = "<span class='badge text-bg-danger'>Inactivo</span>";
            }

            $rol = RolesControlador::ctrObtenerNombreRol($usuarios[$i]["id_rol_usuario"]);

            //Traemos las acciones
            $acciones = "<button type='button' class='btn btn-warning btnBoton editarUsuario' tipo='editar' idUsuario='" . $usuarios[$i]["id_usuario"] . "' data-bs-toggle='modal' data-bs-target='#editarUsuarioModal'><i class='fas fa-edit'></i></button> <button type='button' id_usuario='" . $usuarios[$i]["id_usuario"] . "' class='btn btn-danger btnEliminarUsuario'><i class='fas fa-trash'></i></button>";


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