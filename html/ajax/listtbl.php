<?php

    if(isset($_POST['bookid']) && !empty($_POST['bookid'])) {

        require '../db/connect.php';
        $query = mysql_query("SELECT * FROM listings WHERE (`book_id` = " . $_POST['bookid'] . ") ORDER BY price");            

        echo('<tr><td colspan = 4 id = listbook_' . $_POST['bookid'] . '><table id = "listings" style="color:#000000; padding:15px;">');
        if (mysql_num_rows($query) !== 0)
        {               
                while($results = mysql_fetch_array($query))
                {
                    $userquery = mysql_query("SELECT * FROM users WHERE (`id` = " . $results['user_id'] . ")");
                    $userresults = mysql_fetch_array($userquery);
                    
                    $starquery = mysql_query("SELECT * FROM user_starred WHERE (`listing_id` = " . $results['id'] . ")");
                    
                    $starred = False;
                    while($starresults = mysql_fetch_array($starquery))
                    {
                        if ((int)$_POST['sid'] == (int)$starresults['user_id'])
                        {
                            $starred = True;
                        }
                    }
                    
                    $cartquery = mysql_query("SELECT * FROM user_cart WHERE (`listing_id` = " . $results['id'] . ")");
                    $carted =false;
                    $users = 0;
                    while($cartresults = mysql_fetch_array($cartquery))
                    {
                        $users++;
                        if ((int)$_POST['sid'] == (int)$cartresults['user_id'])
                        {
                            $carted = true;
                        }
                    }
                    
                    $id = $results['id'];
                    $price = $results['price'];
                    if ($results['book_condition'] === 'exceeds')
                    {
                        $cond = 'Exceeds Expectations';
                    }
                    else
                        $cond = $results['book_condition'];
                    $desc = $results['comments'];
                    $fullname = $userresults['fullname'];

                    echo("<tr id =list_" . $id . " class='hoverstate'>");
                    if($users == 0)
                    {                  
                        echo("<td class = 'listhilite green' id = boom_". $id . " style=\"text-align:center;\"><h3>$" . $price . "</h3></td>");                        
                        echo("<td class = 'listhilite green' id = boom_". $id . " style=\"text-align:center;\"><h5>" . $cond . "</h5></td>");
                        echo("<td class = 'listhilite green ellipsis' id = boom_". $id . " style=\"text-align:center;\"><h5>" . $desc . "</h5></td>");
                        echo("<td class = 'listhilite green' id = boom_". $id . " style=\"text-align:center;\"><h5>Sold by: " . $fullname . "</h5></td>");

                        if ($starred == false)
                            echo("<td class = 'listhilite green' id = star_" . $id . "><h5><a style = 'text decoration: none' rel='tooltip' data-original-title='Star this item to add it to your wishlist'><i class=\"icon-star\"></i></a> Star It!</h5></td>");
                        if ($starred == true)
                            echo("<td class = 'listhilite green' id = star_" . $id . "><h5><i class=\"icon-star icon-white\"></i> Un-Star?</h5></td>");
                        if ($carted == false)    
                            echo("<td class = 'listhilite green' id = cart_" . $id . "><h5><a style = 'text decoration: none' rel='tooltip' data-original-title='Notify the seller that you plan to buy this book'><i class=\"icon-tag\"></i></a> Buy it!</h5></td>");
                        if ($carted == true)    
                            echo("<td class = 'listhilite green' id = cart_" . $id . "><h5><i class=\"icon-tag icon-white\"></i> Remove buy offer</h5></td>");
                        echo("<td class = 'listhilite green' id = user_". $id . " style=\"text-align:center;\"><h5><a style = 'text decoration: none' rel='tooltip' data-original-title='" . $users . " users have already asked to buy this book'><i class=\"icon-user icon-white\"></i></a>     " . $users . "</h5></td>");
                    }
                    if($users > 0 && $users < 5)
                    {
                 
                        echo("<td class = 'listhilite yellow' id = boom_". $id . " style=\"text-align:center;\"><h3>$" . $price . "</h3></td>");
                        echo("<td class = 'listhilite yellow' id = boom_". $id . " style=\"text-align:center;\"><h5>" . $cond . "</h5></td>");
                        echo("<td class = 'listhilite yellow ellipsis' id = boom_". $id . " style=\"text-align:center;\"><h5>" . $desc . "</h5></td>");
                        echo("<td class = 'listhilite yellow' id = boom_". $id . " style=\"text-align:center;\"><h5>Sold by: " . $fullname . "</h5></td>");

                        if ($starred == false)
                            echo("<td class = 'listhilite yellow' id = star_" . $id . "><h5><a style = 'text decoration: none' rel='tooltip' data-original-title='Star this item to add it to your wishlist'><i class=\"icon-star\"></i></a> Star It!</h5></td>");
                        if ($starred == true)
                            echo("<td class = 'listhilite yellow' id = star_" . $id . "><h5><i class=\"icon-star icon-white\"></i> Un-Star?</h5></td>");
                        if ($carted == false)    
                            echo("<td class = 'listhilite yellow' id = cart_" . $id . "><h5><a style = 'text decoration: none' rel='tooltip' data-original-title='Notify the seller that you plan to buy this book'><i class=\"icon-tag\"></i></a> Buy it!</h5></td>");
                        if ($carted == true)    
                            echo("<td class = 'listhilite yellow' id = cart_" . $id . "><h5><i class=\"icon-tag icon-white\"></i> Remove buy offer</h5></td>");
                        echo("<td class = 'listhilite yellow' id = user_" . $id . " style=\"text-align:center;\"><h5><a style = 'text decoration: none' rel='tooltip' data-original-title='" . $users . " users have already asked to buy this book'><i class=\"icon-user icon-white\"></i></a>     " . $users . "</h5></td>");
                    }
                    if($users == 5)
                    {
                  
                        echo("<td class = 'listhilite pending_red' id = boom_". $id . " style=\"text-align:center;\"><h3>$" . $price . "</h3></td>");
                        echo("<td class = 'listhilite pending_red' id = boom_". $id . " style=\"text-align:center;\"><h5>" . $cond . "</h5></td>");
                        echo("<td class = 'listhilite pending_red ellipsis' id = boom_". $id . " style=\"text-align:center;\"><h5>" . $desc . "</h5></td>");
                        echo("<td class = 'listhilite pending_red' id = boom_". $id . " style=\"text-align:center;\"><h5>Sold by: " . $fullname . "</h5></td>");

                        if ($starred == false)
                            echo("<td class = 'listhilite pending_red' id = star_" . $id . "><h5><a style = 'text decoration: none' rel='tooltip' data-original-title='Star this item to add it to your wishlist'><i class=\"icon-star\"></i></a> Star It!</h5></td>");
                        if ($starred == true)
                            echo("<td class = 'listhilite pending_red' id = star_" . $id . "><h5><i class=\"icon-star icon-white\"></i> Un-Star?</h5></td>");
                        if ($carted == false)    
                            echo("<td class = 'listhilite pending_red' id = cart_" . $id . "><h5><a style = 'text decoration: none' rel='tooltip' data-original-title='Notify the seller that you plan to buy this book'><i class=\"icon-tag\"></i></a> Buy it!</h5></td>");
                        if ($carted == true)    
                            echo("<td class = 'listhilite pending_red' id = cart_" . $id . "><h5><i class=\"icon-tag icon-white\"></i> Remove buy offer</h5></td>");
                        echo("<td class = 'listhilite pending_red' id = user_". $id . " style=\"text-align:center;\"><h5><a style = 'text decoration: none' rel='tooltip' data-original-title='" . $users . " users have already asked to buy this book'><i class=\"icon-user icon-white\"></i></a>     " . $users . "</h5></td>");
                    }
                    if($users > 6)
                    {             
                        echo("<td class = 'listhilite red' id = boom_". $id . " style=\"text-align:center;\"><h3>$" . $price . "</h3></td>");
                        echo("<td class = 'listhilite red' id = boom_". $id . " style=\"text-align:center;\"><h5>" . $cond . "</h5></td>");
                        echo("<td class = 'listhilite red ellipsis' id = boom_". $id . " style=\"text-align:center;\"><h5>" . $desc . "</h5></td>");
                        echo("<td class = 'listhilite red' id = boom_". $id . " style=\"text-align:center;\"><h5>Sold by: " . $fullname . "</h5></td>");

                        if ($starred == false)
                            echo("<td class = 'listhilite red' id = star_" . $id . "><h5><a style = 'text decoration: none' rel='tooltip' data-original-title='Star this item to add it to your wishlist'><i class=\"icon-star\"></i></a> Star It!</h5></td>");
                        if ($starred == true)
                            echo("<td class = 'listhilite red' id = star_" . $id . "><h5><i class=\"icon-star icon-white\"></i> Un-Star?</h5></td>");
                        if ($carted == false)    
                            echo("<td class = 'listhilite red' id = cart_" . $id . "><h5><a style = 'text decoration: none' rel='tooltip' data-original-title='Notify the seller that you plan to buy this book'><i class=\"icon-tag\"></i></a> Buy it!</h5></td>");
                        if ($carted == true)    
                            echo("<td class = 'listhilite red' id = cart_" . $id . "><h5><i class=\"icon-tag icon-white\"></i> Remove buy offer</h5></td>");
                        echo("<td class = 'listhilite red' id = user_". $id . " style=\"text-align:center;\"><h5><a style = 'text decoration: none' rel='tooltip' data-original-title='" . $users . " users have already asked to buy this book'><i class=\"icon-user icon-white\"></i></a>     " . $users . "</h5></td>");
                    }
                    echo("</tr>");
                }
        }
        
        else
        {        
            echo ('<h3>No Listings found!</h3>');
        }
        echo('</td></table></tr>');
    }
