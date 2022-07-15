<?php
require_once "../enlace/enlace.php";
class registroUsuarioModelo{
    private $enlace;
    function __construct(){
        $this->enlace = new Enlace();
        $this->enlace = $this->enlace->conect();
    }
    public function crearusuario(string $nombre,string $apellidos,int $tipoIdentificacion,int $numeroIdentificacion,int $numeroFijoMovil,string $correo,string $confirmarCorreo){
            
            $sql = $this->enlace->query("INSERT INTO usuarios (nombre_usuario,apellidos_usuario,tipoId_usuario,numeroId_usuario,numeroCelFijo_usuario,correo_usuario,confirmarCorreo_usuario) VALUES ('$nombre','$apellidos',$tipoIdentificacion,'$numeroIdentificacion','$numeroFijoMovil','$correo','$confirmarCorreo')");
            
            return $sql;    
        }
    }
?>