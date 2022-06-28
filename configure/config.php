<?php

$host = 'localhost';  
$user = 'root';  
$pass = '';  //change to your database password here --  if your using xammp shoud look like this $pass = '';
$dbname = 'aiu_podcast';  
$conn = mysqli_connect($host, $user, $pass,$dbname);  
if(!$conn){  
  die('Could not connect: '.mysqli_connect_error());  
}  
else{
	  
}
?>