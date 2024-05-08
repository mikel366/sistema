<?php

require_once '../controladores/usuarios.controlador.php';
require_once '../modelos/usuarios.modelo.php';

class AjaxUsuarios
{

    /*=============================================
TRAER PRODUCTO
    =============================================*/

    public $id_usuario;

    public function ajaxTraerUsuario()
    {

        $item = "id_usuario";
        $valor = $this->id_usuario;

        $respuesta = UsuariosControlador::ctrMostrarUsuarios($item, $valor);

        echo json_encode($respuesta);
    }
}

if (isset($_POST["id_usuario"])) {

    $traerUsuario = new AjaxUsuarios();
    $traerUsuario->id_usuario = $_POST["id_usuario"];
    $traerUsuario->ajaxTraerUsuario();
}
