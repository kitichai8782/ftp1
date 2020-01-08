<?php
        session_start();
?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content = "width=device=width, initial-scale=1.0">
    <meta http-eguiv="X-UA-Compatible" content="ie=edge">
    <title> เข้าสู่ระบบ</title>

    <link rel= "stylesheet" href="style.css">

</head>
<body>
    <?php if (isset($_SESSION['success'])) :?>
        <div class = "success">
            <?php
                echo $_SESSION['success'];
            ?>
        </div>
    <?php endif; ?>
    
    <?php if (isset($_SESSION['error'])) :?>
        <div class = "error">
            <?php
                echo $_SESSION['error'];
            ?>
        </div>
    <?php endif; ?>

    <form action="login.php" method="post">

    <label for= "username">ชื่อผู้ใช้</label>
    <input type"text" name="user" placeholder="username" require>
    <br>
    <label for= "password">รหัสผ่าน</label>
    <input type"password" name="password" placeholder="password" require>
    <br>
    <button><input href="register.php" type="submit" name="submit" value="เข้าสู่ระบบ"></button>



    </form>
    <a href="register.php">go to register</a>

</body>
</html>

<?php
if (isset($_SESSION['success']) || isset($_SESSION['error'])) {
    session_destroy();
}

?>

