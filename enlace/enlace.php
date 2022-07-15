<?php

    class Enlace{
        public static function conect(){
            $mysql = new mysqli("localhost","root","","maxivideo");
            $mysql->set_charset("utf8");
        

            if(mysqli_connect_errno()){
                echo "Error en la conexion: ".mysqli_connect_errno();
            }else{
                //echo "Conexion exitosa";
            }
            return $mysql;
        }
    }

        //print_r(Conexion::conect());
?>