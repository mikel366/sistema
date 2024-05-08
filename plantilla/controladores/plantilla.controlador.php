<?php

class PlantillaControlador
{
    //método para invocar la plantilla
    public function plantilla()
    {

        include 'vistas/plantilla.php';

    }

    //metodo para crear url
    static public function url()
    {
        return "http://localhost/plantilla/";
    }

}