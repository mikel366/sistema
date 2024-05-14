<?php

require_once '../controladores/productos.controlador.php';
require_once '../modelos/productos.modelo.php';
require_once '../controladores/categorias.controlador.php';
require_once "../controladores/marcas.controlador.php";
require_once "../modelos/funciones.php";

class AjaxProductos
{
    /*=============================================
    TRAER PRODUCTO
    =============================================*/

    public $id_producto;

    public function ajaxTraerProducto()
    {

        $item  = "id_producto";
        $valor = $this->id_producto;

        $respuesta = ProductosControlador::ctrMostrarProductos($item, $valor);

        echo json_encode($respuesta);
    }
}

if (isset($_POST["id_producto"]))
{

    $traerProducto              = new AjaxProductos();
    $traerProducto->id_producto = $_POST["id_producto"];
    $traerProducto->ajaxTraerProducto();
}
