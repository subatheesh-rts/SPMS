<?php
// setcookie('username','sonia',time()-8640000,"/");

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
if(isset($_COOKIE['username'])){
  $username=$_COOKIE['username'];
  if ($username=='admin') {
    header("location:admin.php?username=$username");
  }else{
  header("Location:index.php?username=$username");
  }
}else {

  $username="";
  $usrnme="";
  $pswd="";
  $comment="";
  require 'database.inc.php';
  // echo date('Y-m-d');
if (isset($_POST['username'])&&!empty($_POST['username']) && isset($_POST['password'])&&!empty($_POST['password'])) {
  $username=$_POST['username'];
  $password=md5($_POST['password']);
  $query = "SELECT `username`,`password` FROM `users` WHERE `username`='$username' OR `emailid`='$username'";
  if ($query_run=mysql_query($query)) {
    if(@mysql_num_rows($query_run)==NULL){
      $comment.= "Username not available";
      $username="";
    }else {
      $query_row = mysql_fetch_assoc($query_run);
      $pwd= $query_row['password'];
      if ($pwd==$password) {
        if (isset($_POST['checkbox'])) {
          setcookie('username',$username,time()+8640000,"/");
        }

        if ($username=='admin') {
          header("location:admin.php?username=$username");
        }else{
        header("location:index.php?username=$username");
        }
      }else {
        $comment.="Password doesn't Match";
      }
    }
  }else{
    echo mysql_error();
  }
}
if ((isset($_POST['username'])&&empty($_POST['username']))) {
  $usrnme.= "Please enter username";
}
if((isset($_POST['password'])&&empty($_POST['password']))) {
  $pswd.="Please enter Password";
}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login Page</title>
    <style>
    *{margin:0;padding: 0;   }
    body{
      width:100vw;
      height:100vh;
    }
    .outerdiv{
      text-align: center;
      width:100%;
      height:100%;
      background: url('css2.jpg');
      background-size: cover;
    }
    .innerdiv{
      width:340px;
      height:332px;
      position: relative;
      top: 80px;
      color: #fff;
      text-align: left;
      padding-left: 36px;
      font-size:18px;
      margin: 0 180px;
      box-sizing: border-box;
      border:4px double #3e0495;
    }
    h1{
      padding-top: 25px;
      width:70%;
      font-variant:small-caps;
      margin: 0 auto;
      font-size: 55px;
      color: #4b0791;
    }
    input{
      font-size: 20px;
      padding:5px 5px;
      margin-bottom: 5px;
      box-shadow: 2px 2px 5px #3e0495;
    }
    p{
      padding-top: 15px;
      padding-bottom: 15px;
      padding-left: 80px;
      font-size: 30px;
    }
    span{font-size: 16px;
      color: #cd2929;
    }
    #submit{
      background: #cd2929;
      color: #fff;
      border: 2px solid #cd2929;
      width:257px;
    }
    #check{
      padding-top: 5px;
    }
    a{
      font-size: 20px;
      /*text-decoration: none;*/
      color:#fff;
      position: relative;
      left:55px;
      text-align: center;
      line-height: 50px;
    }
    </style>
  </head>
  <body><div class="outerdiv">
    <h1> Software Personnel Management System</h1>
    <div class="innerdiv">
      <p>LOGIN</p>
    <form action="login.php" class="form" method="post">
      <!-- <fieldset> -->
        <div id="comment"><?php echo $comment.$username; ?></div>
        <input type="text" name="username" placeholder="Email or username" autocomplete="off" /><span id="username_match"><?php echo $usrnme ?></span><br /><br />
        <input type="password" name="password" placeholder="password" autocomplete="off" /><span id="password_match"/><?php echo $pswd; ?></span><br />
        <!-- <a href="forgetpassword.html"> Forget Password?</a><br/><br /> -->
        <input id="check" type="checkbox" name="checkbox" /> <label> Keep Me Logged In </label><br/ ><br>
        <input id="submit" type="submit" value="Login" />
      <!-- </fieldset> --><br>
      <a href="signup.php" > Not yet Registered? </a>
    </form></div></div>
  </body>
</html>
