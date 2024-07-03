<?php


if (isset($_GET["id_producto"])) {

    $respuesta =  ControladorCarrito::ctrAgregarCarrito($_GET["id_producto"]);

    //print_r($respuesta);
}elseif (isset($_GET["idProductoEliminar"])){

    $respuesta =  ControladorCarrito::ctrEliminarCarrito($_GET["idProductoEliminar"]);

}