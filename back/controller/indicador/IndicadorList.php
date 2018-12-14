<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Vine a Comala porque me dijeron que acá vivía mi padre, un tal Pedro Páramo.  \\
include_once realpath('../../facade/IndicadorFacade.php');

$list=IndicadorFacade::listAll();
$rta="";
foreach ($list as $obj => $Indicador) {	
	$rta.="<tr>\n";
	$rta.="<td>".$Indicador->getid()."</td>\n";
	$rta.="<td>".$Indicador->getnombre()."</td>\n";
	$rta.="<td>".$Indicador->getdescripcion()."</td>\n";
	$rta.="<td>".$Indicador->getimagen()."</td>\n";
	$rta.="<td>".$Indicador->getpadre()->getid()."</td>\n";
	$rta.="</tr>\n";
}
echo $rta;

//That´s all folks!