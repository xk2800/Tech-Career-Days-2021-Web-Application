<?php

    session_start();
    unset($_SESSION["loggedin"]);
    unset($_SESSION["email"]);
    unset($_SESSION["username"]);
    unset($_SESSION["id"]);
    setcookie("email", "", time()-3600);
    header("Location: https://" .$_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/login.php");

?>