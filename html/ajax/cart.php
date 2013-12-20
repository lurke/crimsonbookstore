<?php
    if(isset($_POST['listid']) && !empty($_POST['listid'])) {

        require '../db/connect.php';
        
        $list_id = $_POST['listid'];
        $user_id = $_SESSION["id"];        
        
        if ($_POST['is_carted'] == 1)
        {
            $query = mysql_query("INSERT INTO user_cart (listing_id, user_id) VALUES ('" . $list_id . "', '" . $user_id . "')") or die(mysql_error());
        }
        else
        {
            $query = mysql_query("DELETE FROM user_cart WHERE listing_id = '" . $list_id . "' AND user_id = '" . $user_id . "'") or die(mysql_error());
        }
        
        $cartquery = mysql_query("SELECT * FROM user_cart WHERE (`listing_id` = " . $list_id . ")");
        $users = 0;
        while($cartresults = mysql_fetch_array($cartquery))
        {
            $users++;
        }
        echo($users);
    }
