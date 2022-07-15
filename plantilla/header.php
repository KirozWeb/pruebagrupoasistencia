<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../publico/css/estilo.css">
    <title>Listado de personas</title>
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            
                        
            <div class="mb-header">
                  <a class="navbar-brand" href="../pedido">Pedido</a>
            </div>
            
            <div class="mb-header">
                  <a class="navbar-brand" href="../pedido_compra">Compra</a>
            </div>
            
            <div class="mb-header">
                  <a class="navbar-brand" href="../recibo_mercancia">Recibo Mercancia</a>
            </div>
            
            <div class="mb-header">
                  <a class="navbar-brand" href="../documento_inventario">Inventario</a>
            </div>
            
            <div class="mb-header">
                  <a class="navbar-brand" href="../producto">Producto</a>
            </div>
            <div class="mb-header">
                  <a class="navbar-brand" href="../producto_search">ProductoSearch</a>
            </div>
            <div class="mb-header">
                        <a class="navbar-brand" href="../pedido_cotizacion">Productos Bajos</a>            
            </div>                        
            
            <div class="mb-header">
                  <a class="navbar-brand" href="../salir">Salir</a>
            </div>
            
            <div class="mb-headeright">
                <form id="frmSearch" class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" id="txtbuscar" name="txtbuscar" value="<?php $cadena = isset($_SESSION['rol']) ? $_SESSION['nombre'] : "Sin Session"; echo $cadena;?>">
                </form>
            </div>
        </nav>
    </header>