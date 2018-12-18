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
             	/*{
    				Llenar el select con los periodos ini-fin >> value=id
    				onChange cambiarGraficaPeriodo
    			}
             	*/             	
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

function graficaBarras(){
	var length=Object.keys(periodos_Array).length;
	for(var i=1; i < length; i++) {
        var periodo = periodos_Array[i];           				
    }
}

function cambiarGraficaPeriodo(idPeriodo){
	for(periodo in periodos_Array){
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

    var data = google.visualization.arrayToDataTable([
      ['Label', 'Value'],
      ['', 80],
    ]);

    var options = {
      width: 400, height: 120,
      redFrom: 90, redTo: 100,
      yellowFrom:75, yellowTo: 90,
      minorTicks: 5
    };

    var chart = new google.visualization.Gauge(document.getElementById('chart_div_reloj'));

    chart.draw(data, options);        
}
function drawChartArea() {
    var data = google.visualization.arrayToDataTable([
      ['Periodo', 'Cantidad', 'Meta'],
      ['2013',  1000,      400],
      ['2014',  1170,      460],
      ['2015',  660,       1120],
      ['2016',  1030,      540]
    ]);

    var options = {
      title: 'Historial del indicador:',
      hAxis: {title: 'Periodo',  titleTextStyle: {color: '#333'}},
      vAxis: {minValue: 0}
    };

    var chart = new google.visualization.AreaChart(document.getElementById('chart_div_area'));
    chart.draw(data, options);
}