<?php
    ob_start();
    session_start();
    require('connectDB.php');
    require('ftp_connect.php');

    if(!isset($_SESSION['ftp_username']) && !isset($_SESSION['ftp_password'])) header("Location: ftp_login.php");

    $result = mysqli_query($condb, "SELECT * FROM tb_account WHERE ac_username = '{$_SESSION['ftp_username']}' ");
    
    $result = mysqli_fetch_assoc($result);

    if(!$result['ac_status'] == 'a'){
        header("Location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <a href="index.php"> <- กลับไปหน้าแรก </a>
        <hr>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No. </th>
                    <th scope="col">username</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                    $allUser = mysqli_query($condb, "SELECT * FROM tb_account");
                    $i = 0;
                    while($row = mysqli_fetch_assoc($allUser)):
                ?> 
                        <tr>
                            <td><?= $i+1 ?></td>
                            <td><?= $row['ac_username'] ?></td>
                            <td><?= $row['ac_fristname'] ." ". $row['ac_lastname'] ?></td>
                            <td><?= $row['ac_email'] ?></td>
                            <td>
                                <?=  ($row['ac_status'] == 'a')? 
                                    "<a class='btn btn-primary' href='server_changPermission.php?id={$row['ac_id']}&status=admin'>admin</a>"
                                    :
                                    "<a class='btn btn-success' href='server_changPermission.php?id={$row['ac_id']}&status=user'>user</a>" 
                                ?>
                            </td>
                        </tr>
                <?php 
                    $i++;
                    endwhile;
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>