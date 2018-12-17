
var cuenta=0;
var papa=0;
var arrayNombres=[];
var arrayIds=[];
var nombreIndicador;

function cargarInicio(){
	cargaContenido('remp','front/views/home.html');
	cuenta=0;
	papa=0;
	document.getElementById("breadc").innerHTML='<li class="breadcrumb-item"><i class="material-icons">home</i></li>';
	document.getElementById("seccname").innerHTML='<h2 class="no-margin-bottom">Inicio</h2>';
}

function preIndicadorListPadre(padre,nombre){
     //Solicite información del servidor
     formData={'padre':padre};
     cargaContenido('remp','front/views/indicadores.html');
		 document.getElementById("breadc").innerHTML='<li class="breadcrumb-item"><a href="javascript:cargarInicio()"><i class="material-icons">home</i></a></li>';
		 cargarMenus(padre,cuenta);
		 if(padre==0 || padre>papa || papa==10000){
			 document.getElementById("breadc").innerHTML+=("<li class='breadcrumb-item'>"+nombre+"</li>");
			 arrayNombres[cuenta]=nombre;
			 arrayIds[cuenta]=padre;
			 cuenta+=1;
		 }
		 papa=padre;
 		var str='<h2 class="no-margin-bottom">'+nombre+'</h2>';
		nombreIndicador=nombre;
    document.getElementById("seccname").innerHTML=str;
		enviar(formData,'back/controller/indicador/IndicadorListPadre.php',postIndicadorListPadre);

}

function cargarMenus(padre,c){
	var nombres=[];
	var ids=[];
		for (var i = 0; i < c; i++) {
			nombre=arrayNombres[i];
			id=arrayIds[i];
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
	cuenta=nombres.length-1;
	arrayNombres=[];
	arrayIds=[];
	for (var i = 1; i < nombres.length; i++) {
		nombre=nombres.pop();
		id=ids.pop();
		arrayNombres.push(nombre);
		arrayIds.push(id);
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
								str+='<a class="btn btn-primaryJ" data-toggle="tooltip" href="javascript:preCargarDetalles(\''+Indicador.id+'\')" data-placement="top" title="Detalles"><i class="material-icons">event_note</i></a>';
								str+='<a class="btn btn-primaryJ" data-toggle="tooltip" href="#" data-placement="top" title="Editar"><i class="material-icons">create</i></a>';
								str+='<a class="btn btn-primaryJ" data-toggle="tooltip" href="javascript:graficar(\''+Indicador.id+'\')" data-placement="top" title="Graficar"><i class="material-icons">assessment</i></a>';
								str+='<a class="btn btn-primaryJ" data-toggle="tooltip" href="javascript:eliminarIndicador(\''+Indicador.id+'\')" data-placement="top" title="Eliminar"><i class="material-icons">delete</i></a>';

                document.getElementById("IndicadorList").innerHTML+=str;
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
						document.getElementById("agregarIndi").innerHTML='<a href="javascript:cargarFormIndicador(\''+papa+'\',\''+nombreIndicador+'\')"><img id="plus" src="front/public/icons-reference/plus.png" alt="Card image"></a>';
         }else{
            alert("no tiene subindicadores");
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
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


function preCargarDetalles(id){
	cargaContenido('remp','front/views/infoIndicador.html');
	document.getElementById("breadc").innerHTML='<li class="breadcrumb-item"><a href="javascript:cargarInicio()"><i class="material-icons">home</i></a></li>';
	formData={'id':id};
	enviar(formData,'back/controller/indicador/Indicadorselect.php',postCargarDetalles);
}

function postCargarDetalles(result,state){
	if(state=="success"){
			var json=JSON.parse(result);
			if(json[0].msg=="exito"){
		 	 	var Indicador = json[1];
				cargarMenus(Indicador.padre,cuenta);
				document.getElementById("breadc").innerHTML+='<li class="breadcrumb-item">Detalles '+Indicador.nombre+'</li>';
				cuenta++;
				papa=10000;
			}
 	}
}


function cargarFormIndicador(padre,nombre){
	cargaContenido('remp','front/views/formIndicador.html');
	document.getElementById("breadc").innerHTML='<li class="breadcrumb-item"><a href="javascript:cargarInicio()"><i class="material-icons">home</i></a></li>';
	cargarMenus(padre,cuenta);
	document.getElementById("breadc").innerHTML+='<li class="breadcrumb-item"><a href="javascript:preIndicadorListPadre(\''+padre+'\',\''+nombre+'\')">'+nombre+'</a></li>';
	document.getElementById("breadc").innerHTML+='<li class="breadcrumb-item">Agregar Indicador</li>';
}
