<?php
require 'database.inc.php';
$name=$_GET['username'];
setcookie('username',$name,time()-8640000);
if($name=="signout"){
  $username=$name;
  setcookie('username',$username,time()-8640000);
  header("location:login.php");
}
if(isset($_GET['username'])){
  $query="SELECT * from `users` WHERE `username`='$name' OR `emailid`='$name'";
  if($query_run=mysql_query($query)){
    if(@mysql_num_rows($query_run)==NULL){
      die("NO results found");}else{
    $query_row=mysql_fetch_assoc($query_run);
    $empid=$query_row['EmpID'];
    $salary=$query_row['Salary'];
    $username=$query_row['username'];
    $mobile=$query_row['Mobile'];
    $email=$query_row['emailid'];
    $DOJ=$query_row['dateofjoin'];
    $DOB=$query_row['Date_of_Birth'];
    $mobile=$query_row['Mobile'];
    $privilage=$query_row['privelages'];}
  }
}else{
  die("ERROR occured on navigation to HOME PAGE,..............");
}



 ?>
<!doctype html>
<html>
<head>
<title>Home Page</title>
<style>
  *{margin:0; padding:0;}
  .outerdiv{
    width:100vw;
    height:100vh;
    background: url("bg1.jpg");
    background-size: cover;
  }
  #sign{font-size: 24px;
  text-decoration: none;
  padding:5px 20px;
  font-variant: small-caps;
  background: #cd2929;
  position: relative;
  left:1000px;
  color: #fff;
}
  h1{
    width:40%;
    padding: 10px 5px;
    font-size: 40px;
    background: #555;
    color: #fff;
    font-variant: small-caps;
    text-align: center;
    margin: 0 auto;
  }
  #edit{
    text-decoration: none;
    font-size: 24px;
    padding: 5px 20px;
    position: relative;
    top: 10px;
    left: 25px;
    color: #fff;
    background: #cd2929;
    text-align: center;
  }
  .innerdiv{
    background: #aaa;
    margin:0 auto;
    width:40%;
    padding: 20px 5px;
    font-size: 24px;
  }
  td:first-child{
    text-align: right;
    width:230px;
  }
  td{padding: 10px 20px;}
</style>
</head>
<body>
  <div class="outerdiv">
    <h1>Software Personnel Information</h1>
<a id="sign" href="index.php?username=signout">Signout</a>
<div class="innerdiv">
<table>
  <tr><td colspan="6">Username</td>
    <td colspan="6"><?php echo "$username" ?></td></tr>
  <tr><td colspan="6">Email-ID</td>
    <td colspan="6"><?php echo"$email" ?></td></tr>
  <tr><td colspan="6">Employee ID</td>
    <td colspan="6"><?php echo"$empid" ?></td></tr>
  <tr><td colspan="6">Mobile No.</td>
    <td colspan="6"><?php echo "$mobile"?></td></tr>
  <tr><td colspan="6">Date Of Join</td>
    <td colspan="6"><?php echo"$DOJ" ?></td></tr>
  <tr><td colspan="6">Salary</td>
    <td colspan="6"><?php echo"$salary" ?></td></tr>
  <tr><td colspan="6">Date Of Birth</td>
    <td colspan="6"><?php echo"$DOB" ?></td></tr>
  <tr><td colspan="6">Privilages</td>
    <td colspan="6"><?php echo"$privilage" ?></td></tr>
  <tr><td colspan="12" style="text-align:center;"><a id="edit" href="edit.php?username=<?php echo"$username"?>">EDIT MY PROFILE</a></td>
</table></div>
</div>
</body>
