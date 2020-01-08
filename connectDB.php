<?php
  $conn =  mysqli_connect("localhost","root","","adminuser");
  if (!$conn){
      die("เชื่อมต่อฐานข้อมูลไมได้" .mysqli_error($conn));
  }
?>