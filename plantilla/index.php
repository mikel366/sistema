<?php

//Cargar phpmailer
require_once 'extensiones/vendor/autoload.php';

//Funciones
require_once 'modelos/funciones.php';

require_once 'controladores/plantilla.controlador.php';

require_once 'controladores/roles.controlador.php';
require_once 'modelos/roles.modelo.php';

require_once 'controladores/usuarios.controlador.php';
require_once 'modelos/usuarios.modelo.php';

require_once 'controladores/categorias.controlador.php';
require_once 'modelos/categorias.modelo.php';

require_once 'controladores/productos.controlador.php';
require_once 'modelos/productos.modelo.php';

include_once 'controladores/marcas.controlador.php';
include_once 'modelos/marcas.modelo.php';

//Creamos una instancia de la clase plantilla
$index = new PlantillaControlador();
$index->plantilla();