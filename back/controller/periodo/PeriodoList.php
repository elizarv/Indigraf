<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No se fije en el corte de cabello, soy mucho muy rico  \\
include_once realpath('../../facade/PeriodoFacade.php');

$list=PeriodoFacade::listAll();
$rta="";
foreach ($list as $obj => $Periodo) {	
	$rta.="<tr>\n";
	$rta.="<td>".$Periodo->getfecha_ini()."</td>\n";
	$rta.="<td>".$Periodo->getfecha_fin()."</td>\n";
	$rta.="<td>".$Periodo->getmeta()."</td>\n";
	$rta.="<td>".$Periodo->getindicador()->getid()."</td>\n";
	$rta.="<td>".$Periodo->getid()."</td>\n";
	$rta.="<td>".$Periodo->getcantidad()."</td>\n";
	$rta.="</tr>\n";
}
echo $rta;

//That´s all folks!