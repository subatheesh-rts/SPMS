<?php
require "database.inc.php";
$i=1;
$username=$_POST['username'];
$query="SELECT * FROM `users`WHERE `privelages`='Employee'";
if($query_run=@mysql_query($query)){
  $count=mysql_num_rows($query_run);
  while($query_row=mysql_fetch_assoc($query_run)){
    $salaryid="inc".$i;
    $empid=$query_row['EmpID'];
    $salaryinc=$_POST[$salaryid];
    $salary= $query_row['Salary'];
    $salary+=$salaryinc;
    $query1="UPDATE `users` SET `Salary`='$salary' where `EmpID`='$empid'";
    mysql_query($query1);
    $i+=1;
  }
}
header("location:admin.php?username=$username");

?>
