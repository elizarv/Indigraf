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
            alert(json[0].msg);
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

var indicadoresParaElMapa;
function postListarIndicaores(result,state){
    if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){
            if(json[1].result!="No se encontraron registros."){                                
                indicadoresParaElMapa=json;                
            }else{
                //Manejar el vacío .-. No debería haber un indicador sin periodos \( n.n)/
            }
         }else{
            alert(json[0].msg);
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
                relaciones=json;
                createDiagram(indicadoresParaElMapa,relaciones);             
            }else{
                //Manejar el vacío .-. No debería haber un indicador sin periodos \( n.n)/
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }    
}
function saludar(name){
    alert("Hola "+name);
}