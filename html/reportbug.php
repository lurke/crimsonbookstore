<?php

    // configuration
    require_once(dirname(__FILE__) . "/../includes/config.php");
   

    // if form was submitted
    if (isset($_POST['reportbugsubmit']))
    {
		
        // insert bug
		$insertbug=query("INSERT INTO bugs (user_id, name, email, bugdescription) VALUES (?, ?, ?, ?)", $_SESSION["id"], $_POST["name"], $_POST["email"], $_POST["bugdescription"]);
	    if ($insertbug === false)
            apologize("Unable to insert bug into bugs");

        // define message to show users
        $message="Thank you for reporting a bug.";
        // render sell
        render("sell_form.php",array("title" => "Welcome to Crimson Bookstore!", "message"=> $message)); 

    }
    else 
    {
        // render form
    	render("reportbug_form.php", array("title" => "Welcome to Crimson Bookstore!"));
    }    
?>
