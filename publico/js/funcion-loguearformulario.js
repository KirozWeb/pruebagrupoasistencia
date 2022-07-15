if(document.querySelector("#formSesionUsuario")){
    let frmRegistro = document.querySelector("#formSesionUsuario");
    console.log("guardar datos");
    frmRegistro.onsubmit = function(e){
        e.preventDefault();
        fntLoguear();
    }

    async function fntLoguear(){
        console.log("guardar datos");
        console.log("guardar otros datos");
        console.log("verificando");
        let frmRegistro = document.querySelector("#formSesionUsuario");
        
        let tipoIngreso = document.querySelector("#TipoIngreso").value;
        let numeroIdentificacion = document.querySelector("#NumeroIdentificacion").value;
        let correo = document.querySelector("#Correo").value;
        let codigoSeguridad = document.querySelector("#CodigoSeguridad").value;
        

        //console.log("estos son los terminos "+terminosCondiciones);

        if(numeroIdentificacion == "" || correo == ""){
            alert("Todos los campos son obligatorios");
        }

        else{
            try{
            
                const formdata = new FormData(document.getElementById('formSesionUsuario'));
                
                let resp = await fetch("../control/loguearUsuario.php?seleccion=loguear",{
                    method: 'POST',
                    mode: 'cors',
                    cache: 'no-cache',
                    body: formdata
                });
                
                json = await resp.json();
                
                if(json.status){
                    document.querySelector("#TipoIngreso").value = 2;
                    let formulario = json.formulario;
                    console.log("esto es formulario "+formulario);
                        let newtr = document.createElement("tr");
                        newtr.id = "frm_"+1;
                        newtr.innerHTML = `<tr><td>${formulario}</td>`;
                        document.querySelector("#tblCorreo").appendChild(newtr);
                } 
                else{
                    if(json.security){
                        window.location.replace("../vista/bienvenida.php");
                    }               
                    else{
                        alert("datos errados para iniciar sesion");
                    }
                }
                console.log(resp);
            }catch(err){
                console.log("Ocurrio un error: " + err);
            }
        }               
        
    }
}