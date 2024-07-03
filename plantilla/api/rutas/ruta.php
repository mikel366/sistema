<?php

$rutasArray = explode ("/", $_SERVER['REQUEST_URI']);
$rutasArray = array_filter($rutasArray);

// print_r(count($rutasArray));

//CUANDO NO SE ACEPTA LA PETICION

if(count($rutasArray) == 2)
{
    $json = array (
        'estado' => 404,
        'resultado' => 'No encontrado'
    );

    echo json_encode($json, http_response_code($json["estado"]));
    return;
}
else
{
    //PETICIONES GET

    if(count($rutasArray)== 3 && isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=='GET')
    {
        //PETICIONES DE FILTRO PARA MOSTRAR UN SOLO DATO
        if(isset($_GET['linkTo']) && isset($_GET['equalTo']))
        {
            $respuesta = new GetControlador();
            $respuesta->getFiltroData(explode("?", $rutasArray[3])[0], $_GET['linkTo'], $_GET['equalTo']);
        }
        else
        {
            //PETICION PARA TRAER TODA LA INFORMACION
            $respuesta = new GetControlador();
            $respuesta->getData($rutasArray[3]);
        }
    }
}