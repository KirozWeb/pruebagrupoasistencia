

if(document.querySelector("#frmAlquiler")){
    let frmRegistro = document.querySelector("#frmAlquiler");
    console.log("estoy en alquiler peliculas");
    frmRegistro.onsubmit = function(e){
        e.preventDefault();
        fntGuardar();
    }
    
}

    async function fntGuardar(){
    let frmRegistro = document.querySelector("#frmAlquiler");
    console.log("guardar otros datos");
    
    let strFechaAlquiler = document.querySelector("#txtFechaAlquiler").value;
    let strIdCliente = document.querySelector("#txtIdCliente").value;
            

    if( strFechaAlquiler == "" || strIdCliente == ""){
        alert("Todos los campos son obligatorios");
        return new Promise((resolve, reject)=>{
            resolve({
                mensaje : "error"});
            });
    }
    else{
        try{
        
            const data = new FormData(document.getElementById('frmAlquiler'));
            
            let resp = await fetch("../control/factura.php?seleccion=crear",{
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                body: data
            });
            
            json = await resp.json();
            
            if(json.status){
                swal("Guardar",json.msg,"success");
                //frmRegistro.reset();
            }
            else{
                swal("Guardar",json.msg,"error");
            }
            
            //console.log(resp);
        }catch(err){
            console.log("Ocurrio un error: " + err);
        }
        return new Promise((resolve, reject)=>{
            resolve({
                mensaje : json.data});
            });    
    }
        
     
}
/****** Buscar ******/

if(document.querySelector("#frmBuscando-Cliente")){
    let frmBuscar = document.querySelector("#frmBuscando-Cliente");
     console.log("estoy en frmBuscar-DetalleCreacionProducto"+frmBuscar);
     
    frmBuscar.onsubmit = function(e){
        e.preventDefault();
        

        let busqueda = document.querySelector("#txtBusqueda-Cliente").value;

        //console.log("estoy en frmBuscar-DetalleCreacionProducto"+frmBuscar);
        console.log("estoy con busqueda " + busqueda);
        if(busqueda == ""){
            console.log("estoy en if");
            //getDetalleCreacionProducto();
        }
        else
        {
            console.log("estoy en else");
            fntInputSearchDetalleFactura();
        }
    }
    //Estas dos lineas de codigo corresponden a busqueda por cada letra
    let inputSearch = document.querySelector("#txtBusqueda-Cliente");
    inputSearch.addEventListener("keyup",fntInputSearchDetalleFactura,true);

    async function fntInputSearchDetalleFactura(){
        document.querySelector("#tblBodyDetalleFactura").innerHTML = "";
    
        console.log("estoy en buscarregistros");
        try{
            
            let formData = new FormData(document.getElementById('frmBuscando-Cliente'));            
            console.log(formData);
            let resp = await fetch("../control/detalleFactura.php?seleccion=buscar",{
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                body: formData
            });
            //console.log("respuesta");
            //console.log(resp);
            
            json = await resp.json();
            if(json.status){
                let data = json.data;
                let url = window.location.pathname;
                console.log(url);
                if(url == "/yarimcajax/views/creacion_producto/crear-creacionproducto.php"){
                    data.forEach((item)=>{
                        let newtr = document.createElement("tr");
                        newtr.id = "row_"+item.id_detalle_creacion_producto;
                        newtr.innerHTML = `<tr>
                                                <th scope="row">${item.id_detalle_creacion_producto}</th>
                                                <td>${item.id_detalle_creacion_producto}</td>
                                                <td>${item.id_producto}</td>
                                                <td>${item.cantidad_detalle_creacion_producto}</td>
                                                <td>${item.total_detalle_creacion_producto}</td>
                                                
                                                
                                                <td><button class="btn btn-outline-danger btn-sm" title="Eliminar registro" onclick="fntMostrarDetalleCreacionProducto(${item.id_detalle_creacion_producto})"><i class="fa-solid fa-trash-can"></i></button>
                                                </td>`;
                        document.querySelector("#tblBodyDetalleCreacionProductos").appendChild(newtr);
                    });
                }else{
                    data.forEach((item)=>{
                        let newtr = document.createElement("tr");
                        newtr.id = "row_"+item.id_detalle_factura;
                        newtr.innerHTML = `<tr>
                                                <th scope="row">${item.id_detalle_factura}</th>
                                                <td>${item.titulo_pelicula}</td>
                                                <td>${item.id_factura}</td>
                                                <td>${item.cantidad_detalle_pelicula}</td>
                                            
                                                <td>${item.nombre_actor}</td>
                                                <td>${item.id_director}</td>
                                                `;
                        document.querySelector("#tblBodyDetalleFactura").appendChild(newtr);
                    });
                }
                
            }    
        }catch(err){
            console.log("Ocurrio un error: " + err);
        }
    }
    function fntInputSearchDetalleCreacionProducto(){
        let inbusqueda = document.querySelector("#txtBusqueDetalleCreacionProducto").value;
        console.log(inbusqueda);
        if(inbusqueda == ""){

            //getDetalleCreacionProducto();
            console.log("estoy en if");
        }
        else
        {
            
            fntBuscarRegistrosDetalleCreacionProducto();
        }
    }
}

/****Funcion buscar solo para adicionar productos****/

if(document.querySelector("#frmAlquiler")){
    let cont = 0;
    console.log("entro a frmAddPeliculas" + cont);
    
    let txtCantidad = new Array();
    let tblAddPeli = document.querySelector("#tblAddPeliculas");
    let btnform = document.querySelector("#btnEnviar");
    
    let txtIdCliente = document.querySelector("#txtIdCliente");
    
    txtIdCliente.addEventListener('click',fntInpuadd,true);
    
    tblAddPeli.addEventListener('keyup',fntInpuadd,true);
    btnform.addEventListener('click',fntEnvForm,true);

    async function fntEnvForm(e){
        
            if(e.keyCode == 13){
                e.preventDefault();
            console.log("Aun no envio el formulario");
            }else{

                let a = await fntGuardar();                
                let dato = a.mensaje;
                console.log("este es dato :"+dato);                
                               
                if(dato != "error" && dato > 0){                    

                    let formData = new FormData(document.getElementById('frmPeliculas'));
                    /*json = await respro.json();
                    console.log("Esto es json.data ");
                    let arreglo = json.data;*/
                    //let forData = new FormData();
                    formData.append('txtIdAlquiler',dato);
                    //let i = 0;
                                                    
                    let resdetped = await fetch("../control/detalleFactura.php?seleccion=crearvarios",{
                        method: 'POST',
                        mode: 'cors',
                        cache: 'no-cache',
                        body: formData
                    });
                    console.log(resdetped);
                    //location. reload();
                }            
                
            }           
        
    }
        
    function fntInpuadd(e){
        console.log("este es el contador" + cont);
        e.preventDefault();
        if(e.keyCode == 13 || cont == 0)
        {
            
            let conta = cont;
            let newtr = document.createElement("tr");
            let txttxtPelicula = "txttxtPelicula"+conta;
            let txtCantidadPelicula2 = "txtCantidadPelicula2"+conta;
            
            //let txtPrecioPelicula = "txtPrecioPelicula"+conta;            
            let txtCantidadPelicula = "txtCantidadPelicula"+conta;
            
            //<td><input type="text" id="${txtDescripcionProducto}" name="${txtDescripcionProducto}" value=""></td>
            newtr.id = "row_"+conta;
            newtr.innerHTML = `<tr>
                                    <th scope="row">${conta+1}</th>
                                     
                                    <td><input type="text" id="${txtCantidadPelicula}" name="${txtCantidadPelicula}" class="short" value=""></td> 
                                    <td><select id="${txttxtPelicula}" name="${txttxtPelicula}" ></td>                  
                                    
                                    
                              </tr>`;
            document.querySelector("#tblAddPeliculas").appendChild(newtr);
            txtCantidad[conta] = document.getElementById(txtCantidadPelicula);
            txtCantidad[conta].addEventListener("keyup", async function(){
                
                fntAddPelicula(this,conta);                               
                
            }); 
            cont++;       
        }  

    }
    
    async function fntAddPelicula(objeto,cont){            
                
                //let cantidad = objeto.parentElement.previousElementSibling.firstChild.value;
                txPelicula = "#txttxtPelicula"+cont;
                console.log("estoy en add pelicula");
                console.log(objeto);
                document.querySelector(txPelicula).innerHTML = ""; 
                let resp;
                try{
                    
                    resp = await fetch("../control/pelicula.php?seleccion=listarPeliculas");        
                    //console.log(resp);        
                    json = await resp.json();
                    //console.log(json);
                    
                    if(json.status){
                        let data = json.data;

                        data.forEach((item) => {                
                            
                                console.log("estoy en el for ");
                                let option = document.createElement('option');
                                option.value = item.id_pelicula;
                                option.text = item.titulo_pelicula;
                                document.querySelector(txPelicula).appendChild(option);
                            
                        });
                        
                    }
                    //console.log(json);
                }catch(err){
                    console.log("Ocurrio un error: " + err);
                }
                console.log("estoy en index");
                
                
        }
    
    
    
}