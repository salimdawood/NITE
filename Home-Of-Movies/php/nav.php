<?php
 require('db.php');
 //authorization
 if(isset($_SESSION['signed']))
 {
   if($_SESSION['signed']=='false')
   {
     header('location:http://localhost/phpsandbox/Home-Of-Movies/php/index.php');
   }
 }
?>
<div class="nav">
    <a href="dashboard.php"><span>NITE</span></a>
    <ul>
      <a href="dashboard.php"><li>Dashboard</li></a>
      <a href="categories.php"><li>Categories</li></a>
      <a href="movies.php?genre=all"><li>Movies</li></a>
    </ul>
  </div>