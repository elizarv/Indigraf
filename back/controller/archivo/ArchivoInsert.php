<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tranquilo, yo tampoco entiendo cómo funciona mi código  \\
include_once realpath('../../facade/ArchivoFacade.php');

//capturar imagen cargada
//capturamos los datos del fichero subido
$type=$_FILES['idImagen']['type'];
$tmp_name = $_FILES['idImagen']["tmp_name"];
$name = $_FILES['idImagen']["name"];
//Extraer la extensión del archivo. P.e: jpg
# Con explode() segmentamos la cadena de acuerdo al separador que definamos. En este caso punto (.)
$array=explode('.',$name);
# Capturamos el último elemento del array anterior que vendría a ser la extensión
$ext= end($name);
//Creamos una nueva ruta (nuevo path)
//Así guardaremos nuestra idImagen en la carpeta "images"
if($ext=='pdf'){
  $nuevo_path="../../cargas/archivos/".$name;
  $extension='1';
  $url='back/cargas/archivos/'.$name;
}else{
  $nuevo_path="../../cargas/fotos/".$name;
  $extension='2';
  $url='back/cargas/fotos/'.$name;
}
//Movemos el archivo desde su ubicación temporal hacia la nueva ruta
# $tmp_name: la ruta temporal del fichero
# $nuevo_path: la nueva ruta que creamos
//$tmp_name=$tmp_name."/".$name;
move_uploaded_file($tmp_name,$nuevo_path);

$usuario= $_SESSION['usuario'];
$fechaSubida = date("d-m-Y");
$Periodo_id = $_POST['periodo'];
$periodo= new Periodo();
$periodo->setId($Periodo_id);
ArchivoFacade::insert($url, $usuario, $fechaSubida, $periodo,$extension);
echo "true";

//That´s all folks!
