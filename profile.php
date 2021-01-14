<?php
session_start();
// include "db.php";
if(!isset($_SESSION['email'])):
  header("location: login.php");
endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="https://bootswatch.com/4/materia/bootstrap.min.css">
    <style>
      .btn btn-primary btn-lg{
        background-color : red;
      }
    </style>
</head>
<body style=" background-image: url('back.jpg');background-size: cover;">
  <div class="container" style="margin: 100px">
  <div class="row">
   <div class="col-md-12">
   <div class="jumbotron">
  <h1 class="display-3">Hello, <?php echo $_SESSION['name']; ?>  </h1>
  <p class="lead"> Welcome in your profile</p>
   
   <p class="lead">
    <a  class="btn btn-primary btn-lg" href="home.php" role="button">Employees information</a>
    <a class="btn btn-primary btn-lg" href="home2.php" role="button">Departments information</a>
    <a class="btn btn-primary btn-lg" href="logout.php" role="button">logout</a>

  </p>
</div>
   </div>
  </div>
   
  </div>
   

   <script src="jquery.min.js"></script> 
   <script src="app.js"></script>
</body>
</html>