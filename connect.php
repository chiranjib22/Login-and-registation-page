<?php
  $HOSTNAME='localhost';
  $USERNAME='root';
  $PASSWORD='';
  $DATABASE='signupforms';

  $con = mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);
  $error = mysqli_error($con);
  if(!$con)
  {
    die($error);
  }
?>