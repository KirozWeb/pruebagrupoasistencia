

async function getCliente(){   
    document.querySelector("#tblCliente").innerHTML = ""; 
    
    let url = window.location.pathname;
    console.log("estoy en Cliente ");
    let resp;
    try{
        
            resp = await fetch("../control/cliente.php?seleccion=listarClientes");
            console.log("estoy en listregistros");    
        
                 
        json = await resp.json();
        
        if(json.status){
            let data = json.data;
            
                console.log("estoy antes del for "+url);
                
                   
                    data.forEach((item) => {                                         
                        console.log("estoy en el for "+url);
                        let option = document.createElement('option');
                        option.value = item.id_cliente;
                        option.text = item.nombre_cliente;
                        document.querySelector("#txtIdCliente").appendChild(option);                                    
                    });
            
        }
        console.log(json);
    }catch(err){
        console.log("Ocurrio un error: " + err);
    }
    console.log("estoy en index");
}

if(document.querySelector("#tblCliente")){
    getCliente();
    
}
