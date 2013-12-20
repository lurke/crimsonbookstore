<?php
 
// if the 'term' variable is not sent with the request, exit
if ( !isset($_REQUEST['term']) )
	exit;
 
        require '../db/connect.php';
 
// query the database table for zip codes that match 'term'
        $query = mysql_query("
            SELECT * FROM books
            WHERE (`author` LIKE '%".mysql_real_escape_string(trim($_POST['booksearch']))."%')
            OR (`title` LIKE '%".mysql_real_escape_string(trim($_POST['booksearch']))."%') 
            OR (`isbn-10` LIKE '%".mysql_real_escape_string(trim($_POST['booksearch']))."%') 
            OR (`isbn-13` LIKE '%".mysql_real_escape_string(trim($_POST['booksearch']))."%')") or die(mysql_error());
 
// loop through each zipcode returned and format the response for jQuery
$data = array();
if ( $query && mysql_num_rows($query) )
{
	while( $row = mysql_fetch_array($query, MYSQL_ASSOC) )
	{
		$data[] = array(
			'label' => $row['title'] .', '. $row['author'] ,
			'value' => $row['id']
		);
	}
}
 
// jQuery wants JSON data
echo json_encode($data);
flush();
