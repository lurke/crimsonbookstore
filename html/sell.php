<?php

    // configuration
    require_once(dirname(__FILE__) . "/../includes/config.php");
    // if form was submitted
    if (isset($_POST['sellformsubmit']))
    {
        //check if book is in database
        $isbookneeded=query("SELECT * FROM books WHERE isbn13=?", $_POST["isbn13"]);
        if($isbookneeded === false) {
        	apologize("Unable to look for this book in books");
        }
        if(isset($_POST["smandatory"]))
            $smandatory=1;
        else
            $smandatory=0;
        // find class_id
        $class_id=2; //need to query
        // check to see if need to insert another of the same book (for diff classes)
        $add1 = true;
        foreach($isbookneeded as $row){
            if($row['class_id'] == $class_id)
                $add1 = false;
            else
                $add1 = true;
        }
        // insert book if need new one or none at all
        if(empty($isbookneeded) || ($add1 === true)) {
			$insertbook=query("INSERT INTO books (title, author, publisher, class_id, smandatory, picture, description, isbn10, isbn13) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)", $_POST["title"], $_POST["authors"], $_POST["publisher"], $class_id, $smandatory, $_POST["pic"], $_POST["description"], $_POST["isbn10"], $_POST["isbn13"]);
	        if ($insertbook === false) {
	            apologize("Unable to insert book into books");
	        }
	        $row=query("SELECT LAST_INSERT_ID() AS id");
	        $book_id=$row[0]["id"];
	    }
	    else {
	    	$book_id=$isbookneeded[0]["id"];
	    }
	    
		//insert listing into database
		$listing = query("INSERT INTO listings (book_id, user_id, price, book_condition, comments) VALUES (?, ?, ?, ?, ?)", $book_id, $_SESSION["id"], $_POST["price"], $_POST["book_condition"], $_POST["comments"]);

        // define message to show users
        $message="You have successfully listed " . $_POST["title"] . " for sale. You will be notified when users add this to their shopping cart.";
        // render sell
        render("sell_form.php",array("title" => "Welcome to Crimson Bookstore!", "message"=> $message)); 

    }
    else 
    {
        // render sell
    	render("sell_form.php", array("title" => "Welcome to Crimson Bookstore!"));
    }
    
?>
