<?php
require_once '../controladores/marcas.controlador.php';
require_once '../modelos/marcas.modelo.php';


class TablaMarcas
{

    public function mostrarTablaMarcas()
    {
        $marcas = MarcasControlador::ctrMostrarMarcas(null, null);

        

        if (count($marcas) == 0) {

            echo '{"data": []}';

            return;
        }

      
        $datosJson = '{"data" : [';

        for ($i = 0; $i < count($marcas); $i++) {
            
            
            //Traemos las acciones
            $acciones = "<button type='button' class='btn btn-warning btnBoton' data-bs-toggle='modal' data-bs-target='#editarMarca' tipo='editar' idMarca='" . $marcas[$i]["id_marca"] . "'><i class='fas fa-edit'></i></button> <button type='button' data-id_marca = '" . $marcas[$i]["id_marca"] . "' class='btn btn-danger btnEliminarMarca'><i class='fas fa-trash'></i></button>";

            
            

            $datosJson .= '[
                        "' . $marcas[$i]["id_marca"] . '",
                        "' . $marcas[$i]["nombre_marca"] . '",
                        "' . $acciones . '"
                    ],';
        }
        $datosJson = substr($datosJson, 0, -1);

        $datosJson .= ']
        }';

        echo $datosJson;
    }
}


$activarmarcas = new TablaMarcas();
$activarmarcas->mostrarTablaMarcas();