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

    static public function ctrObtenerNombreCategoria($categoria_producto)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT nombre_categoria FROM categorias WHERE id_categoria = :id_categoria");
            $stmt->bindParam(":id_categoria", $categoria_producto, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC)["nombre_categoria"];
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
    

}