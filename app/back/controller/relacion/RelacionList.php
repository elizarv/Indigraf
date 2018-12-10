<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    El coronel necesitó setenta y cinco años -los setenta y cinco años de su vida, minuto a minuto- para llegar a ese instante. Se sintió puro, explícito, invencible, en el momento de responder:  \\
include_once realpath('../../facade/RelacionFacade.php');

$list=RelacionFacade::listAll();
$rta="";
foreach ($list as $obj => $Relacion) {	
	$rta.="{
 	    \"predecesor_id\":\"{$Relacion->getpredecesor()->getid()}\",
	    \"sucesor_id\":\"{$Relacion->getsucesor()->getid()}\"
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