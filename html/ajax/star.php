<?php
    if(isset($_POST['listid']) && !empty($_POST['listid'])) {

        require '../db/connect.php';
        
        $list_id = $_POST['listid'];
        $user_id = $_POST['sid'];
        
        if ($_POST['is_starred'] == 1)
        {
            $query = mysql_query("INSERT INTO user_starred (listing_id, user_id) VALUES ('" . $list_id . "', '" . $user_id . "')") or die(mysql_error());
        }
        else
        {
            $query = mysql_query("DELETE FROM user_starred WHERE listing_id = '" . $list_id . "' AND user_id = '" . $user_id . "'") or die(mysql_error());
        }
    } ?>
