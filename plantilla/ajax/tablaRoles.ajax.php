<?php
require_once '../controladores/roles.controlador.php';
require_once '../modelos/roles.modelo.php';


class TablaRol
{


    public function mostrarTablaRoles()
    {
        $roles = RolesControlador::ctrMostrarRoles(null, null);


        if (count($roles) == 0) {

            echo '{"data": []}';

            return;
        }

        $datosJson = '{"data" : [';

        for ($i = 0; $i < count($roles); $i++) {
            
            
            //Traemos las acciones
            $acciones = "<button type='button' class='btn btn-warning btnBoton' data-bs-toggle='modal' data-bs-target='#editarRol' tipo='editar' idRol='" . $roles[$i]["id_rol"] . "'><i class='fas fa-edit'></i></button> <button type='button' data-id_rol = '" . $roles[$i]["id_rol"] . "' class='btn btn-danger btnEliminarRol'><i class='fas fa-trash'></i></button>";

            
            

            $datosJson .= '[
                        "' . $roles[$i]["id_rol"] . '",
                        "' . $roles[$i]["nombre_rol"] . '",
                        "' . $acciones . '"
                    ],';
        }
        $datosJson = substr($datosJson, 0, -1);

        $datosJson .= ']
        }';

        echo $datosJson;
    }
}

/*========================
    ACTIVAR TABLA DE PRODUCTOS
    =============================================*/
$activarroles = new TablaRol();
$activarroles->mostrarTablaRoles();