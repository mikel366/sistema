<?php
require_once '../controladores/roles.controlador.php';
require_once '../modelos/roles.modelo.php';


class AjaxRoles
{

    public $id_rol;

    public function ajaxTraerRol()
    {

        $item  = "id_rol";
        $valor = $this->id_rol;

        $respuesta = RolesControlador::ctrMostrarRoles($item, $valor);

        echo json_encode($respuesta);
    }
}

if (isset($_POST["id_rol"]))
{

    $traerRol              = new AjaxRoles();
    $traerRol->id_rol = $_POST["id_rol"];
    $traerRol->ajaxTraerRol();
}
