<?php
require_once '../controladores/marcas.controlador.php';
require_once '../modelos/marcas.modelo.php';


class AjaxMarcas
{
    /*=============================================
    TRAER PRODUCTO
    =============================================*/

    public $id_marca;

    public function ajaxTraerMarca()
    {

        $item  = "id_marca";
        $valor = $this->id_marca;

        $respuesta = MarcasControlador::ctrMostrarMarcas($item, $valor);

        echo json_encode($respuesta);
    }
}

if (isset($_POST["id_marca"]))
{

    $traerMarca              = new AjaxMarcas();
    $traerMarca->id_marca = $_POST["id_marca"];
    $traerMarca->ajaxTraerMarca();
}
