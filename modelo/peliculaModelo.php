<?php
require_once "../enlace/enlace.php";
class PeliculaModelo{
    private $enlace;
    function __construct(){
        $this->enlace = new Enlace();
        $this->enlace = $this->enlace->conect();
    }
    public function ListarPeliculas(){
        $arrRegistros = array();
        $sql = $this->enlace->query("SELECT * FROM peliculas");
        while($obj = $sql->fetch_object()){
            array_push($arrRegistros,$obj);
        
        } 
        return $arrRegistros;
    }
    
}
?>