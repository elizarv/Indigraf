<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Alza el puño y ven! ¡En la hoguera hay de beber!  \\
include_once realpath('../../facade/AdministracionFacade.php');

$list=AdministracionFacade::listAll();
$rta="";
foreach ($list as $obj => $Administracion) {	
	$rta.="<tr>\n";
	$rta.="<td>".$Administracion->getid()."</td>\n";
	$rta.="<td>".$Administracion->getcolorP()."</td>\n";
	$rta.="<td>".$Administracion->getcolorS()."</td>\n";
	$rta.="<td>".$Administracion->getlogo()."</td>\n";
	$rta.="<td>".$Administracion->getnombre()."</td>\n";
	$rta.="</tr>\n";
}
echo $rta;

//That´s all folks!