function cargarRegistroUsuarios(){
	cargaContenido('remp','front/views/registrarUsuario.html');
	var str='<li class="breadcrumb-item"><a href="javascript:cargarInicio()">Inicio</a></li>'
	str+='<li class="breadcrumb-item"><a href="javascript:preUsuarioList()">Usuarios</a></li>';
	str+='<li class="breadcrumb-item"><a href="javascript:preUsuarioInsert()">Argregar Usuario</a></li>';
	document.getElementById("breadc").innerHTML=str;
	document.getElementById("seccname").innerHTML='<h2 class="no-margin-bottom">Agregar Usuario</h2>';
}

function cargarActualzacionUsuarios(){
	cargaContenido('remp','front/views/ActualizarUsuario.html');
	var str='<li class="breadcrumb-item"><a href="javascript:cargarInicio()">Inicio</a></li>'
	str+='<li class="breadcrumb-item"><a href="javascript:preUsuarioList()">Usuarios</a></li>';
	str+='<li class="breadcrumb-item"><a href="javascript:preUsuarioInsert()">Arctualizar Usuario</a></li>';
	document.getElementById("breadc").innerHTML=str;
	document.getElementById("seccname").innerHTML='<h2 class="no-margin-bottom">Agregar Usuario</h2>';
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

function preUsuarioSelect(id){
    //Haga aquí las validaciones necesarias antes de enviar el formulario.
    formData={'id':id};
    console.log(formData);
    cargarActualzacionUsuarios();
    enviar(formData,'back/controller/usuario/UsuarioSelect.php',postUsuarioSelect);
}


function postUsuarioSelect(result,state){
    //Maneje aquí la respuesta del servidor.
    //Consideramos buena práctica no manejar código HTML antes de este punto.
        if(state=="success"){
            var json=JSON.parse(result);
                    if(json[0].msg=="exito"){
                        console.log(result);

                       document.getElementById('username').value = json[1].username;
                       document.getElementById('password').value = json[1].password;
                       document.getElementById('nombre').value = json[1].nombre;
                       tipo = json[1].tipo;
                       $("#tipo").val(tipo);
                    }else{
                       alert("Hubo un errror en la busqueda ( u.u)\n"+result);
                    }

       }else{
            alert("Hubo un errror interno ( u.u)\n"+result);
            }
}

function preUsuarioUpdate(idForm){
    //Haga aquí las validaciones necesarias antes de enviar el formulario.
   if(validarForm(idForm)){
       document.getElementById('username').disabled = false;
    var formData=$('#'+idForm).serialize();
    console.log(formData);
    enviar(formData,'back/controller/usuario/UsuarioUpdate.php',postUsuarioUpdate);
    }else{
        alert("Debe llenar los campos requeridos");
    }
}


function postUsuarioUpdate(result,state){
    //Maneje aquí la respuesta del servidor.
    //Consideramos buena práctica no manejar código HTML antes de este punto.
        if(state=="success"){
                    if(result=="true"){
                       swal("Usuario actualizado con exito!!", {
                           icon: "success",
                         });
                         preUsuarioList();
                    }else{
                       alert("Hubo un errror en la actualizacion ( u.u)\n"+result);
                    }

       }else{
            alert("Hubo un errror interno ( u.u)\n"+result);
            }
}
