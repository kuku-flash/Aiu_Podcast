<?php
session_start();
include '../configure/config.php';

$email = $_POST['email']; 
$password = $_POST['password']; 


$sql="SELECT  `username` , `email`  FROM admin WHERE email= '$email' AND password = '$password' ";
$result=mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

$count=mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
  if($count == 1) {
        
         $_SESSION['login_user'] = $row['email'];
		 $_SESSION['username'] = $row['username'];
		 
	echo"	<script>
		alert('successfully');
        window.location.href='admin_podcast_list.php?success';
        </script>";


}
else {
echo"<script> alert('Wrong email or password!!!');  history.back();  </script>";

}




mysqli_close($conn);

?>