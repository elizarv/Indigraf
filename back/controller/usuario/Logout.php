<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tienes que considerar la posibilidad de que a Dios no le caes bien.  \\
include_once realpath('../../facade/UsuarioFacade.php');

session_start();

// Destruir todas las variables de sesión.
$_SESSION = array();

// Si se desea destruir la sesión completamente, borre también la cookie de sesión.
// Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalmente, destruir la sesión.
session_destroy();
echo '<script language="javascript">window.location="login.html"</script>';

//That´s all folks!