<?php

  require('db.php');
  if(isset($_GET['genre']))
  {
    $genre = $_GET['genre'];
  }
  if($genre == 'all')
  {
    $sqlselect='SELECT * FROM movie';
  }
  else
  {
    $sqlgenre1 = "SELECT * FROM genre WHERE Genre='$genre'";
    $resgenre1 = mysqli_query($conn,$sqlgenre1);
    if($resgenre1->num_rows>0)
    {
      $movie_genreid =  $resgenre1->fetch_assoc()['Gid'];
    }
    else
    {
      $movie_genreid = 'null';
    }
    $sqlselect="SELECT * FROM movie WHERE Genreid='$movie_genreid'";
  }
  $res = mysqli_query($conn,$sqlselect);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Imperial+Script&family=Roboto:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/index.css">
  <title>NITE-movies</title>
</head>
<body>
  <?php include('nav.php') ?>
  <div class="movies">
    <?php
      if ($res->num_rows > 0) {
        while($row = $res->fetch_assoc()) {
          $movie_img = $row['Image'];
          $movie_title = $row['Title'];
          $movie_desc = $row['Description']; //'One shot movie,one man alive,baby drive let\'s go';
          $movie_year = $row['Year'];
          $movie_rating = $row['Ratings'];
          $gid = $row['Genreid'];
          $sqlgenre = "SELECT * FROM genre WHERE Gid='$gid'";
          $resgenre = mysqli_query($conn,$sqlgenre);
          $movie_genre =  $resgenre->fetch_assoc()['Genre'];

    ?>
    <div class="movie" style="background-image: url('../images/<?php echo $movie_img ?>');">
      <div class="movie-des">
        <div class="movie-header">
          <h1><?php echo $movie_title ?></h1>
          <p><?php echo $movie_year ?></p>
        </div>
        <div class="movie-content">
          <h5><?php echo $movie_genre ?></h5>
          <p><?php echo $movie_desc ?></p>
        </div>
        <div class="movie-rating">
          <p><?php echo $movie_rating ?> / 10</p>
        </div>
      </div>
    </div>

    <?php }
      } else {
        echo "0 results";
      }
    ?>
    <a href="add.php?add=movie">
      <div class="movie">
        <h1>+</h1>
      </div>
    </a>
  </div>
  <?php include('footer.php') ?>  
</body>
</html>