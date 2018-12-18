var periodos_Array;
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
             	/*{
    				Llenar el select con los periodos ini-fin >> value=id
    				onChange cambiarGraficaPeriodo
    			}
             	*/
             	graficaBarras();
             	var length=Object.keys(json).length;            
                graficaRedonda(json[length-1]);
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
    console.log(periodos_Array);
}

function cambiarGraficaPeriodo(idPeriodo){
	for(periodo in periodos_Array){
		if(periodo.id==idPeriodo){
			graficaRedonda(periodo);
			return;
		}
	}
}

function graficaRedonda(periodo){

}