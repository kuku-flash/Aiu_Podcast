<?php

 include 'config.php';
 session_start();
 
   if(!isset($_SESSION['username'])){
      header("location:admin_login.php");
      die();
   }

mysqli_close($conn);
?>