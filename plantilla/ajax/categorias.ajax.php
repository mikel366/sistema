<?php
require_once '../controladores/categorias.controlador.php';
require_once '../modelos/categorias.modelo.php';


class AjaxCategorias
{
    /*=============================================
    TRAER PRODUCTO
    =============================================*/

    public $id_categoria;

    public function ajaxTraerCategoria()
    {

        $item  = "id_categoria";
        $valor = $this->id_categoria;

        $respuesta = CategoriasControlador::ctrMostrarCategorias($item, $valor);

        echo json_encode($respuesta);
    }
}

if (isset($_POST["id_categoria"]))
{

    $traerCategoria              = new AjaxCategorias();
    $traerCategoria->id_categoria = $_POST["id_categoria"];
    $traerCategoria->ajaxTraerCategoria();
}
