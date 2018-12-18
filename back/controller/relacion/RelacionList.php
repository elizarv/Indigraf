<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Y si mejor estudias comunicación?  \\
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
	$msg="{\"msg\":\"exito\"}";
	$rta="{\"result\":\"No se encontraron registros.\"}";	
}
echo "[{$msg},{$rta}]";

//That´s all folks!