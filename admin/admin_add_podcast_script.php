<?php
include'../configure/config.php';

if(isset($_POST['submitt']))
{    
    
	
    $audio_name = $_POST['audio_name'];
    $audio_file = $_POST['audio_file'];
    $yearofstudy = $_POST['yearofstudy'];
    $semester = $_POST['semester'];
    $speaker_name = $_POST['speaker_name'];
    $description = $_POST['description'];
	$image = $_POST['image'];
	$date = $_POST['date'];
	$publish = $_POST['publish'];
	
	
	
	$file = $_FILES['audio_file']['name'];
    $file_loc = $_FILES['audio_file']['tmp_name'];
	$file_size = $_FILES['audio_file']['size'];
	$file_type = $_FILES['audio_file']['type'];
	
	$image = $_FILES['image']['name'];
    $image_loc = $_FILES['image']['tmp_name'];
	$image_size = $_FILES['image']['size'];
	$image_type = $_FILES['image']['type'];

     $folder="audio/";
	 $folder2="photos/";
	
	if(move_uploaded_file($file_loc,$folder.$file )&& move_uploaded_file($image_loc,$folder2.$image))
	{
		$sql2="INSERT INTO audio (audio_name, audio_file, yearofstudy, semester, speaker_name, description, image, upload_date, published) 
		VALUES( '$audio_name' , '$file', '$yearofstudy', '$semester', '$speaker_name', '$description', '$image', '$date', '$publish')";
		mysqli_query($conn,$sql2);

		?>
		<script>
		
        window.location.href='admin_podcast_list.php?success';
        </script>
		<?php
	}
	else
	{
		echo"<script> alert('Error while uploading try again!!!');  history.back();  </script>".mysqli_error($conn);
	}
}

mysqli_close($conn);
?>