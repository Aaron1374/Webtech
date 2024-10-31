<?php
session_start();

// Destroy all session variables
$_SESSION = [];

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
}

session_destroy();

// Redirect to the login page (you can change this to the appropriate page)
header("Location: login.php");
exit();
?>
