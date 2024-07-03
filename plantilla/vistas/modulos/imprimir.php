<?php

require_once '../../controladores/productos.controlador.php';
require_once '../../modelos/productos.modelo.php';

class Producto
{
    /*=============================================
 	IMPRIMIR UN PRODUCTO QUE VIENE POR URL
  	=============================================*/

    public $id_producto;

    public function imprimirProducto()
    {
        require_once('../../extensiones/tcpdf/examples/tcpdf_include.php');

        $item = "id_producto";
        $valor = $this->id_producto;
        $fecha = date("d/m/Y");

        if (isset($_GET["id_producto"])) {

            $producto = ProductosControlador::ctrMostrarProductos($item, $valor);
        } else {

            $producto = ProductosControlador::ctrMostrarProductos(null, null);
        }

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Mostrar cabecera
        $pdf->setPrintHeader(false);

        //Mostrar footer - pié de página
        $pdf->setPrintFooter(false);

        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        $pdf->startPageGroup();

        //$pdf->AddPage('L', 'A5');

        //Por defecto hoja A4
        $pdf->AddPage();

        $pdf->Image('../../vistas/imagenes/logo.png', 10, 10, 100, 25, 'PNG', '', '', true, 100, '', false, false, 0, false, false, false);

        //Bloque 1      

        $bloque = <<<EOF
        <table cellspacing="0" cellpadding="1" border="0" style="padding:5px 10px;">
            <tr>
                <td><br><br>
                
                </td>
                <td>
                    <div style="font-size:16px; text-align:right; margin-left:20px;"> 
        
                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha: $fecha
        
                    </div>         
                  
                </td>
             
            </tr>    
        
        </table>
        EOF;

        $pdf->writeHTML($bloque, false, false, false, false, '');

        if (!isset($_GET["id_producto"])) {

            foreach ($producto as $key => $value) {

                //Bloque 2
                $bloque2 = <<<EOF

    <table style="font-size:9px; padding:3px 7px; margin-top: 90px">

    <tr style="margin-top: 90px">
            
            <td style="background-color:white; width:150px; text-align:center">
              
            </td>

            <td style="background-color:white; width:90px; text-align:center">
              
            </td>

            <td style="background-color:white; width:100px; text-align:center">
             
            </td>
            <td style="background-color:white; width:100px; text-align:center">
            
            </td>

            <td style="background-color:white; width:100px; text-align:center"> 
               
            </td>

        </tr>
        <tr style="margin-top: 90px">
            
            <td style="background-color:white; width:150px; text-align:center">
              
            </td>

            <td style="background-color:white; width:90px; text-align:center">
              
            </td>

            <td style="background-color:white; width:100px; text-align:center">
             
            </td>
            <td style="background-color:white; width:100px; text-align:center">
             
            </td>

            <td style="background-color:white; width:100px; text-align:center"> 
               
            </td>

        </tr>
        <tr style="margin-top: 90px">
            
            <td style="background-color:white; width:150px; text-align:center; font-size:16px">
                $value[nombre_producto]
            </td>

            <td style="background-color:white; width:300px; ">
              $value[descripcion_producto]
            </td>
            
            <td style="background-color:white; width:100px; text-align:center">
            $  $value[precio_producto]
            </td>            

        </tr>

    </table>

EOF;

                $pdf->writeHTML($bloque2, false, false, false, false, '');
            }
        } else {
            //Bloque 2
            $bloque2 = <<<EOF

            <table style="font-size:9px; padding:3px 7px; margin-top: 90px">
        
            <tr style="margin-top: 90px">
                    
                    <td style="background-color:white; width:150px; text-align:center">
                      
                    </td>
        
                    <td style="background-color:white; width:90px; text-align:center">
                      
                    </td>
        
                    <td style="background-color:white; width:100px; text-align:center">
                     
                    </td>
                    <td style="background-color:white; width:100px; text-align:center">
                    
                    </td>
        
                    <td style="background-color:white; width:100px; text-align:center"> 
                       
                    </td>
        
                </tr>
                <tr style="margin-top: 90px">
                    
                    <td style="background-color:white; width:150px; text-align:center">
                      
                    </td>
        
                    <td style="background-color:white; width:90px; text-align:center">
                      
                    </td>
        
                    <td style="background-color:white; width:100px; text-align:center">
                     
                    </td>
                    <td style="background-color:white; width:100px; text-align:center">
                     
                    </td>
        
                    <td style="background-color:white; width:100px; text-align:center"> 
                       
                    </td>
        
                </tr>
                <tr style="margin-top: 90px">
                    
                    <td style="background-color:white; width:150px; text-align:center; font-size:16px">
                        $producto[nombre_producto]
                    </td>
        
                    <td style="background-color:white; width:300px; ">
                      $producto[descripcion_producto]
                    </td>
                    
                    <td style="background-color:white; width:100px; text-align:center">
                    $  $producto[precio_producto]
                    </td>            
        
                </tr>
        
            </table>
        
        EOF;

            $pdf->writeHTML($bloque2, false, false, false, false, '');
        }

        //SALIDA DEL ARCHIVO 

        $pdf->Output('producto-' . $valor . '.pdf');
    }
}

if (isset($_GET["id_producto"])) {

    $imprimir = new Producto();
    $imprimir->id_producto = $_GET["id_producto"];
    $imprimir->imprimirProducto();
} else {
    $imprimir = new Producto();
    $imprimir->imprimirProducto();
}
