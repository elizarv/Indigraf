function cargarInicio(){
	cargaContenido('remp','front/views/inicio.html'); 
	document.getElementById("breadc").innerHTML='<li class="breadcrumb-item"><a href="javascript:cargarInicio()">Inicio</a></li>';
}