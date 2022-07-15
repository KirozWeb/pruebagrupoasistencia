<?php

require_once "../modelo/registroUsuarioModelo.php";

$objRegistroUsuario = new registroUsuarioModelo();
$seleccion1 = $_REQUEST['seleccion'];

if($seleccion1 == "crear"){
    //print_r($_POST);
    if($_POST){
        $terminos = 0;
        $nombre = strval($_POST['Nombre']);
        $apellidos = strval($_POST['Apellidos']);    
        $tipoIdentificacion = intval($_POST['TipoIdentificacion']);
        $numeroIdentificacion= intval($_POST['NumeroIdentificacion']);
        $numeroFijoMovil = intval($_POST['NumeroFijoMovil']);
        $correo = strval($_POST['Correo']);
        $confirmarCorreo = strval($_POST['ConfirmarCorreo']);
        
        $terminosCondiciones = intval($_POST['TerminosCondiciones']);
        if($terminosCondiciones == "on"){
            $terminos = 1;
        }
        $resultado = $objRegistroUsuario->crearusuario($nombre,$apellidos,$tipoIdentificacion,$numeroIdentificacion,$numeroFijoMovil,$correo,$confirmarCorreo);
    }   
    die();  
}

?>