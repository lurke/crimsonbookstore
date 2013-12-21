<?php
    // from loginregister.php from project
    // configuration
    require("../includes/config.php"); 

    // if login form was submitted
    if(isset($_POST['login_submit']))
    {
    

        // query database for user
        $rows = query("SELECT * FROM users WHERE email = ?", $_POST["email"]);
        if ($rows === false)
        {
            apologize("Sorry, the query failed.");
        }
        
        // if we found user, check password
        else if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];

            // compare hash of user's input against hash that's in database
            if (crypt($_POST["password"], $row["hash"]) == $row["hash"])
            {
                // remember that user's now logged in by storing user's ID in session
                $_SESSION["id"] = $row["id"];

                // redirect to sell.php
                redirect("/sell.php");
            }
        }

        // else apologize
        else
            render('homepage_form.php',  array("apology" => "Invalid email address or password."));
    }
    
    //else if register form was submitted 
    else if (isset($_POST['register_submit'])) 
    {
        // validate submission
        if (empty($_POST["name"]))
        {
            apologize("You must provide your name.");
        }
        if (empty($_POST["email"]))
        {
            apologize("You must provide your Harvard email address.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide a password.");
        }
        else if (($_POST["password"]) != ($_POST["confirmation"]))
        {
            apologize("You must provide a confirmation that matches your password.");
        }  
        else if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $_POST['email']))
        {
            apologize("You must provide a valid email address.");
        } 

        // insert user into database
        $result=query("INSERT INTO users (fullname, email, hash) VALUES(?, ?, ?)", $_POST["name"], $_POST["email"], crypt($_POST["password"]));
        if ($result === false)
        {
            //apologize
            apologize("Invalid name, email, and/or password.");
        }
        
        // find id assigned to user
        $rows = query("SELECT LAST_INSERT_ID() AS id");
        if ($rows === false)
        {
            //apologize
            apologize("Query could not find user's id.");
        }
        $row = $rows[0];
        
        // remember that user's now logged in by storing user's ID in session
        $_SESSION["id"] = $row["id"];

        // redirect sell.php
        redirect("/sell.php");
    }
    
    // else render form
    else
    {
        render("homepage_form.php");
    }

?>
