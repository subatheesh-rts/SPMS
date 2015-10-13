<?php
require 'database.inc.php';
@$name=$_GET['username'];
if($name=="signout"){
  $username=$name;
  setcookie('username',$username,time()-8640000);
  header("location:login.php");
}
if(@isset($_GET['username'])){
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
<title>Edit Profile</title>
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
input{
  font-size: 20px;
  padding: 5px 10px;
}

  h1{
    width:40%;
    padding: 20px 5px;
    font-size: 40px;
    background: #555;
    color: #fff;
    font-variant: small-caps;
    text-align: center;
    margin: 0 auto;
  }
  #submit{
    text-decoration: none;
    font-size: 24px;
    padding: 5px 20px;
    border: 2px solid #cd2a2a;
    margin-top: 20px;
    color: #fff;
    background: #cd2929;
    text-align: center;
  }
  .innerdiv{
    background: #aaa;
    margin:0 auto;
    width:40%;
    padding: 50px 5px;
    font-size: 24px;
    /*padding-bottom: 100px;*/
  }
  td:first-child{
    text-align: right;
    width:230px;
  }
  td{padding: 10px 20px;}
</style>
</head>
<body><div class="outerdiv">
  <h1>Edit My Profile</h1>
<a id="sign" href="edit.php?username=signout">Signout</a>
<div class="innerdiv">
<form method="post" action="save.php">
<table>
  <tr><td>Employee ID</td>
    <td><?php echo"$empid" ?></td></tr>
    <input type="hidden" value="<?php echo"$empid" ?>" name="empid"/>
  <tr><td>Username</td>
    <td><input type="text" name="username" value="<?php echo "$username" ?>" /></td></tr>
  <tr><td>Email-ID</td>
    <td><input type="text" name="emailid" value="<?php echo"$email" ?>"/></td></tr>
  <tr><td>Mobile No.</td>
    <td><input type="text" name="mobile" value="<?php echo"$mobile" ?>"/></td></tr>
  <tr><td>Date Of Birth</td>
    <td><input type="text" name="DOB" value="<?php echo"$DOB" ?>"/></td></tr>
  <tr><td colspan="12" style="text-align:center;"><input id="submit" type="submit" value="SAVE MY PROFILE" /></td>
</table>
</form></div></div>
</body>
<head>
