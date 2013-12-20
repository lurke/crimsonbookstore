 <?php

  $host = "mysql.crimsonbookstore.com";
  $user = "sergurke";
  $pass = "Crimzon1516";

  $databaseName = "newcrimsonbookstore";
  $tableName = "variables";

  $con = mysql_connect($host,$user,$pass);
  $dbs = mysql_select_db($databaseName, $con);
