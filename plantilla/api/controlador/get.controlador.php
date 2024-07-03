<?php

class GetControlador
{
    static public function getData($tabla)
    {
        $respuesta = getModelo::getData($tabla);

        $return = new GetControlador();
        $return -> fncRespuesta($respuesta, "getData");
    }

    static public function getFiltroData($tabla, $linkTo, $equalTo)
    {
        $respuesta = GetModelo::getFiltroData($tabla, $linkTo, $equalTo);

        $return = new GetControlador();
        $return->fncRespuesta($respuesta, "getFiltroData");

    }


    private function fncRespuesta($respuesta, $metodo)
    {
        if(!empty($respuesta))
        {
            $json = array(
                'estado' => 200,
                'total' => count($respuesta),
                'resultado' => $respuesta
            );
        }
        else
        {
            $json = array(
                'estado' => 404,
                'total' => 'No encontrado',
                'metodo' => $metodo
            );
        }
        echo json_encode($json, http_response_code($json['estado']));
        return;
    }
}