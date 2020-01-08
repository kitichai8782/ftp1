<?php 
 session_start();

 if (!$_SESSION['userid']) {
     header("location: index.php");
 } else{


?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content = "width=device=width, initial-scale=1.0">
    <meta http-eguiv="X-UA-Compatible" content="ie=edge">
    <title>user page</title>

    <link rel= "stylesheet" href="style.css">

</head>
<body>
<h1>User</h1>
<h3>hi,<?php echo $_SESSION['user'];?></h3>
<p><a href= "logout.php">ออกจากระบบ</a></p>
</body>
</html>
 <?php }?>
