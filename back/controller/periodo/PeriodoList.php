<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Eres capaz de hackear mi Facebook?  \\
include_once realpath('../../facade/PeriodoFacade.php');

$list=PeriodoFacade::listAll();
$rta="";
foreach ($list as $obj => $Periodo) {	
	$rta.="{
 	    \"fecha_ini\":\"{$Periodo->getfecha_ini()}\",
	    \"fecha_fin\":\"{$Periodo->getfecha_fin()}\",
	    \"meta\":\"{$Periodo->getmeta()}\",
	    \"indicador_id\":\"{$Periodo->getindicador()->getid()}\",
	    \"id\":\"{$Periodo->getid()}\",
	    \"cantidad\":\"{$Periodo->getcantidad()}\"
	},";
}

if($rta!=""){
	$rta = substr($rta, 0, -1);
	$msg="{\"msg\":\"exito\"}";
}else{
	$msg="{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
	$rta="{\"result\":\"No se encontraron registros.\"}";	
}
echo "[{$msg},{$rta}]";

//That´s all folks!