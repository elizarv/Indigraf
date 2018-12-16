
function cargarInicio(){
	cargaContenido('remp','front/views/home.html');
	document.getElementById("cuenta").value=10000;
	document.getElementById("breadc").innerHTML='<li class="breadcrumb-item"><a href="javascript:cargarInicio()">Inicio</a></li>';
	document.getElementById("seccname").innerHTML='<h2 class="no-margin-bottom">Inicio</h2>';
}

function preIndicadorListPadre(padre){
     //Solicite información del servidor
     formData={'padre':padre};
     cargaContenido('remp','front/views/indicadores.html');
		 if(document.getElementById("cuenta").value==10000){
			 $("#breadc").append('<li class="breadcrumb-item"><a href="javascript:preIndicadorListPadre(\''+padre+'\')">Indicadores</a></li>');
	 	}else if(document.getElementById("cuenta").value!=padre){
			 $("#breadc").append('<li class="breadcrumb-item"><a href="javascript:preIndicadorListPadre(\''+padre+'\')">Indicadores'+padre+'</a></li>');
		 }
		 document.getElementById("cuenta").value=padre;
    //document.getElementById("breadc").innerHTML=str;
 		var str='<h2 class="no-margin-bottom">Indicadores</h2>';
     document.getElementById("seccname").innerHTML=str;
 	enviar(formData,'back/controller/indicador/IndicadorListPadre.php',postIndicadorListPadre);
}

 function postIndicadorListPadre(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){
            for(var i=1; i < Object.keys(json).length; i++) {
                var Indicador = json[i];
                //----------------- Para una tabla -----------------------
                str='<div class="col-sm-6"><div class="card"><div class="card-bodyJ">';
                str+='<h4 class="card-title">'+Indicador.nombre+'</h4><div class="row "><div class="col-sm-6">';
                str+='<img class="card-img" src="'+Indicador.imagen+'" alt="Card image"></div><div class="col-sm-6">';
                str+='<div class="containerJ"><a href="#" class="btn btn-primaryJ">Detalles</a>';
                str+='<a href="#" class="btn btn-primaryJ">Editar</a><a href="#" class="btn btn-primaryJ">Graficar</a>';
                str+='<a href="javascript:eliminarIndicador(\''+Indicador.id+'\')" class="btn btn-primaryJ">Eliminar</a>';
								if(Indicador.esPadre==1){
								str+='<a href="javascript:preIndicadorListPadre(\''+Indicador.id+'\')" class="btn btn-primaryJ">Ver más</a></div></div></div></div></div></div>';
								}
                document.getElementById("IndicadorList").innerHTML+=str;
								var str='<h2 class="no-margin-bottom">'+Indicador.nombre+'</h2>';
						     document.getElementById("seccname").innerHTML=str;
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert("no tiene subindicadores");
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

function cargarFormIndicador(){
	cargaContenido('remp','front/views/formIndicador.html');
	var str='<li class="breadcrumb-item"><a href="javascript:cargarInicio()">Inicio</a></li>';
	str+='<li class="breadcrumb-item"><a href="javascript:cargarIndicadores()">Indicadores</a></li>';
	str+='<li class="breadcrumb-item"><a href="javascript:cargarFormIndicador()">Agergar Indicador</a></li>';
	document.getElementById("breadc").innerHTML=str;
	document.getElementById("seccname").innerHTML='<h2 class="no-margin-bottom">Agregar Indicador</h2>';
}

function eliminarIndicador(id){
    swal({
  title: "Esta seguro?",
  text: "se eliminará éste indicador",
  icon: "warning",
  buttons: true,
  dangerMode: true,
}).then((willDelete) => {
    formData={'id':id};
    enviar(formData,'back/controller/indicador/IndicadorDelete.php',exitoEliminarIndicador);
});
}


function exitoEliminarIndicador(){
    swal("El indicador se ha eliminado con exito!!", {
      icon: "success",
    });
    preIndicadorListPadre(0);//modificar luego, dependiendo de la rama en la que se este
  }
