<?php
require_once '../controladores/categorias.controlador.php';
require_once '../modelos/categorias.modelo.php';


class TablaCategoria
{
    /*========================
    MOSTRAR TABLA DE PRODUCTOS
    =============================================*/

    public function mostrarTablaCategoria()
    {
        $categorias = CategoriasControlador::ctrMostrarCategorias(null, null);

        //print_r(count($productos));

        if (count($categorias) == 0) {

            echo '{"data": []}';

            return;
        }

        $datosJson = '{"data" : [';

        for ($i = 0; $i < count($categorias); $i++) {
            
            
            //Traemos las acciones
            $acciones = "<button type='button' class='btn btn-warning btnBoton' data-bs-toggle='modal' data-bs-target='#editarCategoria' tipo='editar' idCategoria='" . $categorias[$i]["id_categoria"] . "'><i class='fas fa-edit'></i></button> <button type='button' data-id_categoria = '" . $categorias[$i]["id_categoria"] . "' class='btn btn-danger btnEliminarCategoria'><i class='fas fa-trash'></i></button>";

            
            

            $datosJson .= '[
                        "' . $categorias[$i]["id_categoria"] . '",
                        "' . $categorias[$i]["nombre_categoria"] . '",
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
$activarmarcas = new TablaCategoria();
$activarmarcas->mostrarTablaCategoria();