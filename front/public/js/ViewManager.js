/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tu alma nos pertenece... Salve Mr. Arciniegas  \\
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
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length-1; i++) {   
                var Administracion = json[i];
                //----------------- Para una tabla -----------------------
                document.getElementById("AdministracionList").appendChild(createTR(Administracion));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
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
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length-1; i++) {   
                var Archivo = json[i];
                //----------------- Para una tabla -----------------------
                document.getElementById("ArchivoList").appendChild(createTR(Archivo));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// ENTRADA \\\\\\\\\\
function preEntradaInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/entrada/EntradaInsert.php',postEntradaInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postEntradaInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Entrada registrado con éxito");
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preEntradaList(container){
     //Solicite información del servidor
     cargaContenido(container,'EntradaList.html'); 
 	enviar("",'../back/controller/entrada/EntradaList.php',postEntradaList); 
}

 function postEntradaList(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length-1; i++) {   
                var Entrada = json[i];
                //----------------- Para una tabla -----------------------
                document.getElementById("EntradaList").appendChild(createTR(Entrada));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
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
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length-1; i++) {   
                var Indicador = json[i];
                //----------------- Para una tabla -----------------------
                document.getElementById("IndicadorList").appendChild(createTR(Indicador));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
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
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length-1; i++) {   
                var Periodo = json[i];
                //----------------- Para una tabla -----------------------
                document.getElementById("PeriodoList").appendChild(createTR(Periodo));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
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
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length-1; i++) {   
                var Relacion = json[i];
                //----------------- Para una tabla -----------------------
                document.getElementById("RelacionList").appendChild(createTR(Relacion));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
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
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length-1; i++) {   
                var Usuario = json[i];
                //----------------- Para una tabla -----------------------
                document.getElementById("UsuarioList").appendChild(createTR(Usuario));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

//That´s all folks!