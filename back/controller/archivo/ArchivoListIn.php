<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ella existió sólo en un sueño. Él es un poema que el poeta nunca escribió.  \\
include_once realpath('../../facade/ArchivoFacade.php');
$id = $_POST['id'];
$list=ArchivoFacade::listIn($id);
$rta="";
foreach ($list as $obj => $Archivo) {	
	$rta.="{
 	    \"id\":\"{$Archivo->getid()}\",
	    \"url\":\"{$Archivo->geturl()}\",
	    \"subidoPor_username\":\"{$Archivo->getsubidoPor()->getusername()}\",
	    \"fechaSubida\":\"{$Archivo->getfechaSubida()}\",
	    \"descripcion\":\"{$Archivo->getdescripcion()}\",
	    \"periodo_id\":\"{$Archivo->getperiodo()->getid()}\"
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