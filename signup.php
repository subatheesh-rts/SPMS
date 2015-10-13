<?php
  require 'database.inc.php';
  $error="";
  $match="";
  if (isset($_POST['username'])&&isset($_POST['emailid'])&&isset($_POST['password'])&&isset($_POST['confirm_password'])&&isset($_POST['mobile'])) {
    if(!empty($_POST['username'])&&!empty($_POST['emailid'])&&!empty($_POST['password'])&&!empty($_POST['confirm_password'])&&!empty($_POST['mobile'])){
      $username=$_POST['username'];
      $emailid=$_POST['emailid'];
      $password=$_POST['password'];
      $confirm_password=$_POST['confirm_password'];
      $mobile=$_POST['mobile'];
      $date=date("Y-m-d");
      $empid=$_POST['empid'];

      $dob=$_POST['year'].'-'.$_POST['month'].'-'.$_POST['date'];
      $mobile=$_POST['mobile'];
      $query = "SELECT * FROM `emp_salary` WHERE `EmpID`='$empid'";
      if ($query_run=mysql_query($query)) {
        if(@mysql_num_rows($query_run)==NULL){
            echo"Not a valid employee Id";
          }
      else if ($password==$confirm_password) {
        $query_row=mysql_fetch_assoc($query_run);
        $salary=$query_row['salary'];
        $password=md5($password);
        $query="INSERT INTO `users` VALUES  ('$empid','$username','$emailid','$password','$salary','$date','$dob','$mobile','Employee');";
        if(@mysql_query($query)){
          header("location:login.php");
        }else{
          $error.="Something went Wrong";
        }

      }
      else {
        $match.="Password doesnot match";
      }
    }}
  }


 ?>
 <!DOCTYPE html>
<html>
<head>
  <title>Sign Up Page</title>
  <style>
    *{margin: 0; padding: 0;}
    .outerdiv{
      background: url("bg.jpg");
      width: 100vw;
      height:100vh;
    }
    .innerdiv{
      color: #fff;
      background: #aaa;
      text-align: center;
      margin:0px auto;
      width:32%;
      padding-bottom: 50px;
      font-size: 20px;
    }
    input{
      width:360px;
      font-size: 24px;
      padding: 3px 5px;
    }
    select{
      font-size: 24px;
      margin: 0 6px;
      padding: 3px 25px;
    }
    h1{
      padding: 20px 0px;
      font-size: 50px;
    }
    #submit{
      background: #cd2929;
      border: 2px solid #cd2a2a;
      color: #fff;
      /*box-shadow: 2px 2px 2px #cd2929;*/
    }
  </style>
  <script type="text/javascript" src="signup.js"></script>
</head>
<body ><div class="outerdiv"><div class="innerdiv">
  <h1>SIGN UP</h1>
  <form action="signup.php" method='POST'>
  <!-- <fieldset><legend>Sign Up</legend> -->
  <input type="text" name="username" placeholder="User Name" id="username" onkeyup="process()" /><span id="user"></span><br /><br />
  <input type="email" name="emailid" placeholder="E-mail ID" id="emailid" onkeyup="process()"/><span id="email"></span><br /><br />
  <input type="text" name="empid" placeholder="Employee ID" id="empid" onkeyup="process()" /><span id="emp"></span><br /><br />
  <input type="password" name="password" placeholder="Password" id="password"/><br /><br />
  <input type="password" name="confirm_password" placeholder="Confirm Password" id="confirm_password"/><br />
  <div><?php echo $match; ?></div><br />
  Date of Birth:<br />
  <select id="date" name="date">
    <?php
      for($i=1;$i<=31;$i++){?>
        <option><?php echo $i ?></option>
        <?php } ?>
  </select>
  <select id="month"  name="month">
    <?php
      for($i=1;$i<=12;$i++){?>
        <option><?php echo $i ?></option>
        <?php } ?>
  </select>
  <select id="year" name="year">
    <?php
      $dat=date(Y);
      for($i=$dat;$i>=1965;$i--){?>
        <option><?php echo $i ?></option>
        <?php } ?>
  </select><br /><br />
  <input type="text" maxlenth=10 name="mobile" placeholder="Mobile Number" id="mobile"/><br /><br />
<input id="submit" type="submit" value="signup"/>
<!-- </fieldset> -->
</form></div>
</div>
<div id="error"><?php echo $error; ?></div>
</body>
</html>
