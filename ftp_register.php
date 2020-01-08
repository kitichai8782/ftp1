<?php 
    session_start();
    require('./lib/ftp_adduser.php');
    require('connectDB.php');

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $address = $_POST['address'];
        $email = $_POST['email'];

        $sql = '';
        
        $result = mysqli_query($condb, "SELECT * FROM tb_account WHERE ac_username = '$username' ");
        
        if(!mysqli_num_rows($result)){
            
            $result = mysqli_query($condb, "SELECT * FROM tb_account WHERE ac_email = '$email' ");

            if(!mysqli_num_rows($result)){

                $new_password = md5($password);

                $sql = "INSERT INTO tb_account (ac_username, ac_password, `ac_fristname`, `ac_lastname`, `ac_address`, `ac_email`) 
                        VALUES ('$username', '$new_password', '$fname', '$lname', '$address','$email')";
                
                if(mysqli_query($condb, $sql)){
        
                    add_ftp_user("$username", "$password", __DIR__."/upload" ); //dir กำหนดตำแหน่งที่ต้องการให้เข้าถึง
                    echo    "<script>
                                if(confirm('สมัครสมาชิกสำเร็จ')){
                                    location.replace('ftp_login.php');
                                }
                            </script>";
                }
            }else{
                echo    "<script>
                            alert('Email นี่มีคนใช้แล้ว')
                        </script>";
            }
        }else{
            echo    "<script>
                        alert('Username นี่มีคนใช้แล้ว!')
                    </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <h3>สมัครสมาชิก</h3>
                <form method="post" class="mt-2">
                    <div class="form-group">
                        <input type="text" class="form-control" id="Username" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="Password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <input class="form-control" type="text" name="fname" placeholder="Frist Name">
                            </div>
                            <div class="col-6">
                                <input class="form-control" type="text" name="lname" placeholder="Last Name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="address" placeholder="Address"></textarea>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email">
                    </div>
                    <button type="submit" class="btn btn-primary md-2" name="submit">Sing in</button>
                    <a href="ftp_login.php">กลับไปหน้าล็อกอิน</a>
                </form>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>