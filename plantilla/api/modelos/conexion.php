<?php

class Conexion
{
    static public function conex()
    {
        try
        {
            $link = new PDO("mysql:host=localhost;dbname=controlstockcom_burns", "controlstockcom_burns", "9tbrnNesm3g6Cw8XTUXq");
            $link->exec("set names utf8");
            return $link;
        }
        catch(PDOException $e)
        {
            die("Error: " . $e->getMessage());
        }
    }
}