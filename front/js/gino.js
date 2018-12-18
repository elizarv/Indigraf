var cantidadI="";
var contador=1;
var cantidades= [];
var idIndicador="";
function cargarRegistroUsuarios(){
	cargaContenido('remp','front/views/registrarUsuario.html');
	var str='<li class="breadcrumb-item"><a href="javascript:cargarInicio()"><i class="material-icons">home</i></a></li>'
	str+='<li class="breadcrumb-item"><a href="javascript:preUsuarioList()">Usuarios</a></li>';
	str+='<li class="breadcrumb-item">Argregar Usuario</li>';
	document.getElementById("breadc").innerHTML=str;
	document.getElementById("seccname").innerHTML='<h2 class="no-margin-bottom">Agregar Usuario</h2>';
}

function cargarActualzacionUsuarios(){
	cargaContenido('remp','front/views/ActualizarUsuario.html');
	var str='<li class="breadcrumb-item"><a href="javascript:cargarInicio()"><i class="material-icons">home</i></a></li>'
	str+='<li class="breadcrumb-item"><a href="javascript:preUsuarioList()">Usuarios</a></li>';
	str+='<li class="breadcrumb-item">Arctualizar Usuario</li>';
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

// Peticiones
function prePeticionesList(){
    //Solicite información del servidor
    cargaContenido('remp','front/views/peticiones.html');
		str='<li class="breadcrumb-item"><a href="javascript:cargarInicio()"><i class="material-icons">home</i></a></li>';
		str+='<li class="breadcrumb-item">Lista de peticiones</li>'
		document.getElementById("breadc").innerHTML=str;
    enviar("",'back/controller/indicador/IndicadorList.php',postPeticionesList);
}


function postPeticionesList(result,state){
    //Maneje aquí la respuesta del servidor.
    if(state=="success"){
        var json=JSON.parse(result);
        var cantidad = Object.keys(json).length;
        cantidadI= cantidad;
        if(json[0].msg=="exito"){
           for(var i=1; i < Object.keys(json).length; i++) {

               //----------------- Para una tabla -----------------------


               str="<tr><td>"+i+"</td><td>"+json[i].nombre+"</td><td id="+json[i].id+"></td></tr>";
               document.getElementById("peticionesList").innerHTML+=str;
               document.getElementById("cantidadI").value= cantidad

           }
           enviar("",'back/controller/archivo/ArchivoCantByIn.php',postPeticionesCant);

        }
    }else{
        alert("Hubo un errror interno ( u.u)\n"+result);
    }
}

function postPeticionesCant(result,state){
    //Maneje aquí la respuesta del servidor.
    if(state=="success"){
        console.log(result);
        var json=JSON.parse(result);
        if(json[0].msg=="exito"){
            for(var i=1; i < Object.keys(json).length; i++) {
              document.getElementById(json[i].indi).innerHTML = "<a href='javascript:cargarVistaAprobar("+json[i].indi+")'>"+json[i].cant+"</a>";

            }
        }
    }else{
        alert("Hubo un errror interno ( u.u)\n"+result);
    }
}

function cargarVistaAprobar(id){
    idIndicador=id;
    cargaContenido('remp','front/views/aprobarArchivos.html');
    formData={'id':id};
    enviar(formData,'back/controller/archivo/ArchivoListIn.php',postAprobarList);
}

function postAprobarList(result,state){
    //Maneje aquí la respuesta del servidor.
    if(state=="success"){
        console.log(result);
        var json=JSON.parse(result);
        if(json[0].msg=="exito"){
            for(var i=1; i < Object.keys(json).length; i++) {
              
                str="<tr><td>"+i+"</td><td>"+json[i].subidoPor_username+"</td><td><a href='"+json[i].url+"'>Ver mas</a></td><td><button onclick='aprobarArchivo("+json[i].id+")' class='btn btn-warning btn-sm' data-toggle='tooltip' data-placement='top' title='Aprobar' id='aprobarArchivo'><i class='material-icons'>thumb_up_alt</i></button> <button  onclick='eliminarArchivo("+json[i].id+")' class='btn btn-danger btn-sm' data-toggle='tooltip' data-placement='top' title='Eliminar' id='eliminarArchivo'><i class='material-icons'>delete_sweep</i></button></td></tr>";
                document.getElementById("archivos").innerHTML+=str;
            }
        }
    }else{
        alert("Hubo un errror interno ( u.u)\n"+result);
    }
}

function eliminarArchivo(id){
    swal({
        title: "Esta seguro?",
        text: "se eliminara el archivo",
        icon: "warning",
          buttons: true,
        dangerMode: true,
          confirmButtonTetx: "OK",
      }).then((willDelete) => {
          if(willDelete){
          formData={'id':id};
          enviar(formData,'back/controller/archivo/ArchivoDelete.php',exito);
          }
      });
}

function aprobarArchivo(id){
    swal({
        title: "Esta seguro?",
        text: "se aprobara el archivo",
        icon: "warning",
          buttons: true,
        dangerMode: true,
          confirmButtonTetx: "OK",
      }).then((willDelete) => {
          if(willDelete){
          formData={'id':id};
          enviar(formData,'back/controller/archivo/ArchivoAprove.php',exito);
          }
      });
}

function exito(){
    swal("La transaccion se realizco con exito!!", {
      icon: "success",
    });
    cargarVistaAprobar(idIndicador);
  }

function personalizar (idForm){
    if(validarForm(idForm)){
        var formData=$('#'+idForm).serialize();
        console.log(formData);
        enviar(formData,'back/controller/administracion/AdministracionInsert.php',postPerzonalizar);
        }else{
            alert("Debe llenar los campos requeridos");
        }
}

function postPerzonalizar(){
    var newTitle = document.getElementById('nombreEmpresa').value;
    document.getElementById('nombreEmpresa').innerHTML = newTitle;
    var colorP = document.getElementById('colorP').value;
    var colorS = document.getElementById('colorS').value;
    console.log(colorP,colorS);
    swal("La aplicación se personalizó con exito!!", {
      icon: "success",
    });
  }

  function window_onload(){
    enviar("",'back/controller/administracion/AdministracionList.php',postCarga);
  }

  function postCarga(result,state){
    //Maneje aquí la respuesta del servidor.
    if(state=="success"){
        console.log(result);
        var json=JSON.parse(result);
        if(json[0].msg=="exito"){
            var nombre = json[Object.keys(json).length - 1].nombre;
            var colorP = json[Object.keys(json).length - 1].colorP;
            var colorS = json[Object.keys(json).length - 1].colorS;
            document.getElementById("titulo").innerHTML = nombre;
            document.getElementById("navHeader").style.backgroundColor = colorP;
            document.getElementById("navFooter").style.backgroundColor = colorP;
            // insertar regla css
            if(colorP && colorS != ""){
                var styleshe = document.styleSheets;
                var csss = styleshe[Object.keys(styleshe).length - 1];
                csss.insertRule(".btn-primary {background-color:"+colorS+"}", 0);
                csss.insertRule(".material-icons {color:"+colorS+"}", 0);
            }

        }
    }else{
        alert("Hubo un errror interno ( u.u)\n"+result);
    }
}


