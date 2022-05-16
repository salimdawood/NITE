<?php

  require('db.php');
  $sqlselect='SELECT * FROM genre';
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
  <title>NITE-categories</title>
</head>
<body>
  <?php include('nav.php') ?>
  <div class="categories">
    <?php
      if ($res->num_rows > 0) {
        while($row = $res->fetch_assoc()) {
          $genre_name = $row['Genre'];
          $genre_id = $row['Gid'];
          $sqlcount = "SELECT COUNT(Genreid) as count FROM movie WHERE Genreid='$genre_id'";
          $rescount = mysqli_query($conn,$sqlcount);
          $movies_count=$rescount->fetch_assoc()['count'];
    ?>
    <a href="movies.php?genre=<?php echo $genre_name; ?>">
      <div class="category">
        <h1><?php echo $genre_name ?></h1>
        <h3><?php echo $movies_count ?> Movies</h3>
      </div>
    </a>
    <?php }
      } else {
        echo "0 results";
      }
    ?>
    <a href="add.php?add=genre">
      <div class="category">
        <h1>+</h1>
      </div>
    </a>
  </div>
  <?php include('footer.php') ?>  
</body>
</html>