<?php
    if(isset($_POST['booksearch']) || !empty($_POST['booksearch'])) {

        require '../db/connect.php';
        $filterquery = mysql_query("SELECT * FROM users WHERE ('id' = 1)") or die(mysql_error());
                         
        $classquery = mysql_query("
            SELECT * FROM classes
            WHERE (`field` LIKE '%".mysql_real_escape_string(trim($_POST['booksearch']))."%')
            OR (`number` LIKE '%".mysql_real_escape_string(trim($_POST['booksearch']))."%') 
            OR (`title` LIKE '%".mysql_real_escape_string(trim($_POST['booksearch']))."%')") or die(mysql_error());
        
        echo('<tbody>');
        if (mysql_num_rows($classquery) !== 0)
        {             
                while($results = mysql_fetch_array($classquery))
                {
                    $id = $results['course_id'];
#                    while($fresults = mysql_fetch_array($filterquery))
#                    {
#                        if ($id == $fresults['filter1'] ||  $id == $fresults['filter2'] || $id == $fresults['filter3'] 
#                            || $id == $fresults['filter4'] || $id == $fresults['filter5'] || $id == $fresults['filter6'])
#                        {
                            $field = $results['field'];
                            $number = $results['number'];
                            $title = $results['title'];
                            echo("<tr class = \"result hoverstate\" id = course_" . $id . ">");                  
                            echo("<td class = 'course' style=\"text-align:center;\"><h5>" . $field . " " . $number . "</h5></td>");
                            echo("<td class = 'course' style=\"text-align:center;\"><h5>" . $title . "</h5></a></td>");
                            echo("</tr>");
#                        }
#                    }
                }              
        }
        echo("</tbody></table></div>");
    }
