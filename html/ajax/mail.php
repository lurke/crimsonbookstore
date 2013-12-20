<?php
#require_once(dirname(__FILE__) . "/../../includes/config.php");
    if(isset($_POST['listid']) && !empty($_POST['listid'])) {
    
            require '../db/connect.php';
	        
	        //all data tests have passed so store data in variables
	        $listingquery = mysql_query("
                SELECT * FROM listings
                WHERE ('id' = '" . $_POST['listid'] . "')") or die(mysql_error());                
            $listingresults = mysql_fetch_array($listingquery);
            $sellerid = $listingresults['user_id'];
            $sellerbook = $listingresults['book_id'];
            
            $bookquery = mysql_query("
                SELECT * FROM books
                WHERE ('id' = '" . $sellerbook . "')") or die(mysql_error());                
            $bookresults = mysql_fetch_array($bookquery);
            
            $sellerquery = mysql_query("
                SELECT * FROM users
                WHERE ('id' = '" . $sellerid . "')") or die(mysql_error());            
	        $sellerresults = mysql_fetch_array($sellerquery);
	        
	        $buyerquery = mysql_query("
                SELECT * FROM users
                WHERE ('id' = '" . $_SESSION['id'] . "')") or die(mysql_error());            
	        $buyerresults = mysql_fetch_array($buyerquery);
	        
	        $sellername = $sellerresults['fullname'];
	        $selleremail = $sellerresults['email'];
	        
	        $buyername = $buyerresults['fullname'];
	        $buyeremail = $buyerresults['email'];
	        
	        $title = $bookresults['title'];
	        
   
	         
	        //create subject and e-mail message
	        $seller_subject = 'Crimson Bookstore | You have a Buyer!';
	        $seller_message = 'Dear, '.$sellername.'! 
            A person by the name of '.$buyername.' has requested to purchase your copy of '. $title .'
            
            The e-mail of this buyer is disclosed below and it is your responsibility to get in contact with them as soon as possible:
            
            ------------------------------------------------
            '.$buyeremail.'
            ------------------------------------------------

            We hope that your transaction goes well. 
            Thank you for using the Crimson Bookstore! 
            '; 
            
            //create subject and e-mail message
	        $buyer_subject = 'Crimson Bookstore | You have a Buyer!';
	        $buyer_message = 'Dear, '.$buyername.'! 
            Congratulations!
            You have just placed an order for a copy of '. $title .'
            
            Although it is the seller\'s responsibility to contact you, the e-mail of this seller is disclosed below 
            If you are not contacted within 24 hours, feel free to contact the seller yourself at this address:
            
            ------------------------------------------------
            '.$selleremail.'
            ------------------------------------------------

            We hope that your transaction goes well. 
            Thank you for using the Crimson Bookstore! 
            ';

//-------Seller
	        
            //now send the email 
            require("../../class.phpmailer.php");

            // instantiate mailer
            $mail = new PHPMailer();

            // use SMTP
            $mail->IsSMTP();
            $mail->Host = "smtp.fas.harvard.edu";

            // set From:
            $mail->SetFrom("trader_bot@crimsonbookstore.com");

            // set To:
            $mail->AddAddress("" . $selleremail);

            // set Subject:
            $mail->Subject = "" . $seller_subject;

            // set body
            $mail->Body = "" . $seller_message;

            // send mail
            if ($mail->Send() == false)
            {
              die($mail->ErrInfo);
            }
            
//--------Buyer

            //now send the email 
            require("../../class.phpmailer.php");

            // instantiate mailer
            $mail = new PHPMailer();

            // use SMTP
            $mail->IsSMTP();
            $mail->Host = "smtp.fas.harvard.edu";

            // set From:
            $mail->SetFrom("trader_bot@crimsonbookstore.com");

            // set To:
            $mail->AddAddress("" . $buyeremail);

            // set Subject:
            $mail->Subject = "" . $buyer_subject;

            // set body
            $mail->Body = "" . $buyer_message;

            // send mail
            if ($mail->Send() == false)
            {
              die($mail->ErrInfo);
            }
}
?>
