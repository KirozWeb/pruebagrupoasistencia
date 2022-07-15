<?php
    
    require_once "../modelo/clienteModelo.php"; 

    $seleccion1 = $_REQUEST['seleccion'];
    $objCliente = new ClienteModelo();

    if($seleccion1 == "listarClientes"){
        /*
        $arrCliente = $objCliente->getProductos();
        print_r("<pre>");
        print_r($arrCliente);
        print_r("</pre>");
        */
        $arrResponse = array('status' => false, 'data' => "");
        $arrCliente = $objCliente->ListarClientes();
        
        if(!empty($arrCliente)){
            
            for($i=0; $i < count($arrCliente); $i++){
                $idcliente = $arrCliente[$i]->id_cliente;
                /*$options = '<a href="../Cliente/editar-Cliente.php?p='.$idcliente.'" class="btn btn-outline-primary btn-sm" title="Editar registro"><i class="fa-solid fa-user-pen"></i></a>
                <button class="btn btn-outline-danger btn-sm" title="Eliminar registro" onclick="fntDelCliente('.$idcliente.')"><i class="fa-solid fa-trash-can"></i></button>';

                $arrCliente[$i]->options = $options;*/
            }

            $arrResponse['status'] = true;
            $arrResponse['data'] = $arrCliente;
            $arrResponse['totalregistros'] = $i;
        }
        echo json_encode($arrResponse);
        die();
    }   

    

    if($seleccion1 == "buscar"){
        //echo json_encode($_POST);
        if($_POST){
            if(empty($_POST['txtBusqueCliente'])){
                $arrResponse = array('status' => false, 'msg' => 'Error de datos');                
            }else{
                $strBusqueda = ucwords(trim($_POST['txtBusqueCliente']));
                //echo "esto es strBusqueda";
                //echo $strBusqueda;

                $arrInfo = $objCliente->getClienteesBusqueda($strBusqueda);
                if(!empty($arrInfo)){
                    $arrResponse = array('status' => true, 'found' => count($arrInfo), 'data' => $arrInfo);
                }else{
                    $arrResponse = array('status' => false, 'found' => count($arrInfo), 'msg' => 'Error de datos');
                }               
            }
            echo json_encode($arrResponse);
            //echo json_encode($arrInfo);
        }
        die();
    }

    
    die();
    
?>