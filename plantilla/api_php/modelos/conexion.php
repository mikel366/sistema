<?php

class Conexion
{
    static public function conex()
    {
        try
        {
            $link = new PDO("mysql:host=localhost;dbname=feliciano", "root", "");
            $link->exec("set names utf8");
            return $link;
        }
        catch(PDOException $e)
        {
            die("Error: " . $e->getMessage());
        }
    }
}