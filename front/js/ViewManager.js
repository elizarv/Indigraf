/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La primera regla de Anarchy es no hablar de Anarchy  \\
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

            for(var i=1; i < Object.keys(json).length; i++) {
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

            for(var i=1; i < Object.keys(json).length; i++) {
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

            for(var i=1; i < Object.keys(json).length; i++) {
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

            for(var i=1; i < Object.keys(json).length; i++) {
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

            for(var i=1; i < Object.keys(json).length; i++) {
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

function preUsuarioList(){
     //Solicite información del servidor
     cargaContenido('remp','front/views/listarUsuarios.html');
 	enviar("",'back/controller/usuario/UsuarioList.php',postUsuarioList);
    var str='<li class="breadcrumb-item"><a href="javascript:cargarInicio()">Inicio</a></li>'
    str+='<li class="breadcrumb-item"><a href="javascript:preUsuarioList()">Usuarios</a></li>';
    document.getElementById("breadc").innerHTML=str;
    document.getElementById("seccname").innerHTML='<h2 class="no-margin-bottom">Usuarios</h2>';
}

 function postUsuarioList(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){
            for(var i=1; i < Object.keys(json).length; i++) {
                var Usuario = json[i];
                var tipoU;
                switch(Usuario.tipo){
                    case "1":
                        tipoU="Administrador";
                        break;
                    case "2":
                        tipoU="Académico";
                        break;
                    case "3":
                        tipoU="Externo";
                        break;
                    default:
                        break;
                }
                //----------------- Para una tabla -----------------------
                str="<tr><td>"+i+"</td><td>"+Usuario.nombre+"</td><td>"+tipoU+"</td>";
                str+="<td><a class='btn btn-warning btn-sm' data-toggle='tooltip' href='public/actualizarUsuario.html'";
                str+="data-placement='top' title='Actualizar' id='actualizarUsuario'><i class='material-icons'>";
                str+='create</i></a> <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar" id="eliminarUsuario" onclick="eliminarUsuario(\''+Usuario.username+'\')"><i class="material-icons">delete_sweep</i></button></td></tr>';
                document.getElementById("UsuarioList").innerHTML+=str;
            }
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

function eliminarUsuario(id){
    swal({
  title: "Esta seguro?",
  text: "se eliminara el usuario",
  icon: "warning",
  buttons: true,
  dangerMode: true,
}).then((willDelete) => {
    formData={'id':id};
    enviar(formData,'back/controller/usuario/UsuarioDelete.php',exito);
});
$('#actualizarUsuario').tooltip();
$('#eliminarUsuario').tooltip();
}


function exito(){
    swal("Usuario eliminado con exito!!", {
      icon: "success",
    });
    preUsuarioList();
  }


//That´s all folks!
