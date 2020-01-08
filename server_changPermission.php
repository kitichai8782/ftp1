<?php 
    session_start();
    require('connectDB.php');
    
    if(isset($_GET)){
        $id = $_GET['id'];
        $status = $_GET['status'];

        if($status == 'admin'){
            $sql = "UPDATE tb_account SET ac_status='u' WHERE ac_id = $id ";
        }else{
            $sql = "UPDATE tb_account SET ac_status='a' WHERE ac_id = $id ";
        }

        $result = mysqli_query($condb, $sql);

        if($result){
            echo    "<script>
                        if(confirm('เปลี่ยนสถานะสำเร็จ')){
                            location.replace('ftp_provider.php');
                        }else{
                            location.replace('ftp_provider.php');
                        }
                    </script>";
        }else{
            echo    "<script>
                        if(confirm('เปลี่ยนสถานะไม่สำเร็จ')){
                            location.replace('ftp_provider.php');
                        }else{
                            location.replace('ftp_provider.php');
                        }
                    </script>";
        }
    }
?>