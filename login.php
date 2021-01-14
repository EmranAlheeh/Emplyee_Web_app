<?php
    session_start();
    $con= mysqli_connect('localhost','root','');
 mysqli_select_db($con, 'employees');
 $errorMessage="";
 if(isset($_POST['email'])){

     
     $email= $_POST['email'];
     
     $password= md5($_POST['password']);
     
     $s="select name,email from users where email='$email' and password='$password';";
     $result = mysqli_query($con, $s);
     $row=mysqli_num_rows($result);
     if ($row==1){
         $data=mysqli_fetch_row($result);
         $_SESSION['email']=$data[1];
         $_SESSION['name']=$data[0];
         header('location: profile.php'); //redirection when you login
      }else{
          $errorMessage="Your email or password is Wrong";
     }
     mysqli_close($con);
        
 }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/materia/bootstrap.min.css">
</head>
<body style=" background-image: url('back.jpg');background-size: cover;">
<script>
        
        function signUp(){
            window.open("signup.php","_self");
        }
    </script>
  <div class="container">
  <div class="row">
  <div class="col-md-5 mx-auto mt-5">
  <?php if(isset($_SESSION['created'])): ?>
    <div class="alert alert-success">
    <?php echo $_SESSION['created']; ?>
    </div>
<?php endif; ?>
<?php unset($_SESSION['created']); ?>
  <div class="card" style="background-color: rgba(253, 253, 251, 0.877)">
  <div class="card-header">
  <h3>Login User</h3>
  </div>
  <div class="card-body">
  <form action="" method="Post">
      <p style="color:red"> <?php echo $errorMessage?></p>
  <div class="form-group">
  <div class="form-group">
  <input type="email" id="email" class="form-control email" name="email" placeholder="Email" required>
  <div class="invalid-feedback emailError" style="font-size:16px;">Email is required</div>
  </div>
  <!-- Close form-group -->
  <div class="form-group">
  <input style="    color: whitesmoke;" type="password" id="password" class="form-control password" name="password" placeholder="Password" required>
  <div class="invalid-feedback passwordError" style="font-size:16px;">Password is required</div>
  </div>
  <!-- Close form-group -->
  <div class="form-group">
   <button type="submit" id="login" class="btn btn-info" value="Log In">Login &rarr;</button>
   <a href="signup.php" style="float:right;margin-top:10px;" value="" onclick="signup()">Create new account</a>
  </div>
  <!-- Close form-group -->
  </form>
  </div>
  <!-- Close card-body -->
  </div>
  <!-- Close card -->
  </div>
  <!-- Close col-md-5 -->
  </div>
  <!-- Close row -->
  </div>
  <!-- Close container -->

   <script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script> 
   <!-- <script src="app.js"></script> -->
</body>
</html>
 
 
