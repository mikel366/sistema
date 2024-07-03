<?php

//Cargar phpmailer
require_once 'extensiones/vendor/autoload.php';

//Funciones
require_once 'modelos/funciones.php';

require_once 'controladores/plantilla.controlador.php';
require_once 'modelos/plantilla.modelo.php';

require_once 'controladores/roles.controlador.php';
require_once 'modelos/roles.modelo.php';

require_once 'controladores/usuarios.controlador.php';
require_once 'modelos/usuarios.modelo.php';

require_once 'controladores/categorias.controlador.php';
require_once 'modelos/categorias.modelo.php';

require_once 'controladores/productos.controlador.php';
require_once 'modelos/productos.modelo.php';

require_once 'controladores/marcas.controlador.php';
require_once 'modelos/marcas.modelo.php';

require_once 'controladores/carrito.controlador.php';
require_once 'modelos/carrito.modelo.php';

//Creamos una instancia de la clase plantilla
$index = new PlantillaControlador();
$index->plantilla();