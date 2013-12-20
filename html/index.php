<?php
    
    // configuration
    require_once(dirname(__FILE__) . "/../includes/config.php");

    // remember which user, if any, logged in
    $user = CS50::getUser(RETURN_TO);
    if ($user !== false)
        $_SESSION["user"] = $user;

    // if user is already logged in,
    if (isset($_SESSION["user"]))
    {
        //insert user into table
        $needed=query("SELECT * FROM users WHERE email=?", $_SESSION["user"]["email"]);
        if($needed === false) {
            apologize("Unable to look for this user in users");
        }
        if(empty($needed)) {
            $insertuser=query("INSERT INTO users (fullname, email) VALUES (?, ?)", $_SESSION["user"]["fullname"], $_SESSION["user"]["email"]);
            if ($insertuser === false) {
                apologize("Unable to insert user into users");
            }
            $row=query("SELECT LAST_INSERT_ID() AS id");
            $_SESSION["id"]=$row[0]["id"];
        }
        else {
            $_SESSION["id"]=$needed[0]["id"];
        }
        //redirect to sell.php
        $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
        $host  = $_SERVER["HTTP_HOST"];
        $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
        header("Location: {$protocol}://{$host}{$path}/sell.php");
    }
 
    // else redirect user to CS50 ID
    else
        header("Location: " . CS50::getLoginUrl(TRUST_ROOT, RETURN_TO));

?>
