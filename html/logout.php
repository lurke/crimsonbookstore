<?php

    // configuration
    require_once(dirname(__FILE__) . "/../includes/config.php");
    
    // if user is already logged in, log out
    if (isset($_SESSION["user"]))
        unset($_SESSION["user"]);
 
    // redirect user to index.php
    $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
    $host  = $_SERVER["HTTP_HOST"];
    $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
    header("Location: {$protocol}://{$host}{$path}/index.php");
    
?>
