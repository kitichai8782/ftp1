<?php
   session_start();
   require_once "connectDB.php";
   if (isset($_POST['submit'])) {
       $username = $_POST['username'];
       $password = $_POST['password'];
       $firstname = $_POST['firstname'];
       $lastname = $_POST['lastname'];
       $Email = $_POST['Email'];

       $user_check = "SELECT * FROM user WHERE username ='$username' LIMIT 1";
       $result = mysql_query($conn,$user_check);
       $user = mysql_fetch-assoc(result);

       if($user['username'] === $username){
           echo "<script>alert(=ชื่อนี้มีคนใช้แล้ว);<script>";
       } else {
        $passwordenc = md5($password);
        $query = " INSERT INTO user (username, password, firstname, lastname, Email,Status)
        VALUE ('$username', '$passwordenc', '$firstname', '$lastname', '$Email','u')";
        $result = mysqli_query($conn,$query);

        if ($result) {
            $_SEEEION['สำเร็จ'] = "Insert user success";
            header("location: index.php");
        } else {
            $_SEEEION['ไม่สำเร็จ'] = " something";
            header("location: index.php");
        }
      }                                                 
   }
?>


<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content = "width=device=width, initial-scale=1.0">
    <meta http-eguiv="X-UA-Compatible" content="ie=edge">
    <title> สมัครสมาชิก</title>

    <link rel= "stylesheet" href="style.css">

</head>
<body>
    <form action="<?php echo $_server['PHP_SELF']; ?> method="post">

    <label for= "username">ชื่อผู้ใช้</label>
    <input type"text" name="user" placeholder="username" require>
    <br>
    <label for= "password">รหัสผ่าน</label>
    <input type"password" name="password" placeholder="password" require>
    <br>
    <label for= "firstname">firstname</label>
    <input type"firstname" name="firstname" placeholder="firstname" require>
    <br>
    <label for= "lastname">lastname</label>
    <input type"lastname" name="lastname" placeholder="lastname" require>
    <br>
    <label for= "E-mail">E-mail</label>
    <input type"E-mail" name="E-mail" placeholder="E-mail" require>
    <br>
    <input type="submit" name="submit" value="submit">
    <button href="register.php">go to register</button>

    </form>
    <a href="index.php">กลับสู่หน้าหลัก</a>

</body>
>