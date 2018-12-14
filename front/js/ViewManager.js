/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Un generador de código no basta. Ahora debo inventar también un generador de frases tontas  \\
/** Valida los campos requeridos en un formulario
 * Returns flag Devuelve true si el form cuenta con los datos mínimos requeridos
 */
function validarForm(idForm){
	var form=$('#'+idForm)[0];
	for (var i = 0; i < form.length; i++) {
		var input = form[i];
		if(input.required && input.value==""){
			return false;
		}
	}
	return true;
}

////////// ADMINISTRACION \\\\\\\\\\
function preAdministracionInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/administracion/AdministracionInsert.php',postAdministracionInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postAdministracionInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Administracion registrado con éxito");
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preAdministracionList(container){
     //Solicite información del servidor
     cargaContenido(container,'AdministracionList.html'); 
 	enviar("",'../back/controller/administracion/AdministracionList.php',postAdministracionList); 
}

 function postAdministracionList(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
        document.getElementById("AdministracionList").innerHTML=result;
     }else{
 		alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// ARCHIVO \\\\\\\\\\
function preArchivoInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/archivo/ArchivoInsert.php',postArchivoInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postArchivoInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Archivo registrado con éxito");
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preArchivoList(container){
     //Solicite información del servidor
     cargaContenido(container,'ArchivoList.html'); 
 	enviar("",'../back/controller/archivo/ArchivoList.php',postArchivoList); 
}

 function postArchivoList(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
        document.getElementById("ArchivoList").innerHTML=result;
     }else{
 		alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// INDICADOR \\\\\\\\\\
function preIndicadorInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/indicador/IndicadorInsert.php',postIndicadorInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postIndicadorInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Indicador registrado con éxito");
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preIndicadorList(container){
     //Solicite información del servidor
     cargaContenido(container,'IndicadorList.html'); 
 	enviar("",'../back/controller/indicador/IndicadorList.php',postIndicadorList); 
}

 function postIndicadorList(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
        document.getElementById("IndicadorList").innerHTML=result;
     }else{
 		alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// PERIODO \\\\\\\\\\
function prePeriodoInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/periodo/PeriodoInsert.php',postPeriodoInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postPeriodoInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Periodo registrado con éxito");
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function prePeriodoList(container){
     //Solicite información del servidor
     cargaContenido(container,'PeriodoList.html'); 
 	enviar("",'../back/controller/periodo/PeriodoList.php',postPeriodoList); 
}

 function postPeriodoList(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
        document.getElementById("PeriodoList").innerHTML=result;
     }else{
 		alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// RELACION \\\\\\\\\\
function preRelacionInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/relacion/RelacionInsert.php',postRelacionInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postRelacionInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Relacion registrado con éxito");
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preRelacionList(container){
     //Solicite información del servidor
     cargaContenido(container,'RelacionList.html'); 
 	enviar("",'../back/controller/relacion/RelacionList.php',postRelacionList); 
}

 function postRelacionList(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
        document.getElementById("RelacionList").innerHTML=result;
     }else{
 		alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// USUARIO \\\\\\\\\\
function preUsuarioInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/usuario/UsuarioInsert.php',postUsuarioInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postUsuarioInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Usuario registrado con éxito");
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preUsuarioList(container){
     //Solicite información del servidor
     cargaContenido(container,'UsuarioList.html'); 
 	enviar("",'../back/controller/usuario/UsuarioList.php',postUsuarioList); 
}

 function postUsuarioList(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
        document.getElementById("UsuarioList").innerHTML=result;
     }else{
 		alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

//That´s all folks!