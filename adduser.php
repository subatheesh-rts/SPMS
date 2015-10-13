<?php
  require 'database.inc.php';
    if (isset($_GET['empid'])&&(!empty($_GET['empid']))&&isset($_GET['salary'])&&(!empty($_GET['salary']))) {
      $empid=$_GET['empid'];
      $salary=$_GET['salary'];
      $query="SELECT `EmpID` FROM `emp_salary` WHERE `EmpID`='$empid'";
      $query_run=mysql_query($query);
      if (mysql_num_rows($query_run)==0) {
        $query="INSERT INTO `emp_salary` VALUES ('$empid','$salary')";
        mysql_query($query);
        echo "<script>alert('Employee Id added')</script>";
      }else{
        echo "<script>alert('Employee ID already exists.Can\'t add user')</script>";
      }
      // header("Location:admin.php?username=admin");
    }

 ?>
<!DOCTYPE html>
<html>
<head>
  <title> Add User </title>
  <style>
    *{margin:0;padding:0 ;}
    .body{
      margin:0 auto;
      textalign:center;
      width:100vw;
      background: url("bg.png");
      height:100vh;
    }
    .outerdiv{
      width:80%;
      margin:0 auto;
      height:100%;
    }
    a{
      text-decoration: none;
      color: #fff;
      background: #cd2929;
      font-size: 32px;
      /*background: #6600CC;*/
      padding: 6px;
    }
    .innerdiv{
      width:50%;
      height:50%;
      position: relative;
      top:10%;
      background: #c371d4 ;
      line-height: 30px;
      text-align: center;
      font-size :28px !important;
      border:5px  #8d26a3;
      border-style:groove;

      margin:0 auto;
    }
    .form{
      padding: 20px;
      padding-top: 60px;
    }
    .form input{
      font-size: 24px;
      padding: 5px;
    }
    p{text-align: center;
      position: relative;

      color: #702780;
      font-variant: small-caps;
      font-size:50px;
      padding-top: 10px;
      font-weight: bold;
    }
  </style>
</head>
<body><div class="body"><div class="outerdiv">

  <a href="admin.php?username=admin">Go To Admin Page</a>
  <p>Add New User</p>

<div class="innerdiv">
<form class="form" action="adduser.php" method="get">
  <input type="text" placeholder="Enter EmpID" name="empid" /><br/><br/>
  <input type="number" placeholder="Enter salary" name="salary" /><br/><br/>
  <input type="submit"  value="Add User" />
</form></div></div>
</div>
</body>
</html>
