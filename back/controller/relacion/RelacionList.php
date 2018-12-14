<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Bastará decir que soy Juan Pablo Castel, el pintor que mató a María Iribarne...  \\
include_once realpath('../../facade/RelacionFacade.php');

$list=RelacionFacade::listAll();
$rta="";
foreach ($list as $obj => $Relacion) {	
	$rta.="<tr>\n";
	$rta.="<td>".$Relacion->getpredecesor()->getid()."</td>\n";
	$rta.="<td>".$Relacion->getsucesor()->getid()."</td>\n";
	$rta.="</tr>\n";
}
echo $rta;

//That´s all folks!