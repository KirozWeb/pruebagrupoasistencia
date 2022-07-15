<?php
require_once "../enlace/enlace.php";
class loguearUsuarioModelo{
    private $enlace;
    function __construct(){
        $this->enlace = new Enlace();
        $this->enlace = $this->enlace->conect();
    }
    public function loguearUsuario(int $numeroIdentificacion,string $correo){
        $arrRegistros = array();
        $sql = $this->enlace->query("SELECT * FROM usuarios WHERE numeroId_usuario = $numeroIdentificacion AND correo_usuario = '$correo'");
        while($obj = $sql->fetch_object()){
            array_push($arrRegistros,$obj);
        
        } 
        return $arrRegistros;
    }
    public function updateLoguearUsuario(int $numeroIdentificacion,string $correo,string $seguridad){

        $sql = $this->enlace->query("UPDATE usuarios SET seguridad_usuario = '$seguridad' WHERE numeroId_usuario = $numeroIdentificacion AND correo_usuario = '$correo'");
        return $sql;
    }
    public function loguearUsuarioSeguro(int $numeroIdentificacion,string $correo,string $codigoSeguridad){
        $arrRegistros = array();
        $sql = $this->enlace->query("SELECT * FROM usuarios WHERE numeroId_usuario = $numeroIdentificacion AND correo_usuario = '$correo' AND seguridad_usuario = '$codigoSeguridad'");
        while($obj = $sql->fetch_object()){
            array_push($arrRegistros,$obj);
        
        } 
        return $arrRegistros;
    }
}
?>