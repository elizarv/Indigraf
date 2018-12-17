<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ella existió sólo en un sueño. Él es un poema que el poeta nunca escribió.  \\
include_once realpath('../../facade/ArchivoFacade.php');
$list=ArchivoFacade::listByIn();
$rta= "";
for ($i=0; $i < count($list) ; $i++) { 
     $rta.="{
        \"cant\":\"{$list[$i][0]}\",
        \"indi\":\"{$list[$i][1]}\"
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