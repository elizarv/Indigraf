<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Bastará decir que soy Juan Pablo Castel, el pintor que mató a María Iribarne...  \\
include_once realpath('../../facade/RelacionFacade.php');

$Indicador_id = $_POST['predecesor'];
$indicador= new Indicador();
$indicador->setId($Indicador_id);
$Indicador_id = $_POST['sucesor'];
$indicador= new Indicador();
$indicador->setId($Indicador_id);
RelacionFacade::insert($indicador, $indicador);
echo "true";

//That´s all folks!