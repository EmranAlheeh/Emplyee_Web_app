<?php
    session_start();
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    // $password=md5($password);
    // $_SESSION['email']=$email;
    // $_SESSION['password']=$password;
    $conn=mysqli_connect("localhost","root","");
    mysqli_select_db($conn,"employees");
    $query="select email from users where email='$email' and password='$password';";
    $result=mysqli_query($conn,$query);
    $row=mysqli_num_rows($result);
    if ($row==1){
        $data=mysqli_fetch_row($result);
        $_SESSION['email']=$data[0];
        echo true;
    }else{
        echo "false";
    }
    mysqli_close($conn);
?>