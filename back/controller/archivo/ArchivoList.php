<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Muchos años después, frente al pelotón de fusilamiento, el coronel Aureliano Buendía había de recordar aquella tarde remota en que su padre lo llevó a conocer el hielo.   \\
include_once realpath('../../facade/ArchivoFacade.php');

$list=ArchivoFacade::listAll();
$rta="";
foreach ($list as $obj => $Archivo) {	
	$rta.="{
 	    \"id\":\"{$Archivo->getid()}\",
	    \"url\":\"{$Archivo->geturl()}\",
	    \"entrada_id\":\"{$Archivo->getentrada()->getid()}\",
	    \"subidoPor_username\":\"{$Archivo->getsubidoPor()->getusername()}\",
	    \"fechaSubida\":\"{$Archivo->getfechaSubida()}\",
	    \"descripcion\":\"{$Archivo->getdescripcion()}\"
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