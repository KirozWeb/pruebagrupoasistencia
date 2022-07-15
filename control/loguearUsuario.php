<?php

require_once "../modelo/loguearUsuarioModelo.php";

$objloguearUsuario = new loguearUsuarioModelo();
$seleccion1 = $_REQUEST['seleccion'];

if($seleccion1 == "loguear"){
    //print_r($_POST);
    if($_POST){        
        $numeroIdentificacion= intval($_POST['NumeroIdentificacion']);        
        $correo = strval($_POST['Correo']);
        $tipoIngreso = intval($_POST['TipoIngreso']);
        if($tipoIngreso == 1){
            $arrLoguearUsuario = $objloguearUsuario->loguearUsuario($numeroIdentificacion,$correo);
            if(empty($arrLoguearUsuario)){
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados!!');
            }
            else
            {
                $seguridad = strval(time());
                $arrUpdateLoguearUsuario = $objloguearUsuario->updateLoguearUsuario($numeroIdentificacion,$correo,$seguridad);
                $arrResponse = array('status' => true, 'msg' => 'Datos encontrados', 'data' => $arrLoguearUsuario);
                
                $formulario = '<form action="mailto:'.$correo.'" method="post" enctype="text/plain">
                        <input type="hidden" id="txtClaveSeguridad" name="txtClaveSeguridad" value="'.$seguridad.'">
                        <input type="submit" id="btnform" value="Enviar Codigo al Correo" ></form>';

                $arrResponse['formulario'] = $formulario;
            }
            echo json_encode($arrResponse);
        }
        else{
            $session_options = array([
                'use_only_cookies' => 1,
                'auto_start' => 1,
                'read_and_close' => true
            ]);
            if(!isset($_SESSION)){  
                session_start($session_options);
            }
            if(!isset($_SESSION['ok'])){
                $_SESSION['ok'] = false;
            }
            $codigoSeguridad = intval($_POST['CodigoSeguridad']);
            $arrLoguearUsuario = $objloguearUsuario->loguearUsuarioSeguro($numeroIdentificacion,$correo,$codigoSeguridad);
            /*$nombre = $arrLoguearUsuario->nombre_usuario;
            $id = $arrLoguearUsuario->numeroId_usuario;*/
            if(empty($arrLoguearUsuario)){
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados!!');
            }
            else
            {
                $_SESSION['ok'] = true;
                $_SESSION['nombre'] = $correo;
                $_SESSION['id'] = $numeroIdentificacion;
                //$seguridad = strval(time());
                //$arrUpdateLoguearUsuario = $objloguearUsuario->loguearUsuarioSeguro($numeroIdentificacion,$correo,$seguridad);
                $arrResponse = array('security' => true, 'msg' => 'Datos super seguros', 'data' => $arrLoguearUsuario);
                
            }
            echo json_encode($arrResponse);
        }
        
    }
    die();
}

?>