<?php
  require('db.php');
  //genre count
  $genre_count_sql = "SELECT COUNT(Gid) as genrecount FROM genre";
  $res_genre_count_sql  = mysqli_query($conn,$genre_count_sql );
  $genre_count =  $res_genre_count_sql->fetch_assoc()['genrecount'];

  //user count
  $user_count_sql = "SELECT COUNT(Uid) as usercount FROM user";
  $res_user_count_sql  = mysqli_query($conn,$user_count_sql );
  $user_count =  $res_user_count_sql->fetch_assoc()['usercount'];

  //movie count
  $movie_count_sql = "SELECT COUNT(Mid) as moviecount FROM movie";
  $res_movie_count_sql  = mysqli_query($conn,$movie_count_sql );
  $movie_count =  $res_movie_count_sql->fetch_assoc()['moviecount'];

  //most user's favorite movie
  $user_fav_sql = "SELECT favorite,COUNT(favorite) as userfav FROM user GROUP BY favorite ORDER BY userfav DESC LIMIT 1";
  $res_user_fav_sql  = mysqli_query($conn,$user_fav_sql );
  $user_fav =  $res_user_fav_sql->fetch_assoc()['favorite'];

  //top rated movie
  $movie_top_sql = "SELECT title as movietopname,MAX(Ratings) as movietop FROM movie";
  $res_movie_top_sql  = mysqli_query($conn,$movie_top_sql );
  $result_array = $res_movie_top_sql->fetch_assoc();
  $movie_top = $result_array['movietop'];
  $movie_top_name =  $result_array['movietopname'];

  
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
  <title>Dashboard</title>
</head>
<body>
  <?php include('nav.php') ?>
  <div class="dashboard">
    <div class="category">
      <h1>Genre</h1>
      <h3><?php echo $genre_count ?> Genres</h3>
    </div>
    <div class="category">
      <h1>User</h1>
      <h3><?php echo $user_count ?> Users</h3>
    </div>
    <div class="category">
      <h1>Movies</h1>
      <h3><?php echo $movie_count ?> Movies</h3>
    </div>
    <div class="category">
      <h1>User's Favorite</h1>
      <h3><?php echo $user_fav ?></h3>
    </div>
    <div class="category">
      <h1>Top rated</h1>
      <h2><?php echo $movie_top_name?></h2>
      <h3><?php echo $movie_top  ?></h3>
    </div>
  </div>
  <?php include('footer.php') ?>
</body>
</html>