<?php
    if(isset($_POST['booksearch']) && !empty($_POST['booksearch'])) {

        require '../db/connect.php';
        $query = mysql_query("
            SELECT * FROM books
            WHERE (`author` LIKE '%".mysql_real_escape_string(trim($_POST['booksearch']))."%')
            OR (`title` LIKE '%".mysql_real_escape_string(trim($_POST['booksearch']))."%') 
            OR (`isbn-10` LIKE '%".mysql_real_escape_string(trim($_POST['booksearch']))."%') 
            OR (`isbn-13` LIKE '%".mysql_real_escape_string(trim($_POST['booksearch']))."%')") or die(mysql_error());
        
        if (mysql_num_rows($query) !== 0)
        {                
            echo('<tbody>');
                while($results = mysql_fetch_array($query))
                {
                    $author = $results['author'];
                    $title = $results['title'];
                    $isbn = $results['ISBN-10'];
                    echo("<tr>");
                    echo("<td style=\"text-align:center;\">LOL</td>");                    
                    echo("<td style=\"text-align:center;\"><h5>" . $author . "</h5></td>");
                    echo("<td style=\"text-align:center;\"><h5>" . $title . "</h5></a></td>");
                    echo("<td style=\"text-align:center;\"><h5>" . $isbn . "</h5></a></td>");
                    echo("</tr>");

                }
            echo("</tbody></table></div>");
        }
        
        else
        {        
            echo ('<h3>Book not found</h3></table></div>');
        }
    }
