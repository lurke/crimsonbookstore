<?php
    //if(isset($_POST['booksearch']) && !empty($_POST['booksearch'])) {

        require '../db/connect.php';
        $query = mysql_query("
            SELECT * FROM books
            WHERE (`author` LIKE '%".mysql_real_escape_string(trim($_POST['booksearch']))."%')
            OR (`title` LIKE '%".mysql_real_escape_string(trim($_POST['booksearch']))."%') 
            OR (`isbn10` LIKE '%".mysql_real_escape_string(trim($_POST['booksearch']))."%') 
            OR (`isbn13` LIKE '%".mysql_real_escape_string(trim($_POST['booksearch']))."%')") or die(mysql_error());
        
        if (mysql_num_rows($query) !== 0)
        {                
            echo('<tbody>');
                while($results = mysql_fetch_array($query))
                {
                    $id = $results['id'];
                    $author = $results['author'];
                    $title = $results['title'];
                    $isbn = $results['isbn10'];
                    $picture = $results["picture"];
                    echo("<tr class = \"result hoverstate\" id = book_" . $id . ">");
                    echo("<td class = 'hilite img-polaroid' style=\"text-align:center;\"><img id=\"coverpreview\" src='" . $picture . "'></td>");                  
                    echo("<td class = 'hilite' style=\"text-align:center;\"><h5>" . $author . "</h5></td>");
                    echo("<td class = 'hilite' style=\"text-align:center;\"><h5>" . $title . "</h5></a></td>");
                    echo("<td class = 'hilite' style=\"text-align:center;\"><h5>" . $isbn . "</h5></a></td>");
                    echo("</tr>");
                }
                
            echo("</tbody></table></div>");
        }
        
        else
        {        
            echo ('</tbody><h3 style = "text-align:center" >Book not found</h3></table></div>');
        }
    //}
