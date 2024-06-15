<?php
require_once 'conexion.php';
class Funciones
{
    static public function generar_url($cadena)
    {
        $separador   = '-'; //ejemplo utilizado con guión medio
        $originales  =
        'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
        $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
        //Quitamos todos los posibles acentos
        $url = strtr($cadena, $originales, $modificadas);
        //Convertimos la cadena a minusculas
        $url = strtolower($url);
        //Quitamos los saltos de linea y cuanquier caracter especial
        $buscar     = array(' ', '&amp;', '\r\n', '\n', '+');
        $url        = str_replace($buscar, $separador, $url);
        $buscar     = array('/[^a-z0-9\-&lt;&gt;]/', '/[\-]+/', '/&lt;[^&gt;]*&gt;/');
        $reemplazar = array('', $separador, '');
        $url        = preg_replace($buscar, $reemplazar, $url);
        return $url;
    }


    static public function MostrarEstados($item, $valor)
    {
        $tabla = "estados";
        $respuesta = MarcasModelo::mdlMostrarMarcas($tabla, $item, $valor);

        return $respuesta;
    }


    static public function ObtenerNombreEstados($estado_producto)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT nombre_estado FROM estados WHERE id_estado = :id_estado");
            $stmt->bindParam(":id_estado", $estado_producto, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC)["nombre_categoria"];
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
    
     //Función para crear un password aleatorio
     static public function genPassword($longitud)
     {
 
         $password = "";
         $cadena = "123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
 
         $password = substr(str_shuffle($cadena), 0, $longitud);
 
         return $password;
     }


    
}

