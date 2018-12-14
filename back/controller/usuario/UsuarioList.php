<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Soy la sonrisa burlona y vengativa de Jack  \\
include_once realpath('../../facade/UsuarioFacade.php');

$list=UsuarioFacade::listAll();
$rta="";
foreach ($list as $obj => $Usuario) {	
	$rta.="<tr>\n";
	$rta.="<td>".$Usuario->getusername()."</td>\n";
	$rta.="<td>".$Usuario->getpassword()."</td>\n";
	$rta.="<td>".$Usuario->getnombre()."</td>\n";
	$rta.="<td>".$Usuario->gettipo()."</td>\n";
	$rta.="</tr>\n";
}
echo $rta;

//That´s all folks!