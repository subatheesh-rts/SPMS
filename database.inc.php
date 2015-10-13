<?php
  $mysql_host="localhost";
  $mysql_name="root";
  $mysql_password="";
  $mysql_db="users";
  if(!mysql_connect($mysql_host,$mysql_name,$mysql_password)){
    die("Couldn't Connect to Localhost");
  }
  if (!mysql_select_db($mysql_db)) {
    die("Couldn't Connect to Database");
  }

?>
