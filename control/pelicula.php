<?php
    
    require_once "../modelo/peliculaModelo.php";

    $seleccion1 = $_REQUEST['seleccion'];
    $objPelicula = new PeliculaModelo();

    
    if($seleccion1 == "listarPeliculas"){
        /*
        $arrPeliculas = $objPeliculas->getProductos();
        print_r("<pre>");
        print_r($arrPeliculas);
        print_r("</pre>");
        */
        $arrResponse = array('status' => false, 'data' => "");
        $arrPeliculas = $objPelicula->ListarPeliculas();
        
        if(!empty($arrPeliculas)){
            
            for($i=0; $i < count($arrPeliculas); $i++){
                $idpeliculas = $arrPeliculas[$i]->id_pelicula;
                /*$options = '<a href="../creacion_Pelicula/editar-creacion-Pelicula.php?p='.$idpeliculas.'" class="btn btn-outline-primary btn-sm" title="Editar registro"><i class="fa-solid fa-user-pen"></i></a>
                <button class="btn btn-outline-danger btn-sm" title="Eliminar registro" onclick="fntDelPelicula('.$idpeliculas.')"><i class="fa-solid fa-trash-can"></i></button>';

                $arrPeliculas[$i]->options = $options;*/
            }
            $arrResponse['totalregistros'] = $i;
            $arrResponse['status'] = true;
            $arrResponse['data'] = $arrPeliculas;
        }
        echo json_encode($arrResponse);
        die();
    }   

    die();
?>