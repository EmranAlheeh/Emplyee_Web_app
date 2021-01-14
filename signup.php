
<?php
 
 
 $con= mysqli_connect('localhost','root','');
 mysqli_select_db($con, 'employees');
 $errorMessage="";
 if(isset($_POST['email'])){

     $name= $_POST['name'];
     $email= $_POST['email'];
     
     $pass= md5($_POST['password']);
     
     $s = " SELECT * FROM users WHERE email ='$email'";
     $result = mysqli_query($con, $s);
     $num = mysqli_num_rows($result);
     
     if ($num== 1) {
         $errorMessage= "Email is  Already taken";
        }else{
            
            $reg=" INSERT INTO users(name ,email, password) VALUES ('$name' ,'$email', '$pass')";
            mysqli_query($con, $reg);
            echo "Registration Success";
            header('location: login.php'); //redirection when you register
        }
        
 }
 
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Signup</title>
    <link
      rel="stylesheet"
      href="https://bootswatch.com/4/materia/bootstrap.min.css"
    />
  </head>
  <body
    style="
      background-image: url('back.jpg');
      background-size: cover;
    "
  >
    <div class="container" style="margin: 50px">
      <div class="row">
        <div class="col-md-5 mx-auto mt-5">
          <div class="card" style="background-color: rgba(253, 253, 251, 0.925)">
            <div class="card-header">
              <h3>Signup User</h3>
            </div>
            <div class="card-body">
              <form action="" method="post" >
                <div class="form-group">
                  <input
                    type="text"
                    id="name"
                    class="form-control name"
                    name="name"
                    placeholder="Name"
                    required
                  />
                  <div class="invalid-feedback" style="font-size: 16px">
                    Name is required
                  </div>
                </div>

                <!-- Close form-group -->
                <div class="form-group">
                    <p style="color: red;"><?php echo $errorMessage ?></p>
                  <input
                    type="email"
                    id="email"
                    class="form-control email"
                    name="email"
                    placeholder="Email"
                    required
                  />
                  <div
                    class="invalid-feedback emailError"
                    style="font-size: 16px"
                  >
                    Email is required
                  </div>
                </div>
                <!-- Close form-group -->
                <div class="form-group">
                  <input
                    type="password"
                    id="password"
                    class="form-control password"
                    name="password"
                    placeholder="Password"
                    required
                  />
                  <div class="invalid-feedback" style="font-size: 16px">
                    Password is required
                  </div>
                </div>
                <!-- Close form-group -->
                <div class="form-group">
                  <button type="submit" id="signup" class="btn btn-info">
                    Signup &rarr;
                  </button>
                  <a href="login.php" style="float: right; margin-top: 10px"
                    >Already have an account ?</a
                  >
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

    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"
    ></script>
    <!-- <script src="app.js"></script> -->
  </body>
</html>

