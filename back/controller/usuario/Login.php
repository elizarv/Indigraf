<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Y si mejor estudias comunicación?  \\
include_once realpath('../../facade/UsuarioFacade.php');

$username = $_POST['username'];
$password = $_POST['password'];
$usuario = UsuarioFacade::login($username, $password);
if($usuario!=null){
    session_start();
    $_SESSION["usuario"]=serialize($usuario);
    //$usuario=unserialize($_SESSION["usuario"]);
    echo '<script language="javascript">window.location="../../../index.html"</script>';
}else{
    echo '<script language="javascript">window.location="../../../login.html"</script>';
}

//That´s all folks!