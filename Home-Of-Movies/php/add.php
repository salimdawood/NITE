<?php 
  require('db.php');
  if(isset($_SESSION['signed']))
  {
    if($_SESSION['signed']=='false')
    {
      header('location:http://localhost/phpsandbox/Home-Of-Movies/php/index.php');
    }
  }
  //get
  if(!isset($_GET['add']) or ($_GET['add'] != 'movie' and  $_GET['add'] != 'genre'))
  {
    header('location:http://localhost/phpsandbox/Home-Of-Movies/php/index.php');
  }
  $type= $_GET['add'];
  $sqlselect = 'SELECT * FROM genre';
  $res = mysqli_query($conn,$sqlselect);

  //post categry
  if(isset($_POST['submitcategory']))
  {
    $new_genre = $_POST['category'];
    $sql = "INSERT INTO genre VALUES(NULL,'$new_genre')";
    $res = mysqli_query($conn,$sql);
    if($res==true)
    {
      header('location:http://localhost/phpsandbox/Home-Of-Movies/php/categories.php');
    }
  
  }

  //post movie
  if(isset($_POST['submitmovie']))
  {
    $new_title = $_POST['title'];
    $new_year = $_POST['year'];
    $new_rating = $_POST['rating'];
    $new_description = $_POST['description'];
    $new_genreid = $_POST['genreid'];
    //image handle
    $file = $_FILES['imagefile'];
    //image info
    $filename=$file['name'];
    $filetmploc=$file['tmp_name'];
    $filesize=$file['size'];
    $fileerror=$file['error'];
    $filetype=$file['type'];
    //image ext
    $filetmpext = explode('.',$filename);
    $fileext = strtolower(end($filetmpext));
    //allowed ext
    $allowed = array('jpg','png','jpeg');
    //image validation
    if(in_array($fileext,$allowed))
    {
      if($fileerror==0)
      {
        if($filesize < 4000000)
        {
          $imagename=uniqid('',true).".".$fileext;
          $imagedest='../images/'.$imagename;
          move_uploaded_file($filetmploc,$imagedest);
        }
        else
        { 
          echo 'Cann\'t upload your file is too big';
        }
      }
      else
      {
        echo "There was an error uploading your file.";
      }
    }
    else
    {
      echo "You must upload image of type jpg,jpeg,png.";
    }
    //sql handle
    $descclean=mysqli_real_escape_string($conn,$new_description);
    $titleclean=mysqli_real_escape_string($conn,$new_title);
    $sql = "INSERT INTO movie VALUES(NULL,'$titleclean',$new_genreid,'$descclean','$imagename',$new_rating,$new_year)";
    echo $sql;
    $res = mysqli_query($conn,$sql);
    if($res==true)
    {
      header('location:http://localhost/phpsandbox/Home-Of-Movies/php/movies.php?genre=all');
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
  <title>NITE-Add <?php echo $type ?></title>
</head>
<body>
  <div class="main-container">
  <div class="container">
    <div class="form-container">
      <div class="form-box-add">
        <span>Add <?php echo $type ?></span>
        <?php
          if($type=='genre')
          {
        ?>
          <form class="addcategory" method="POST">
            <input type="text" name="category" placeholder="Genre Name" required>
            <input type="submit" name="submitcategory" value="Add Genre" />
          </form>
        <?php
          }
          else
          {
        ?>
          <form class="addmovie" method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Tile" required>
            <input type="number" name="year" placeholder="Year" min="1960" max="2022" required>
            <input type="number" name="rating" placeholder="Rating" min="1" max="10" step="0.1" required>
            <textarea type="text" name="description" placeholder="Description" required></textarea>
            <select name="genreid">
              <?php
                  if ($res->num_rows > 0) {
                    while($row = $res->fetch_assoc()) {
              ?>
              <option value="<?php echo $row['Gid'] ?>"><?php echo $row['Genre'] ?></option>
              <?php
                    }
                  }              
              ?>
            </select>
            <input type="file" name="imagefile" accept="image/*" required/>
            <input type="submit" name="submitmovie" value="Add Movie" />
          </form>
        <?php  
          }
        ?>
      </div>
    </div>
  </div>
  </div>
</body>
</html>