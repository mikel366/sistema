<?php

require_once '../controladores/plantilla.controlador.php';
require_once '../modelos/plantilla.modelo.php';

class AjaxConfiguracion
{

    /*=============================================
GUARDAR CONFIGURACION
    =============================================*/
    public $empresa_configuracion;
    public $email_configuracion;
    public $telefono_configuracion;

    public function ajaxGuardarConfiguracion()
    { 
        $datos = array(
            "empresa_configuracion" => $this->empresa_configuracion,
            "email_configuracion" => $this->email_configuracion,
            "telefono_configuracion" => $this->telefono_configuracion,
        );      

        $respuesta = PlantillaControlador::ctrActualizarInformacion($datos);

        echo $respuesta;
    }
}

if (isset($_POST["empresa_configuracion"])) {

    $guardarConfiguracion              = new AjaxConfiguracion();
    $guardarConfiguracion->empresa_configuracion = $_POST["empresa_configuracion"];
    $guardarConfiguracion->email_configuracion = $_POST["email_configuracion"];
    $guardarConfiguracion->telefono_configuracion = $_POST["telefono_configuracion"];
    $guardarConfiguracion->ajaxGuardarConfiguracion();
}