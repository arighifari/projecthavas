<?php
include_once('../config.php');
session_start();

if(isset($_POST['login_submit'])){
    $email = $_POST['email_login'];
    $pass = $_POST['loginpass'];

        $login = mysqli_query($conn,"SELECT idadmins,name,email,password FROM admins WHERE email='$email'");
        $num_rows = mysqli_num_rows($login);
        if($num_rows != 0) {
            $fetch = mysqli_fetch_assoc($login);
            $dbid = $fetch['idadmins'];
            $dbemail = $fetch['email'];
            $dbpass = $fetch['password'];
            $dbnama = $fetch['name'];
            $pass_verify = password_verify($dbpass,$fetch['password']); 

            if(password_verify($pass, $dbpass)) {
              $_SESSION['admin'] = $dbnama;
              $_SESSION['id'] = $dbid;

              echo "<script type='text/javascript'>window.location='index.php';alert('Welcome Back $dbnama');</script>";
            }
             else {
              echo "<script type='text/javascript'>window.location='login.php';alert('Wrong Email or Password Salah');</script>";

            }
          } else {
            echo "<script type='text/javascript'>window.location='login.php';alert('Email Not Exist');</script>";
          }
        }

?>
