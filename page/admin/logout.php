<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// hapus semua session
$_SESSION = [];

session_unset();
session_destroy();

// hapus cookie session
if (ini_get("session.use_cookies")) {

    $params = session_get_cookie_params();

    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// no cache
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

// redirect login + refresh
header("Refresh:0; url=login.php");
exit;
?>