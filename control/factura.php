<?php
    require_once "../modelo/facturaModelo.php";

    $seleccion1 = $_REQUEST['seleccion'];
    $objFactura = new FacturaModelo();    

    if($seleccion1 == "crear")
    {
        if($_POST)
        {

            if(empty($_POST['txtFechaAlquiler']) )
            {
                $arrResponse = array('status' => false, 'msg' => 'Error de datos');
            }
            else
            {
                $strFechaAlquiler = ucwords($_POST['txtFechaAlquiler']);
                $intIdCliente = intval($_POST['txtIdCliente']);
                
                    
                $arrFactura = $objFactura->CrearFactura($strFechaAlquiler,$intIdCliente);
                //print_r($arrFactura);
                //if($arrFactura->id_Factura > 0){
                if($arrFactura > 0){
                    $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente!!', 'data' => $arrFactura);
                }
                else
                {
                    $arrResponse = array('status' => false, 'msg' => 'Error al guardar o descripcion ya existe');
                }
            }
            echo json_encode($arrResponse);
        }
        die();
        
    }    

    die();
    
?>