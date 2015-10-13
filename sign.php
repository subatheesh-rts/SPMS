<?php
  require 'database.inc.php';
  $response="";
  $username=$_GET['username'];
  $emailid=$_GET['emailid'];
  $query="SELECT `username` FROM `users`";
  if(mysql_query($query)){
    while ($query_row=mysql_fetch_assoc($query_run)) {
      if($username==$query_row){
        $response.="Username not Available {{}}";
      }else {
        $response.="Username Available";
      }
    }
  }
  $query="SELECT `email` FROM `users`";
  if(mysql_query($query)){
    while($query_row=mysql_fetch_assoc($query_run)){
      if($emailid==$query_row){
        $response.="Email-ID already Exists";
      }
    }
  }
  echo $response;

 ?>
