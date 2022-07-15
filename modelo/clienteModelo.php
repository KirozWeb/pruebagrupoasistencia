<?php
require_once "../enlace/enlace.php";
class ClienteModelo{
    private $enlace;
    function __construct(){
        $this->enlace = new Enlace();
        $this->enlace = $this->enlace->conect();
    }
    public function ListarClientes(){
        $arrRegistros = array();
        $sql = $this->enlace->query("SELECT * FROM clientes");
        while($obj = $sql->fetch_object()){
            array_push($arrRegistros,$obj);
        
        } 
        return $arrRegistros;
    }
    
}
?>