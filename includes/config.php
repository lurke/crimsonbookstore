<?php

    /***********************************************************************
     * config.php
     *
     * Crimson Bookstore
     * Lauren Urke and Sergeui Balanovich
     *
     * Configures pages.
     **********************************************************************/

    // display errors, warnings, and notices
    ini_set("display_errors", true);
    error_reporting(E_ALL);

    // requirements
    require("constants.php");
    require("functions.php");

    // URL that CS50 ID should ask users to trust; must be registered with CS50,
    // per the HOWTO at https://manual.cs50.net/ID; must be a prefix of RETURN_TO
    define("TRUST_ROOT", "http://www.crimsonbookstore.com");
 
    // URL to which CS50 ID should return users; must be registered with CS50,
    // per the HOWTO at https://manual.cs50.net/ID
    define("RETURN_TO", "http://www.crimsonbookstore.com");
 
    // CS50 Library; ideally, this should not be inside public_html (or DocumentRoot)
    require_once(dirname(__FILE__) . "/../CS50/CS50.php");

    // enable sessions
    session_start();

   // require authentication for most pages
   if (!preg_match("{(?:index|logout)\.php$}", $_SERVER["PHP_SELF"]))
   {
       if (empty($_SESSION["id"]))
       {
           redirect("/");
       }
   }

?>
