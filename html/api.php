<?php 

  //--------------------------------------------------------------------------
  // 1) Connect to mysql database
  //--------------------------------------------------------------------------
  include 'DB.php';
  $con = mysql_connect($host,$user,$pass);
  $dbs = mysql_select_db($databaseName, $con);
  
  //--------------------------------------------------------------------------
  // 2) Read in and save book search
  //--------------------------------------------------------------------------
    
    //store the numerical value of the GET variable
    $book = strval($input);
    
    // change characters used in html to their equivalents;
    $book = htmlspecialchars($book);

    // make sure nobody uses SQL injection
    $book = mysql_real_escape_string($book);
        
  //--------------------------------------------------------------------------
  // 3) Query database for data
  //--------------------------------------------------------------------------
  //query
  $result = mysql_query("SELECT * FROM books
        WHERE (`author` LIKE '%".$book."%') OR (`title` LIKE '%".$book."%') OR (`ISBN` LIKE '%".$book."%')") or die(mysql_error());
  $array = mysql_fetch_row($result);                          //fetch result    

  //--------------------------------------------------------------------------
  // 4) echo result as json 
  //--------------------------------------------------------------------------
  echo json_encode($array);

?>
