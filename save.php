<?php
require 'database.inc.php';

$empid=$_POST['empid'];
$username=$_POST['username'];
$email=$_POST['emailid'];
$mobile=$_POST['mobile'];
$DOB=$_POST['DOB'];
if(isset($_POST['username'])&&!empty($_POST['username'])&&isset($_POST['emailid'])&&!empty($_POST['emailid'])&&isset($_POST['mobile'])&&!empty($_POST['mobile'])&&isset($_POST['DOB'])&&!empty($_POST['DOB'])){
  $query="UPDATE `users` SET `username`='$username',`emailid`='$email',`Mobile`='$mobile',`Date_of_Birth`='$DOB' WHERE `EmpID`='$empid'";
  mysql_query($query);
  header("location:index.php?username=$username");
}else {
  echo'script type="text/javascript">    alert("Can\'t Save your Profile");  </script>';
  header("location:edit.php?username=$username");
}
?>
