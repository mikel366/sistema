<?php

class CategoriasControlador
{
    //$item -> campo de la BD (id_producto, email_usuario)
    //$valor -> valor del registro (2, pablo@pablo.com)

    static public function ctrMostrarCategorias($item, $valor)
    {
        $tabla = "categorias";
        $respuesta = CategoriasModelo::mdlMostrarCategorias($tabla, $item, $valor);

        return $respuesta;
    }
}