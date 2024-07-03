<?php
require_once 'conexion.php';

class getModelo
{
    //PETICION GET SIN FILTRO
    static public function getData($tabla)
    {
        try
        {
            $stmt = Conexion::conex()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS);
        }
        catch(PDOException $e)
        {
            echo "Error de: " . $e->getMessage();
        }
    }

    static public function getFiltroData($tabla, $linkTo, $equalTo)
    {
        try
        {
            $stmt=Conexion::conex()->prepare("SELECT * FROM $tabla WHERE $linkTo = :$linkTo");
            $stmt->bindParam(":" . $linkTo, $equalTo, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS);
        }
        catch(PDOException $e)
        {
            echo "Error de: " . $e->getMessage();
        }
    }
}