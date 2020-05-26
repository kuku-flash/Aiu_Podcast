
<?php
include'../configure/config.php';

//$id=$_GET['id'];



//sql = "Delete From audio Where id=$id ";
//$result = mysqli_query($conn,$sql);



if(!isset($_POST['delete'])){

echo"<script>
		alert('Delete error');
        window.location.href='admin_podcast_list.php?success';
        </script>";
}

else {
	
	$id = $_POST['id'];
	$file = $_POST['file'];
	$image = $_POST['image'];
	$image_folder= "photos/";
	$audio_folder = "audio/";
	
	
		
	$sql = "Delete From audio Where id=$id ";
	$result = mysqli_query($conn,$sql);	
	
	if($result){
	
	if(unlink($image_folder.$image))
	{
		if(unlink($audio_folder.$file))
		{
			echo"<script>
			alert('Delete success');
			window.location.href='admin_podcast_list.php?success';
			</script>";
		}
	}
	
	else
	{
		echo'error';
	}
	}
}

?> 	

