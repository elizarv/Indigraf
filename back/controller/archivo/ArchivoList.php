<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Oh gloria de las glorias, oh divino testamento de la eterna majestad de la creación de dios  \\
include_once realpath('../../facade/ArchivoFacade.php');

$list=ArchivoFacade::listAll();
$rta="";
foreach ($list as $obj => $Archivo) {	
	$rta.="<tr>\n";
	$rta.="<td>".$Archivo->getid()."</td>\n";
	$rta.="<td>".$Archivo->geturl()."</td>\n";
	$rta.="<td>".$Archivo->getsubidoPor()->getusername()."</td>\n";
	$rta.="<td>".$Archivo->getfechaSubida()."</td>\n";
	$rta.="<td>".$Archivo->getdescripcion()."</td>\n";
	$rta.="<td>".$Archivo->getperiodo()->getid()."</td>\n";
	$rta.="</tr>\n";
}
echo $rta;

//That´s all folks!