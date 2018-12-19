/*
function loadPage(){
    alert("holi");
    include("https://www.gstatic.com/charts/loader.js");
    cargarLasMaricadasDeGoogle();
    alert("holi x2");
}
function include(file_path){
      var j = document.createElement("script");
      j.type = "text/javascript";
      j.src = file_path;
      j.id="ElJoputaScript";
      document.body.appendChild(j);
      console.log(j);
    }
*/
var userLogged;


var periodos_Array;
var periodoSeleccionado;
function graficar(idIndicador){
	cargaContenido('remp','front/views/graficas.html');
	formData={"id":idIndicador};
 	enviar(formData,'back/controller/periodo/PeriodoListByIndicador.php',postGraficar);
}

function postGraficar(result,state){
    if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){
         	if(json[1].result!="No se encontraron registros."){
                periodos_Array=json;
                cargarLasMaricadasDeGoogle();
                var mySelect=document.getElementById("selectGraficaPeriodos");
                removeAllChildren(mySelect);
             	for(var i=1; i < Object.keys(json).length; i++) {
                    var p = json[i];
                    var ini=p.ini.split(" ");
                    var fin=p.fin.split(" ");
                    var fecha = ini[0]+" - "+fin[0];
                    mySelect.appendChild(createOPTION(p.id,fecha));
                }
             	var length=Object.keys(json).length;
                periodoSeleccionado=json[length-1];
            }else{
                //Manejar el vacío .-. No debería haber un indicador sin periodos \( n.n)/
            }
         }else{
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

function cambiarGraficaPeriodo(){
    var idPeriodo= document.getElementById("selectGraficaPeriodos").value;
    for (var i = 1; i < periodos_Array.length; i++) {
        var periodo=periodos_Array[i];
		if(periodo.id==idPeriodo){
			periodoSeleccionado=periodo;
            drawChartReloj();
			return;
		}
	}
}

function cargarLasMaricadasDeGoogle(){
    google.charts.load('current', {'packages':['gauge']});
    google.charts.setOnLoadCallback(drawChartReloj);
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChartArea);
}
function drawChartReloj() {
        var periodo = periodoSeleccionado;
        var ini=periodo.ini.split(" ");
        var fin=periodo.fin.split(" ");
        var fecha = ini[0]+" - "+fin[0];
        $("#tituloGraficaRedonda").text(fecha);
    var data = google.visualization.arrayToDataTable([
      ['Label', 'Value'],
      ["", parseFloat(periodoSeleccionado.cantidad)],
    ]);

    var options = {
      width: 300, height: 300,
      redFrom: 0, redTo: parseFloat(periodoSeleccionado.rojo),
      yellowFrom:parseFloat(periodoSeleccionado.rojo)+1, yellowTo: parseFloat(periodoSeleccionado.verde),
      greenFrom: parseFloat(periodoSeleccionado.verde)+1, greenTo: parseFloat(periodoSeleccionado.amarillo),
      minorTicks: 5
    };

    var chart = new google.visualization.Gauge(document.getElementById('chart_div_reloj'));
    chart.draw(data, options);
}

function drawChartArea() {
    var array = [];
    array.push(['Periodo', 'Cantidad', 'Meta']);
    var length=Object.keys(periodos_Array).length;
    for(var i=1; i < length; i++) {
        var periodo = periodos_Array[i];
        var meta=parseFloat(periodo.amarillo);
        var cant=parseFloat(periodo.cantidad);
        var ini=periodo.ini.split(" ");
        var fin=periodo.fin.split(" ");
        var fecha = ini[0]+" - "+fin[0];
        array.push([fecha,cant,meta]);
    }
    var data = google.visualization.arrayToDataTable(
        array
    );

    var options = {
      title: 'Historial del indicador:',
      hAxis: {title: 'Periodo',  titleTextStyle: {color: '#333'}},
      vAxis: {minValue: 0}
    };

    var chart = new google.visualization.AreaChart(document.getElementById('chart_div_area'));
    chart.draw(data, options);
}

function cargarMapa(){
    enviar("",'back/controller/indicador/IndicadorList.php',postListarIndicadores);
}

var indicadoresParaElMapa=[];
var relacionesParaElMapa=[];
function postListarIndicadores(result,state){
    if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){
            if(json[1].result!="No se encontraron registros."){
                //indicadoresParaElMapa=json;
                for(var i=1; i < Object.keys(json).length; i++) {
                    var ind = json[i];
                    if(ind.id!=0){
                        indicadoresParaElMapa.push(ind);
                    }
                    if(ind.padre_id!=0 && ind.padre_id != null && ind.padre_id!=""){
                        relacionesParaElMapa.push({"predecesor_id":ind.padre_id,"sucesor_id":ind.id});
                    }
                }
            }else{
                //Manejar el vacío .-. No debería haber un indicador sin periodos \( n.n)/
            }
         }else{
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
    enviar("",'back/controller/relacion/RelacionList.php',postListarRelaciones);
}

function postListarRelaciones(result,state){
    if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){
            if(json[1].result!="No se encontraron registros."){
//                relaciones=json;
                for(var i=1; i < Object.keys(json).length; i++) {
                    var rel = json[i];
                    if(rel.predecesor_id==0 || rel.sucesor_id==0){
                        //Do Nothing
                    }else{
                        relacionesParaElMapa.push({"predecesor_id":rel.predecesor_id,"sucesor_id":rel.sucesor_id});
                    }
                }
            }else{
            }
            createDiagram(indicadoresParaElMapa,relacionesParaElMapa);
         }else{
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}
function saludar(name){
    alert("Hola "+name);
}

function chismosearMapa(){
    var diagram = $("#diagram").data("kendoDiagram");
    var relaciones=diagram.connectionsDataSource.getChanges();
    enviar(relaciones,'back/controller/relacion/superController.php',postChismosearMapa);
}

function postChismosearMapa(result,state){
    console.log(result);
    if(state=="success"){
            alert("Cambios registrados con éxito");
            setTimeout(function(){ cargarMapa(); }, 1000);
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

function logout(){
    enviar("",'back/controller/usuario/logout.php',postLogout);
}
function postLogout(){
    window.location="login.html";
}

function mostrarSubirArchivos(){
  document.getElementById("divSubirArchivos").style.display = "initial";
}

function preSubirArchivo(idForm){
 var rutaIndi;
    var rutaPer;    
      document.getElementById("idPadre").value=papa;
      rutaIndi='back/controller/indicador/IndicadorInsert.php';
      rutaPer='back/controller/periodo/PeriodoInsert.php';    
    //Haga aquí las validaciones necesarias antes de enviar el formulario.
   if(validarForm(idForm)){
     var form = $("#"+idForm)[0];
     var formData=new FormData(form);
    $.ajax({
                    type: "POST",
                    url: rutaIndi,
                    data: formData,
                    enctype: 'multipart/form-data',
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function (data) {
                      console.log(data);
                      var json=JSON.parse(data);
                        if (json[0].msg== "exito") {
                               //insertar periodo
                               if(json[2].tipo=="insert")enviar(json[1],rutaPer,postIndicadorInsert);
                               else{
                                 enviar(json[1],rutaPer,postIndicadorUpdate);
                               }
                          }else{
                             alert("Hubo un errror en la inserción ( u.u)\n");
                          }
                    },
                    error: function (data) {
                        alert("Hubo un errror interno ( u.u)\n");
                    }
});
    }else{
        alert("Debe llenar los campos requeridos");
    } 
}