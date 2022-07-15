<?php
require_once "../enlace/enlace.php";
class DetalleFacturaModelo{
    private $enlace;
    function __construct(){
        $this->enlace = new Enlace();
        $this->enlace = $this->enlace->conect();
    }
    public function CrearDetalleFactura(int $intIdFactura,int $intIdPelicula,int $intCantidadPelicula){
            
        $sql = $this->enlace->query("INSERT INTO detalles_factura (id_factura,id_pelicula,cantidad_detalle_pelicula) VALUES ($intIdFactura,$intIdPelicula,$intCantidadPelicula)");
        /*$rs = $this->conexion->query("SELECT * FROM detalleCreacionProductos ORDER by id_detalle_CreacionProducto DESC");
        $obj = $rs->fetch_object();
        return $obj;*/
        $lastid = mysqli_insert_id($this->enlace);
        return $lastid;
    }
    public function BuscarDetalleFacturas(string $busqueda){
        $arrRegistros = array();
        $buscando = intval($busqueda);
        $sql = $this->enlace->query("SELECT p.id_director,f.id_factura,df.id_detalle_factura,p.titulo_pelicula,p.id_pelicula,df.cantidad_detalle_pelicula,a.nombre_actor FROM peliculas as p
        INNER JOIN detalles_factura as df ON p.id_pelicula = df.id_pelicula
        INNER JOIN facturas as f ON f.id_factura = df.id_factura
        INNER JOIN clientes as c ON c.id_cliente = f.id_cliente
        INNER JOIN detalle_reparto as dr ON dr.id_pelicula = p.id_pelicula
        INNER JOIN actores as a ON a.id_actor = dr.id_actor
        INNER JOIN directores as d ON d.id_director = p.id_director
        WHERE c.identificacion_cliente = $buscando");
        while($obj = $sql->fetch_object()){
            array_push($arrRegistros,$obj);
        }
        return $arrRegistros;
        //return $sql;
    }
}
?>