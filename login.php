<?php

session_start();

if (isset($_POST['username'])){
    include('connectDB.php');

     $username = $_POST['username'];
     $password = $_POST['password'];
     $passwordenc = md5($password);
 
     $query = "SELECT * FROM user WHERE usename = '$username' AND password = '$passwordenc'";

     $result = mysqli_query($conn,$query);

     if (mysqli_num_rows($result) == 1){
         $row = mysqli_fetch_array($result);

        $_SESSION['userid'] = $row['id'];
        $_SESSION['user'] = $row['firstname'] ." ". $row['lastname'];
        $_SESSION['status'] = $row['status'];

        if ($_SESSION['status'] == 'a'){
            header("location: admin_page.php");
        }
        if ($_SESSION['status'] == 'u'){
            header("location: user_page.php");
        }
        }else{
         echo "<script>alert('User หรือ Password ไม่ถูกต้อง);</script>";
     }
    }else{
        header("Location: index.php");

    }
?>