<?php
require_once "../enlace/enlace.php";
class FacturaModelo{
    private $enlace;
    function __construct(){
        $this->enlace = new Enlace();
        $this->enlace = $this->enlace->conect();
    }
    public function CrearFactura(string $strFechaAlquiler,int $intIdCliente){
        $strPlazo = 5;
        $strFecha = strtotime($strFechaAlquiler); 
        $newFecha = date("Y-m-d", $strFecha );
        $dias = "+ ".$strPlazo." "."days";
        $newFechaPlazo = date("Y-m-d",strtotime($newFecha.$dias));
        $sql = $this->enlace->query("INSERT INTO facturas (fecha_alquiler_factura,fecha_devolucion_factura,id_cliente) VALUES ('$newFecha','$newFechaPlazo',$intIdCliente)");
        /*$rs = $this->conexion->query("SELECT * FROM pedidos ORDER by id_recibo_mercancia DESC");
        $obj = $rs->fetch_object();
        return $obj;*/
        $lastid = mysqli_insert_id($this->enlace);
        return $lastid;
    }
    
}
?>