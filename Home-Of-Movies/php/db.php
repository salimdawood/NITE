<?php

  $conn = mysqli_connect('localhost','root','') or die(mysqli_error($conn));
  $db = mysqli_select_db($conn,'Home-Of-Movies') or die(mysqli_error($conn));
  
  if(!isset($_SESSION))
  {
    session_start();
  }
?>