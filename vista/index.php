
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../publico/css/estilo.css">
    <title>Registro de Usuarios</title>
</head>
<body>
    <header>
    </header>
    <h1 class="text-center">Alquiler de Peliculas</h1>
           
    
    <main class="container-ga">
        
    <div class="mb-7">
            <div class="mb-5">
            
                <form id="frmBuscando-Cliente" name="frmBuscando-Cliente">        
                    <input type="search" id="txtBusqueda-Cliente" name="txtBusqueda-Cliente">
                    <button  id="btnformbusc" name="btnformbusc" class="btn btn-info"><i class="fa-solid fa-user-pen"></i>Buscar</button>
                </form> 
            </div> 
    
        <div class="mb-6">
            <table id="tblClientes" class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Factura</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Actor</th>
                    <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tblBodyDetalleFactura">
                    
                    
                </tbody>
            </table>
        </div>
    </div>
        <div class="input-group grupo-ga">
            <form id="frmAlquiler" name="frmAlquiler"class="form-ga">            
                <div class="dtpc-1">                    
                    
                    <div class="mb-4">
                        <label for="txtFechaAlquiler" class="form-label-ga">Fecha Alquiler</label>
                    </div>
                    <div class="mb-4">
                        <input type="text" class="form-ga" id="txtFechaAlquiler" name="txtFechaAlquiler" value="<?php echo(date('d-m-Y')); ?>">                
                    </div>                                        
                    
                </div>
                <div class="dtpv-1">
                    <div class="mb-4"> 
                        <label for="txtIdCliente" class="form-label-ga">Nombre Cliente</label>
                    </div>
                    <div class="mb-4">
                        <table id="txtIdCliente" class="table table-striped">
                            <thead>                            
                            </thead>
                            <tbody id="tblCliente">                            
                                <select id="txtIdCliente"name="txtIdCliente">                                        
                                </select>
                            </tbody>
                        </table>              
                    </div>                   
                    
                </div>
                                               
            </form>
        </div>

        <br><br>
        <h1 id="titDetalle" name="titDetalle">Detalle Alquiler de Peliculas</h1>
        <form id="frmPeliculas" class="ga-form">
            <table id="tblPeliculas" name="tblPeliculas" class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Titulo</th>               
                    </tr>
                </thead>
                <tbody id="tblAddPeliculas" name="tblAddPeliculas">
                    
                    
                </tbody>
            </table>            
            
        </form>
        <button  id="btnEnviar" name="btnEnviar" class="btn btn-info"><i class="fa-solid fa-user-pen"></i> Guardar</button>
    </main>



<script src="../publico/js/funcion-alquiler-pelicula.js"></script>
<script src="../publico/js/funcion-cliente.js"></script>

</body>
</html>
