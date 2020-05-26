<!DOCTYPE html>
<?php include'../configure/session_open.php'; ?>
<html lang="en">
  <head>
    <meta charset="utf-32">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Podcast</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <!-- 
    Visual Admin Template
    http://www.templatemo.com/preview/templatemo_455_visual_admin
    -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
    <!-- Left column -->
    <div class="templatemo-flex-row">
      <div class="templatemo-sidebar">
     <header class="templatemo-site-header">
          <h1> Hi, <?php echo $_SESSION['username']; ?></h1>
        </header>
        <header class="templatemo-site-header">
          <img src="images/aiu_podcast_logo.jpg" alt="Profile Photo" class="img-responsive" style="display: block; width: 181px; height: 60px; margin: 5px;">
          
        </header>
        <nav class="templatemo-left-nav">          
          <ul>
            <li><a href="admin_podcast_list.php" ><i class="fa fa-sliders fa-fw"></i>Manage Podcast</a></li>
            
            <li><a href="admin_logout.php"><i class="fa fa-eject fa-fw"></i>Sign Out</a></li>
          </ul>   
        </nav>
      </div>
      <!-- Main content -->
      <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                <li><a href="#" class="active"></a></li>
               
              </ul>
            </nav>
          </div>
        </div>
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
            <h2 class="margin-bottom-10">Edit Podcast Audio</h2>
<?php
include'../configure/config.php';
$id =  $_GET['id'];
$sql =  "SELECT * FROM audio WHERE id='$id' ";
$result = mysqli_query($conn,$sql);
$rows= mysqli_fetch_assoc($result);
?>				
            <form action="" class="templatemo-login-form" method="post" enctype="multipart/form-data">
              <div class="row form-group">
				<input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputFirstName">Title</label>
                    <input type="text" class="form-control"   value="<?php echo $rows['audio_name']; ?>" name="audio_name">                  
                </div>
				<div class="col-lg-12">
                  <label class="control-label templatemo-block">Audio File</label>
					<audio controls>
						 <source src="audio/<?php echo $rows['audio_file']; ?>" type="audio/ogg">
					</audio> 
                  <input type="file" name="audio_file"   class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false">
                  <p>Maximum upload size is 20 MB.</p>                  
                </div>
				<div class="col-lg-6 col-md-6 form-group">                  
                    <label class="control-label templatemo-block" >year of study</label> 
					<input type="text" class="form-control"  value="<?php echo $rows['yearofstudy']; ?>" name="semester"> 
					<br>
                    <select class="form-control" name="yearofstudy">
						<option>2019/2020</option>
						<option>2020/2021</option>
					</select>                  
                </div>
				<div class="col-lg-6 col-md-6 form-group">                  
                    <label class="control-label templatemo-block" >semester</label>
					<input type="text" class="form-control"  value="<?php echo $rows['semester']; ?>" name="semester"> 
					<br>
                    <select class="form-control" name="semester">
						<option>One</option>
						<option>two</option>
						<option>three</option>
					</select>                  
                </div>
				<div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputFirstName">Speaker name</label>
                    <input type="text" class="form-control"  value="<?php echo $rows['speaker_name']; ?>" name="speaker_name">                  
                </div>
				<div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputFirstName">Date</label>
                    <input type="date" class="form-control"  value="<?php echo $rows['upload_date']; ?>" name="date">                  
                </div>
        
				<div class="col-lg-12">
                  <label class="control-label templatemo-block">Image</label> 
				  <img src="photos/<?php echo $rows['image']; ?>" width="50" height="50">
                  <input type="file" name="image"  class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false">
                  <p>Maximum upload size is 20 MB.</p>                  
                </div>
				
				<div class="col-lg-12 form-group">                   
                    <label class="control-label" for="inputNote">Description</label>
                    <textarea class="form-control" id="inputNote" name="description" cols="14" rows="14"  type="text" >
						<?php echo $rows['description']; ?>
					</textarea>
                </div>
               
				<div class="col-lg-12 form-group">                   
                   <div class="margin-right-15 templatemo-inline-block">                      
                      <input type="checkbox" name="publish" id="c4" value="<?php echo $rows['published']; ?>">
                      <label for="c4" class="font-weight-400"><span></span>Publish</label>
                  </div>
                </div>
				
				
              </div>
              
            
              
              
              
              <div class="form-group text-right">
                <input type="submit" class="templatemo-blue-button" name="update" value="update">
				</form>
               <a href="admin_podcast_list.php" ><input type="button" class="templatemo-white-button" value="Back"></a>

              </div>                           
 			   
<?php

if(isset($_POST['update'])){
	$audio_name = $_POST['audio_name'];
    
    $yearofstudy = $_POST['yearofstudy'];
    $semester = $_POST['semester'];
    $speaker_name = $_POST['speaker_name'];
    $description = $_POST['description'];
	$image = $_POST['image'];
	$date = $_POST['date'];
	
	if(isset($_FILES['audio_file']['name']) && ($_FILES['audio_file']['name'] != "")){
	
	$file = $_FILES['audio_file']['name'];
    $file_loc = $_FILES['audio_file']['tmp_name'];
	$file_size = $_FILES['audio_file']['size'];
	$file_type = $_FILES['audio_file']['type'];
	 
	 unlink("audio/$old_audio");
	 
	 move_uploaded_file($file_loc, "audio/$file");
	}
	else{
		$file = $old_audio;
	}
	if(isset($_FILES['image']['name']) && ($_FILES['image']['name'] != "")){
	
	$image_file = $_FILES['image']['name'];
    $file_loc = $_FILES['image']['tmp_name'];
	$file_size = $_FILES['image']['size'];
	$file_type = $_FILES['image']['type'];
	 
	 unlink("photos/$old_image");
	 
	 move_uploaded_file($file_loc, "photos/$image_file");
	}
	else{
		$image_file = $old_image;
	}
	
	$update = mysqli_query($conn, "update audio set audio_name = '$audio_name', audio_file='$file', yearofstudy='$yearofstudy',
							semester='$semester', speaker_name='$speaker_name', description='$description', upload_date='$date', image='$image_file' 
							WHERE id='$id' ");
	
	if($update)
	{
		echo "<script> alert('updated sucessfully');  window.location.href='admin_podcast_list.php?success'; </script>";
	}
	else{
		echo "<script> alert(' fail to update ') </script>";
	}
}


 ?>            
          </div>
          <footer class="text-right">
            <p>Copyright &copy; 2019 - All rights reserved. Africa international University</p>
          </footer>
        </div>
      </div>
    </div>

    <!-- JS -->
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>        <!-- jQuery -->
    <script type="text/javascript" src="js/bootstrap-filestyle.min.js"></script>  <!-- http://markusslima.github.io/bootstrap-filestyle/ -->
    <script type="text/javascript" src="js/templatemo-script.js"></script>        <!-- Templatemo Script -->
  </body>
</html>
