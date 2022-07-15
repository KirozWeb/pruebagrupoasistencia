<?php
    //require_once "../models/ProductoModel.php";
    require_once "../modelo/detalleFacturaModelo.php";
    
 
    $seleccion1 = $_REQUEST['seleccion'];
    $objDetalleFactura = new DetalleFacturaModelo();
    

    if($seleccion1 == "listregistros"){
        /*
        $arrDetalleFactura = $objDetalleFactura->getProductos();
        print_r("<pre>");
        print_r($arrDetalleFactura);
        print_r("</pre>");
        */
        $arrResponse = array('status' => false, 'data' => "");
        $arrDetalleFactura = $objDetalleFactura->getDetalleFacturas();
        
        if(!empty($arrDetalleFactura)){
            
            for($i=0; $i < count($arrDetalleFactura); $i++){
                $idDetalleFactura = $arrDetalleFactura[$i]->id_detalle_creacion_producto;
                $options = '<a href="../detalle_creacion_producto/editar-detalle-creacion-producto.php?p='.$idDetalleFactura.'" class="btn btn-outline-primary btn-sm" title="Editar registro"><i class="fa-solid fa-user-pen"></i></a>
                <button class="btn btn-outline-danger btn-sm" title="Eliminar registro" onclick="fntDelDetalleFactura('.$idDetalleFactura.')"><i class="fa-solid fa-trash-can"></i></button>';

                $arrDetalleFactura[$i]->options = $options;
            }
            $arrResponse['totalregistros'] = $i;
            $arrResponse['status'] = true;
            $arrResponse['data'] = $arrDetalleFactura;
        }
        echo json_encode($arrResponse);
        die();
    }

    

    
    if($seleccion1 == "verregistro"){
        if($_POST){
            
            $idDetalleFactura = intval($_POST['idDetalleFactura']);
            $arrDetalleFactura = $objDetalleFactura->getDetalleFactura($idDetalleFactura);
            //print_r($arrDetalleFactura);
            if(empty($arrDetalleFactura)){
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados!!');
            }
            else
            {
                $arrResponse = array('status' => true, 'msg' => 'Datos encontrados', 'data' => $arrDetalleFactura);
            }
            echo json_encode($arrResponse);
        }
        die();
    }

    if($seleccion1 == "actualizar"){
        if($_POST)
        {

            if(empty($_POST['txtIdDetalleFactura']) || empty($_POST['txtIdCreacionProducto']) || empty($_POST['txtIdProducto']) || empty($_POST['txtCantidadDetalleFactura']) )
            {
                $arrResponse = array('status' => false, 'msg' => 'Error de datos');
            }
            else
            {
                $intIdDetalleFactura = intval($_POST['txtIdDetalleFactura']);
                $intIdCreacionProducto = intval($_POST['txtIdCreacionProducto']);
                $intIdProducto = intval($_POST['txtIdProducto']);
                $intCantidadDetalleFactura = intval($_POST['txtCantidadDetalleFactura']);
                
    
                $arrDetalleFactura = $objDetalleFactura->updateDetalleFactura($intIdDetalleFactura,$intIdCreacionProducto,$intIdProducto,$intCantidadDetalleFactura);
                //print_r($arrDetalleFactura);
                if($arrDetalleFactura > 0){
                    $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente!!');
                }
                else
                {
                    $arrResponse = array('status' => false, 'msg' => 'Error al guardar o descripcion ya existe');
                }
            }
            echo json_encode($arrResponse);
            //echo json_encode($_POST);
        }
        die();
    }

    if($seleccion1 == "eliminar"){
        
        if($_POST){
            if(empty($_POST['idDetalleFactura'])){
                $arrResponse = array('status' => false, 'msg' => 'Error de datos');                
            }else{
                $idDetalleFactura = intval($_POST['idDetalleFactura']);
                $arrInfo = $objDetalleFactura->delDetalleFactura($idDetalleFactura);
                if($arrInfo){
                    $arrResponse = array('status' => true, 'msg' => 'Registro eliminado');                    
                }else{
                    $arrResponse = array('status' => false, 'msg' => 'Error al eliminar');
                }
            }
            echo json_encode($arrResponse);
        }
        //echo json_encode($_POST);
        
    }

    if($seleccion1 == "buscar"){
        //echo json_encode($_POST);
        if($_POST){
            if(empty($_POST['txtBusqueda-Cliente'])){
                $arrResponse = array('status' => false, 'msg' => 'Error de datos');                
            }else{
                $strBusqueda = ucwords(trim($_POST['txtBusqueda-Cliente']));
                //echo "esto es strBusqueda";
                //echo $strBusqueda;

                $arrInfo = $objDetalleFactura->BuscarDetalleFacturas($strBusqueda);
                $arrInfo2 = $arrInfo;
                $arrInfo1 = $arrInfo;
                if(!empty($arrInfo)){
                    $arrRegis = array();
                    $conta = count($arrInfo);
                    for($i=0;$i<$conta;$i++){
                        $k=0;$m=0;
                        for($j=0;$j<$conta;$j++){
                            $idPelicula = $arrInfo1[$i]->id_factura;
                            $idPelicula2 = $arrInfo2[$j]->id_factura;
                            $idDetalle = $arrInfo1[$i]->id_detalle_factura;
                            $idDetalle2 = $arrInfo1[$j]->id_detalle_factura;
                            if(($idPelicula == $idPelicula2)&&($i == $j)){
                                $k++;
                                //$arrRegis[$i] = $arrInfo[$i];
                                if($k<=1){
                                    $arrRegis[] = $arrInfo1[$i]->id_factura;
                                }
                            }
                            if(($idPelicula == $idPelicula2) && ($idDetalle == $idDetalle2) && ($i != $j) && ($idPelicula2 != -1)){
                                if($m > 1){
                                    $arrInfo1[$j]->nombre_actor = "";
                                }
                                $arrInfo1[$j]->id_factura = -1;
                                $actor1 = $arrInfo1[$i]->nombre_actor;
                                $actor2 = $arrInfo1[$j]->nombre_actor;
                                $arrInfo1[$i]->nombre_actor = $actor1.",".$actor2;
                                $arrInfo1[$j]->nombre_actor = "";
                                $m++;
                            }
                        }
                    }
                    $arrResponse = array('status' => true, 'found' => count($arrInfo), 'data' => $arrInfo, 'peli' => $arrRegis);
                }else{
                    
                    
                    $arrResponse = array('status' => false, 'found' => count($arrInfo), 'msg' => 'Error de datos');
                }               
            }
            echo json_encode($arrResponse);
            //echo json_encode($arrInfo);
        }
        die();
    }

    if($seleccion1 == "crearvarios"){
        //echo count($_POST);
        $arrResponse = array(); 
        if(empty($_POST)){
            $arrResponse = array('status' => false, 'msg' => 'Error de datos 2'); 
            //echo "error vacio";           
        }
        else{
            
            $contador = (count($_POST)-1)/2;
            //echo $contador;
            
            for($i=0;$i<$contador;$i++){
                $txtIdAlquiler = 'txtIdAlquiler';
                $txttxtPelicula = 'txttxtPelicula'.$i;
                $txtCantidadPelicula = 'txtCantidadPelicula'.$i;
                               
                //echo ($_POST[$txtIdProducto]);
                //echo ($_POST[$strDescripcion]);
                //echo ($_POST[$txtPrecioProducto]);
                //echo ($_POST[$txtCantidadProducto]);
                //echo ($_POST[$txtSubtotalProducto]);
                
                
                if(empty($_POST[$txtIdAlquiler]) || empty($_POST[$txttxtPelicula]) || empty($_POST[$txtCantidadPelicula]) ){
                    $arrResponse = array('status' => false, 'msg' => 'Error de datos 3');                
                }else{
                    $intIdAlquiler = $_POST[$txtIdAlquiler];
                    $intIdPelicula = intval($_POST[$txttxtPelicula]);
                    $intCantidadPelicula = intval($_POST[$txtCantidadPelicula]);
                    $arrInfo = $objDetalleFactura->CrearDetalleFactura($intIdAlquiler,$intIdPelicula,$intCantidadPelicula);                  
                    
                }
            }
            
        }
        echo json_encode($arrResponse);
        die();
    }

    

    die();
    
?>