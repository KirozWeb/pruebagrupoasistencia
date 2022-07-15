if(document.querySelector("#formRegistroUsuario")){
    let frmRegistro = document.querySelector("#formRegistroUsuario");
    console.log("guardar datos");
    frmRegistro.onsubmit = function(e){
        e.preventDefault();
        fntGuardar();
    }

    async function fntGuardar(){
        console.log("guardar datos");
        console.log("guardar otros datos");
        console.log("verificando");
        let frmRegistro = document.querySelector("#formRegistroUsuario");

        let nombre = document.querySelector("#Nombre").value;
        let apellidos = document.querySelector("#Apellidos").value;
        let tipoIdentificacion = document.querySelector("#TipoIdentificacion").value;
        let numeroIdentificacion = document.querySelector("#NumeroIdentificacion").value;
        let numeroFijoMovil = document.querySelector("#NumeroFijoMovil").value;
        let correo = document.querySelector("#Correo").value;
        let confirmarCorreo = document.querySelector("#ConfirmarCorreo").value;
        let terminosCondiciones = document.querySelector("#TerminosCondiciones");

        if(terminosCondiciones.checked == true){
            console.log("fue accionado");
            //document.querySelector("#TerminosCondiciones").value = 1;
        }
        else{
            console.log("no fue accionado");
        }

        //console.log("estos son los terminos "+terminosCondiciones);

        if(nombre == "" || apellidos == "" || tipoIdentificacion == "" || numeroIdentificacion == "" || numeroFijoMovil == "" || correo == "" || confirmarCorreo == "" || terminosCondiciones.checked != true || correo != confirmarCorreo){
            alert("Todos los campos son obligatorios");
        }

        else{
            try{
            
                const formdata = new FormData(document.getElementById('formRegistroUsuario'));
                
                let resp = await fetch("../control/registroUsuario.php?seleccion=crear",{
                    method: 'POST',
                    mode: 'cors',
                    cache: 'no-cache',
                    body: formdata
                });
                
                json = await resp.json();
                
                if(json.status){
                    /*swal("Guardar",json.msg,"success");
                    frmRegistro.reset();*/
                    alert("sus datos fueron registrados exitosamente");
                }
                else{
                    alert("sus datos no fueron registrados");
                }
                
                console.log(resp);
            }catch(err){
                console.log("Ocurrio un error: " + err);
            }
        }               
        
    }
}