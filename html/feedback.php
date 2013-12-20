<?php

    // configuration
    require_once(dirname(__FILE__) . "/../includes/config.php");
    
    // if form was submitted
    if (isset($_POST['feedbacksubmit']))
    {
		
        // insert feedback 
		$insertfeedback=query("INSERT INTO feedback (user_id, name, email, description) VALUES (?, ?, ?, ?)", $_SESSION["id"], $_POST["name"], $_POST["email"], $_POST["feedback"]);
	    if ($insertfeedback === false)
            apologize("Unable to insert feedback into feedback");

        // define message to show users
        $message="Thank you for giving us feedback.";
        // render sell
        render("sell_form.php", array("title" => "Welcome to Crimson Bookstore!", "message"=> $message)); 

    }
    else 
    {
        // render form
    	render("feedback_form.php", array("title" => "Welcome to Crimson Bookstore!"));
    }    
?>
