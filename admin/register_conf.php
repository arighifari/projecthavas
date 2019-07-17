<?php
include_once('../config.php');

if(isset($_POST['register_submit'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = mysqli_real_escape_string($conn,$_POST['password']);
    $conf_pass  = mysqli_real_escape_string($conn,$_POST['confirm_password']) ;

    $hash = password_hash($pass,PASSWORD_DEFAULT); 

    if($conf_pass == $pass){
        $query = "INSERT INTO admins (name,email,password) VALUES ('$name','$email','$hash')";
        $insert = mysqli_query($conn,$query);

        if($insert){
            echo "<script type='text/javascript'>window.location='login.php';alert('Success Register');</script>";
        } else{
            echo "<script type='text/javascript'>window.location='register.php';alert('Failed Register');</script>";
        }
    }
    else{
        echo "<script type='text/javascript'>window.location='register.php';alert('Failed Register');</script>";        
    }

    }
?>
