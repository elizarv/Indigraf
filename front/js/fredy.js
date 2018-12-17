var periodos_Array;
function graficar(idIndicador){
	cargaContenido('remp','AdministracionList.html');
	formData={"id":idIndicador};
 	enviar(formData,'back/controller/administracion/AdministracionList.php',postGraficar);
}

function postGraficar(result,state){
if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){
         	periodos_Array=json;
         	/*{
				LLenar el select con los periodos ini-fin >> value=id
				onChange cambiarGraficaPeriodo
			}
         	*/
         	graficaBarras();
         	var length=Object.keys(json).length;            
            graficaRedonda(json[length-1]);
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
			graficaRedonda(periodo);
			return;
		}
	}
}

function graficaRedonda(periodo){

}