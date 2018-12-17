
function cargarInicio(){
	cargaContenido('remp','front/views/home.html');
	document.getElementById("papa").value=0;
	document.getElementById("cuenta").value=0;
	document.getElementById("menus").innerHTML="";
	document.getElementById("breadc").innerHTML='<li class="breadcrumb-item"><i class="material-icons">home</i></li>';
	document.getElementById("seccname").innerHTML='<h2 class="no-margin-bottom">Inicio</h2>';
}

function preIndicadorListPadre(padre,nombre){
     //Solicite información del servidor
     formData={'padre':padre};
     cargaContenido('remp','front/views/indicadores.html');

		 document.getElementById("breadc").innerHTML='<li class="breadcrumb-item"><a href="javascript:cargarInicio()"><i class="material-icons">home</i></a></li>';
		 var c=document.getElementById("cuenta").value;
		 cargarMenus(padre,c);
		 if(padre==0 || padre>document.getElementById("papa").value){
			 c=document.getElementById("cuenta").value;
			 document.getElementById("breadc").innerHTML+=("<li class='breadcrumb-item'>"+nombre+"</li>");
			 document.getElementById("menus").innerHTML+=("<input type='hidden' id='MENU"+c+"' value='"+nombre+"'>");
			 document.getElementById("menus").innerHTML+=("<input type='hidden' id='PADRE"+c+"' value='"+padre+"'>");
			 document.getElementById("cuenta").value=parseInt(c)+1;
		 }
		 document.getElementById("papa").value=padre;
    //document.getElementById("breadc").innerHTML=str;
 		var str='<h2 class="no-margin-bottom">'+nombre+'</h2>';
    document.getElementById("seccname").innerHTML=str;
 		enviar(formData,'back/controller/indicador/IndicadorListPadre.php',postIndicadorListPadre);
}

function cargarMenus(padre,c){
	var nombres=[];
	var ids=[];
		for (var i = 0; i < c; i++) {
			nombre=document.getElementById("MENU"+i).value;
			id=document.getElementById("PADRE"+i).value;
			nombres.push(nombre);
			ids.push(id);
			if(id==padre){
				pintarMenus(nombres,ids);
				break;
			}
			document.getElementById("breadc").innerHTML+=('<li class="breadcrumb-item"><a href="javascript:preIndicadorListPadre('+id+',\''+nombre+'\')">'+nombre+'</a></li>');
		}
}

function pintarMenus(nombres,ids){
	document.getElementById("cuenta").value=nombres.length-1;
	document.getElementById("menus").innerHTML="";
	for (var i = 1; i < nombres.length; i++) {
		nombre=nombres.pop();
		id=ids.pop();
		document.getElementById("menus").innerHTML+=("<input type='hidden' id='MENU"+i+"' value='"+nombre+"'>");
		document.getElementById("menus").innerHTML+=("<input type='hidden' id='PADRE"+i+"' value='"+id+"'>");
	}
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
								if(Indicador.esPadre==1){
									str+='<a title="Ver más" href="javascript:preIndicadorListPadre(\''+Indicador.id+'\',\''+Indicador.nombre+'\')"><img class="card-img" src="'+Indicador.imagen+'" alt="Card image"></div><div class="col-sm-6"></a>';
								}else{
									str+='<img class="card-img" src="'+Indicador.imagen+'" alt="Card image"></div><div class="col-sm-6">';
								}
                str+='<div class="containerJ">';
								str+='<a class="btn btn-primaryJ" data-toggle="tooltip" href="#" data-placement="top" title="Detalles"><i class="material-icons">event_note</i></a>';
								str+='<a class="btn btn-primaryJ" data-toggle="tooltip" href="#" data-placement="top" title="Editar"><i class="material-icons">create</i></a>';
								str+='<a class="btn btn-primaryJ" data-toggle="tooltip" href="javascript:graficar(\''+Indicador.id+'\')" data-placement="top" title="Graficar"><i class="material-icons">assessment</i></a>';
								str+='<a class="btn btn-primaryJ" data-toggle="tooltip" href="javascript:eliminarIndicador(\''+Indicador.id+'\')" data-placement="top" title="Eliminar"><i class="material-icons">delete</i></a>';

                document.getElementById("IndicadorList").innerHTML+=str;
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
						var papa=document.getElementById("papa").value;
						document.getElementById("agregarIndi").innerHTML='<a href="javascript:cargarFormIndicador(\''+papa+'\')"><img id="plus" src="front/public/icons-reference/plus.png" alt="Card image"></a>';
         }else{
            alert("no tiene subindicadores");
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

function cargarFormIndicador(padre){
	cargaContenido('remp','front/views/formIndicador.html');
	var str='<li class="breadcrumb-item"><a href="javascript:cargarInicio()"><i class="material-icons">home</i></a></li>';
	str+='<li class="breadcrumb-item"><a href="javascript:cargarIndicadores(padre)">Indicadores</a></li>';
	str+='<li class="breadcrumb-item"><a href="javascript:cargarFormIndicador(padre)">Agergar Indicador</a></li>';
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
    preIndicadorListPadre(0,'Indicadores');//modificar luego, dependiendo de la rama en la que se este
  }


function cargarMapa(){
	cargaContenido('remp','front/views/mapa.html');
}

function cargarPersonalizar(){
	cargaContenido('remp','front/views/personalizar.html');
	var str='<li class="breadcrumb-item"><a href="javascript:cargarInicio()"><i class="material-icons">home</i></a></li>';
	str+='<li class="breadcrumb-item">Personalizar</li>';
	document.getElementById("breadc").innerHTML=str;
}
