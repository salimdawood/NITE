<?php
  require('db.php');

  if(isset($_POST['submit']))
  {
    $fullname=$_POST['fullname'];
    $password=$_POST['password'];

    $selectquery="SELECT * FROM User WHERE
    Uname='$fullname'AND
    password='$password'
    ";

    $res = mysqli_query($conn,$selectquery);

  
    if($res->num_rows > 0)
    {
      $_SESSION['signed'] = 'true';
      header("location:http://localhost/phpsandbox/Home-Of-Movies/php/dashboard.php");
    }
  }
?>
<div class="form-container">
        <div class="form-box">
          <span>Login Form</span>
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
            <input type="submit" name="submit" value="Login" />
            <p>Not a member?<span><a href="sign.php"> Signup now</a></span></p>
          </form>
        </div>
</div>