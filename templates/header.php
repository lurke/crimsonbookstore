<!DOCTYPE html>

<html>

    <head>

        <link href="css/bootstrap.css" rel="stylesheet"/>
        <link href="css/bootstrap-responsive.css" rel="stylesheet"/>
        <link href="css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>Harvard Bookstore: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Harvard Bookstore</title>
        <?php endif ?>

        <script src="js/jquery-1.8.2.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/buy_formjs.js"></script>
        <script src="js/sell_formjs.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

    </head>

    <body> 
        <div class="navbar">
            <div class="navbar-inner">
                <a class="brand" href="sell.php"><img src="https://twimg0-a.akamaihd.net/profile_images/1163303038/Shield_RGB_Twitter.png" style="height:25px;width:25px;">Crimson Bookstore</a>
                <div class="nav-collapse"></div>
                <ul class="nav pull-right">
                    <li class="divider-vertical"></li>
                    <li class="dropdown">
                    <?php 
                        require '../html/db/connect.php';
                        require_once '../includes/constants.php';

                        $query = mysql_query("SELECT * FROM users WHERE (`id` =" . $_SESSION["id"] . ")");
                        $results = mysql_fetch_array($query);
                        echo('<a class="dropdown-toggle " href="#" data-toggle="dropdown"> <i class="icon-user icon-white"></i>' . $results['fullname'] . '<strong class="caret"></strong></a>');
                    ?>
                        <ul class="dropdown-menu">
                        <?php
                            echo("<li><a class='lin' href='reportbug.php'>Report a Bug</a><a class='lin' href='feedback.php'>Feedback</a><a class='logout lin' href='logout.php'>Log Out</a></li>");
                        ?>
                        </ul>
                    </li>
                </ul>
                <ul class="nav pull-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle " href="#" data-toggle="dropdown"> <i class="icon-shopping-cart icon-white"></i>&nbsp;Cart<strong class="caret"></strong></a>
                        <ul class="dropdown-menu">
                        <?php
                            require '../html/db/connect.php';
                            require_once '../includes/constants.php';

                            $query = query("SELECT * FROM user_cart WHERE user_id =?", $_SESSION["id"]);
                            if (!empty($query))
                            {          
                                foreach($query as $row)
                                {
                                    $query2 = query("SELECT * FROM listings WHERE id=?", $row['listing_id']);
                                    if(!empty($query2)) {
                                        $bookid = $query2['book_id'];
                                        $query3 = query("SELECT * FROM books WHERE id=?", $bookid);
                                        if(!empty($query3))
                                            echo('<li>' . $query3['title'] . '</li>');
                                    }
                                }
                            }
                            else
                                echo("<h5>Nothing added to cart!</h5>");
                        ?>
                        </ul>
                    </li>
                </ul>
                <ul class="nav pull-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle " href="#" data-toggle="dropdown"> <i class="icon-star icon-white"></i>&nbsp;Starred<strong class="caret"></strong></a>
                        <ul class="dropdown-menu" >
                        <?php
                            require '../html/db/connect.php';
                            require_once '../includes/constants.php';

                            $query1 = query("SELECT * FROM user_starred WHERE user_id =?", $_SESSION["id"]);
                            if (!empty($query1))
                            {                     
                                foreach($query1 as $row)
                                {
                                    $query2 = query("SELECT * FROM listings WHERE id =?", $row['listing_id']);
                                    if(!empty($query2)) {
                                        $bookid = $query2['book_id'];
                                        $query3 = query("SELECT * FROM books WHERE id =?", $bookid);
                                        if (!empty($query3))
                                            echo('<li>' . $query3['title'] . '</li>');
                                    }
                                }
                            }
                            else
                                echo("<h5>Nothing Starred!</h5>");
                        ?>
                        </ul>
                    </li>
                </ul>
                <ul class="nav pull-right" >
                    <li class="divider-vertical"></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle " href="#" data-toggle="dropdown"> <i class="icon-list icon-white"></i>&nbsp;My Listings<strong class="caret"></strong></a>
                        <ul class="dropdown-menu" >
                        <?php
                            require '../html/db/connect.php';
                            require_once '../includes/constants.php';

                            $rows = query("SELECT * FROM listings WHERE user_id = ?", $_SESSION["id"]);
                            if (!empty($rows))
                            {                     
                                foreach($rows as $row)
                                {
                                    $query2 = query("SELECT * FROM books WHERE id = ?", $row['book_id']);
                                    if(!empty($query2))
                                        echo('<li>' . $query2[0]['title'] . '</li>');
                                }
                            }
                            else
                                echo("<h4>No Listings!</h4>");

                        ?>
                        </ul>
                    </li>  
                </ul>
            </div>
        </div>

        <div id="mainpage">
                <div id="centercontent">             
