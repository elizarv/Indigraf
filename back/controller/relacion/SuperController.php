<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Bastará decir que soy Juan Pablo Castel, el pintor que mató a María Iribarne...  \\
include_once realpath('../../facade/RelacionFacade.php');
$rta="";
try{
	$created= $_POST['created'];	
	//$updated= $_POST['updated']; Tú no le importas a nadie XD
	foreach ($created as $rel) {
		//$rta.=$rel["FromShapeId"]." hasta ".$rel["ToShapeId"];
		$pre= new Indicador();
		$pre->setId($rel["FromShapeId"]);	
		$su= new Indicador();
		$su->setId($rel["ToShapeId"]);
		RelacionFacade::insert($pre, $su);
	}
} catch (Exception $e) {
	//Do nothing
}
try{
	$deleted= $_POST['deleted'];
	foreach ($deleted as $rel) {
		//$rta.=$rel["FromShapeId"]." hasta ".$rel["ToShapeId"];
		$pre= new Indicador();
		$pre->setId($rel["FromShapeId"]);	
		$su= new Indicador();
		$su->setId($rel["ToShapeId"]);
		RelacionFacade::delete($pre, $su);
	}
} catch (Exception $e) {
	//Do nothing
}
echo $rta;

//That´s all folks!