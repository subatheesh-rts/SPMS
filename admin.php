<?php
require 'database.inc.php';
@$name=$_GET['username'];

$count=0;
if($name=="signout"){
  $username=$name;
  setcookie('username',$username,time()-8640000);
  header("location:login.php");
}
?>
<!doctype html>
<html>
<head>
<title>Admin Page</title>
<style>
*{margin:0; padding: 0;}
body{width:100vw;height:100vh;}
.outerdiv{
  width:100%;
  box-sizing: border-box;
  padding: 20px 190px;
  font-size: 24px ;
}
table{border :3px double #8d26a3;
  border-collapse: collapse;
}
input{
  font-size: 24px;
  padding: 2px;
}
.incr{
  width:180px;
}
h1{background:#8d26a3;height:80px;
  color:#fff;font-size: 50px;
  text-align: center;
  font-variant: small-caps;
  width:100vw;position: relative;
  right:190px;
  padding-top:20px}
a{text-decoration: none;position: relative;bottom:30px;left:1050px;color:#fff;font-variant: small-caps;}
th{border: 3px double #8d26a3;font-variant: small-caps;font-size: 32px;}
#submit,#submit1{width:300px;background: #cd2929;font-variant: small-caps;border:2px solid #cd2929;margin: 10px 100px;color:#fff;}
#submit1{position:relative;bottom: 65px; left:500px;}
td{border-top: 2px solid #8d26a3;}
td,th{padding: 5px 10px;border-left: 1px solid #8d26a3;border-right: 1px solid #8d26a3;}
</style>
</head>
<body><div class="outerdiv">
  <h1> Admin Panel </h1>
<a href="index.php?username=signout">Signout</a>
<form method="post" class="form" action="salary.php">
<table>
<tr><th>EmpID</th><th>Username</th><th>Email-ID</th><th>Mobile</th><th>Salary</th><th>Inc/Dec Salary</th></tr>
<?php  if(!isset($_GET['username'])){
   die("ERROR occured on navigation to HOME PAGE,..............");
      }
  else{
    $query="SELECT * from `users` WHERE `privelages`='Employee'";
      if($query_run=mysql_query($query)){
        if(@mysql_num_rows($query_run)==NULL){
          echo("NO results found");}else{$i=0;
    while($query_row=mysql_fetch_assoc($query_run)){
        $empid=$query_row['EmpID'];
        $i+=1;
        $count=mysql_num_rows($query_run);
        $salary=$query_row['Salary'];
        $username=$query_row['username'];
        $mobile=$query_row['Mobile'];
        $email=$query_row['emailid'];

?>
      <tr><td><?php echo "$empid" ?></td> <td><?php echo "$username" ?></td><td><?php echo "$email" ?></td><td><?php echo "$mobile"; ?></td><td><?php echo "$salary"; ?></td><td><input type="number" class="incr" name="<?php echo 'inc'.$i;  ?>" value="0"/></td></tr>
<?php }}}} ?>
<tr><td colspan="12"><input type="submit" id="submit" name="save" value="Save"/></td></tr>
</table>
<input type="hidden" name="username" value="<?php echo $name ?>" />
</form>
<form action="adduser.php" method=post><input id="submit1" type="submit" value="AddUser" /></form></div>
</body>
<head>
