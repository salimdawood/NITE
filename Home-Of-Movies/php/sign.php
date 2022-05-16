<?php
require('db.php');
//authorization
if(!isset($_SESSION))
  {
    session_start();
  }
  $_SESSION['signed'] = 'false';
if(isset($_POST['submit']))
{
  $fullname=$_POST['fullname'];
  $password=$_POST['password'];
  $email=$_POST['email'];
  $favoritemovie=$_POST['favoritemovie'];

  $addquery="INSERT INTO User set
  Uname='$fullname',
  email='$email',
  password='$password',
  favorite='$favoritemovie'
  ";

  $res = mysqli_query($conn,$addquery);

  if($res==true)
  {
    header("location:http://localhost/phpsandbox/Home-Of-Movies/php/index.php");
  }

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Imperial+Script&family=Roboto:wght@100&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/index.css">
  <title>NITE-Signup</title>
</head>
<body>
  <div class="main-container">
  <div class="container">
    <div class="form-container">
      <div class="form-box">
          <span>Signup Form</span>
          <form action="" method="POST">
            <div class="form-input">
              <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
              </svg>
              <input type="text" name="fullname" placeholder="Full Name" required>
            </div>
            <div class="form-input">
              <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><g fill="none"><path d="M0 0h24v24H0V0z"/><path d="M0 0h24v24H0V0z" opacity=".87"/></g><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/>
              </svg>
              <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-input">
              <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5-8-5h16zm0 12H4V8l8 5 8-5v10z"/>
              </svg>
              <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-input">
              <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16.5 3c-1.74 0-3.41.81-4.5 2.09C10.91 3.81 9.24 3 7.5 3 4.42 3 2 5.42 2 8.5c0 3.78 3.4 6.86 8.55 11.54L12 21.35l1.45-1.32C18.6 15.36 22 12.28 22 8.5 22 5.42 19.58 3 16.5 3zm-4.4 15.55l-.1.1-.1-.1C7.14 14.24 4 11.39 4 8.5 4 6.5 5.5 5 7.5 5c1.54 0 3.04.99 3.57 2.36h1.87C13.46 5.99 14.96 5 16.5 5c2 0 3.5 1.5 3.5 3.5 0 2.89-3.14 5.74-7.9 10.05z"/>
              </svg>
              <input type="text" name="favoritemovie" placeholder="Favortie movie" required>
            </div>
            <input type="submit" name="submit" value="Signup" />
            <p>Already have account?<span><a href="index.php"> Login now</a></span></p>
          </form>
        </div>
    </div>
  </div>
  </div>
</body>
</html>