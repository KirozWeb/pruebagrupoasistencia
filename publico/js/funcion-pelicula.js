async function getMarca(){   
    document.querySelector("#tblBodyMarcas").innerHTML = ""; 
    let url = window.location.pathname;
    console.log(url);
    let resp;
    
    try{
        resp = await fetch("../control/pelicula.php?op=listarPeliculas");
        console.log(resp);
        
        json = await resp.json();
        //console.log(json);
        
        if(json.status){
            let data = json.data;
            
                data.forEach((item) => {                                         
                    //console.log("estoy en el for "+url);
                    let option = document.createElement('option');
                    option.value = item.id_marca;
                    option.text = item.descripcion_marca;
                    document.querySelector("#txtMarca").appendChild(option);                                    
                });
            
            
        }
        console.log(json);
    }catch(err){
        console.log("Ocurrio un error: " + err);
    }
    console.log("estoy en index");
}