<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Eres capaz de hackear mi Facebook?  \\
include_once realpath('../../facade/PeriodoFacade.php');

$id=$_POST['id'];
$indicador = new Indicador();
$indicador->setId($id);
$list=PeriodoFacade::listByIndicador($id);
$rta="";
foreach ($list as $obj => $Periodo) {
	$rta.="{
 	    \"ini\":\"{$Periodo->getfecha_ini()}\",
	    \"fin\":\"{$Periodo->getfecha_fin()}\",
	    \"verde\":\"{$Periodo->getVerde()}\",
	    \"amarillo\":\"{$Periodo->getAmarillo()}\",
	    \"rojo\":\"{$Periodo->getRojo()}\",
	    \"indicador_id\":\"{$Periodo->getindicador()->getid()}\",
	    \"id\":\"{$Periodo->getid()}\",
	    \"cantidad\":\"{$Periodo->getcantidad()}\"
	},";
}

if($rta!=""){
	$rta = substr($rta, 0, -1);
	$msg="{\"msg\":\"exito\"}";
}else{
	$msg="{\"msg\":\"exito\"}";
	//$msg="{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
	$rta="{\"result\":\"No se encontraron registros.\"}";
}
echo "[{$msg},{$rta}]";

//That´s all folks!
