<?php

use function PHPSTORM_META\sql_injection_subst;

$login=0;
$invaild=0;

if($_SERVER['REQUEST_METHOD']=='POST')
{
  include 'connect.php';
  $username= $_POST['username'];
  $password= $_POST['password'];

  $sql = "SELECT * FROM registration where username='$username' and password='$password'";
  
  $result = mysqli_query($con, $sql);
  if($result)
  {
    $num = mysqli_num_rows($result);
    if($num>0)
    {
        //echo 'login successful';
        $login=1;
        session_start();
        $_SESSION['username']=$username;
        header('location:home.php');
    }
    else
    {
        //echo 'Wrong username or password';
        $invaild=1;
    }
  }
}

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Login</title>
  </head>


  <body>
  <?php
    if($invaild)
    {
      echo '
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error</strong> Wrong username and password.
      </div>';
    }
  ?>
  <?php
    if($login)
    {
      echo '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success</strong> You are successfully logged in.
      </div>';
    }
  ?>

    <h1 class="text-center">Log in to our website</h1>
    <div class="container mt-5">
    <form action="login.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"><b>User Name</b></label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter your username" name="username">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"><b>Password</b></label>
    <input type="password" class="form-control" placeholder="Enter your password" name="password">
  </div>
  <button type="login" class="btn btn-primary w-100">Log in</button>
</form>
    </div>
  </body>
</html>