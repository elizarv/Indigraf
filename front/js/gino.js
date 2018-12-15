function cargarRegistroUsuarios(){
	cargaContenido('remp','front/views/registrarUsuario.html'); 
}

function preUsuarioInsert(idForm){
    //Haga aquí las validaciones necesarias antes de enviar el formulario.
   if(validarForm(idForm)){
    var formData=$('#'+idForm).serialize();
    console.log(formData);
    enviar(formData,'back/controller/usuario/UsuarioInsert.php',postUsuarioInsert);
    }else{
        alert("Debe llenar los campos requeridos");
    }
}


function postUsuarioInsert(result,state){
    //Maneje aquí la respuesta del servidor.
    //Consideramos buena práctica no manejar código HTML antes de este punto.
    console.log(result);
        if(state=="success"){
                    if(result=="true"){            
                       swal("Usuario registrado con exito!!", {
                           icon: "success",
                         });
                         preUsuarioList();
                    }else{
                       alert("Hubo un errror en la inserción ( u.u)\n"+result);
                    } 		
                   
       }else{
            alert("Hubo un errror interno ( u.u)\n"+result);
            }
}