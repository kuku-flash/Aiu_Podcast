<?php  
/**
 * User: Flash kuku 
 * Date: 11/21/2014 
 * Time: 2:46 AM 
 */  
  
session_start();//session is a way to store information (in variables) to be used across multiple pages.  
session_destroy();  
header("Location: admin_login.php");//use for the redirection to some page  
echo "<script>window.open('view_users.php?deleted=user has been deleted','_self')</script>";
?>  
