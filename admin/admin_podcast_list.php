<!DOCTYPE html>
<?php
include'../configure/session_open.php';

 ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
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
    <link href="./css/font-awesome.min.css" rel="stylesheet">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/templatemo-style.css" rel="stylesheet">

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
            <li><a href="admin_podcast_list.php"><i class="fa fa-sliders fa-fw"></i>Manage Podcast</a></li>
            
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
				<li><a href="#"class="active" >Published</a></li>
				<li><a href="#" >Unpublished</a></li>
              </ul>
            </nav>
          </div>
        </div>
        <div class="templatemo-content-container">
		
		<h2 class="margin-bottom-10">Audio Podcasts</h2>
		<div class="form-group">
             <a href="admin_add_podcast.php">  <button  class="templatemo-blue-button">Add New Podcast</button> </a>	
        </div> 
          <div class="templatemo-content-widget no-padding">
		<div class="panel panel-default table-responsive">
              <table class="table table-striped table-bordered templatemo-user-table">
 <?php
include '../configure/config.php';

        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 8;
        $offset = ($pageno-1) * $no_of_records_per_page;
        // Check connection
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            die();
        }

        $total_pages_sql = "SELECT COUNT(*) FROM audio";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT * FROM audio ORDER BY id DESC LIMIT $offset, $no_of_records_per_page";
        $res_data = mysqli_query($conn,$sql);
       
        mysqli_close($conn);
		
//$sql="SELECT * FROM audio ORDER BY id DESC";
//$result = mysqli_query($conn, $sql);
?>
                <thead>
                  <tr>
                    <td><a href="" class="white-text templatemo-sort-by"># <span class="caret"></span></a></td>
                   
                    <td><a href="" class="white-text templatemo-sort-by">Audio Title & File <span class="caret"></span></a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Speaker <span class="caret"></span></a></td>
                    <td><a href="" class="white-text templatemo-sort-by">year & sem<span class="caret"></span></a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Image <span class="caret"></span></a></td>
					<td><a href="" class="white-text templatemo-sort-by">description <span class="caret"></span></a></td>
					<td><a href="" class="white-text templatemo-sort-by">publish <span class="caret"></span></a></td>
                  
                    <td>Edit</td>
                    <td>Delete</td>
                  </tr>
                </thead>
<?php
while($rows=mysqli_fetch_assoc($res_data)) {
?>				
                <tbody>
                  <tr>
                    <td><?php echo $rows['id']; ?></td>
                    
                    <td>
                      <p><?php echo $rows['audio_name']; ?></p>
                      <a href="audio/<?php echo $rows['audio_file']; ?>" target="_blank"><?php echo $rows['audio_file']; ?></a> 
                    </td>
                    <td><?php echo $rows['speaker_name']; ?></td>
                    <td><?php echo $rows['yearofstudy'];  ?> &nbsp; <?php echo $rows['semester']; ?></td>
					<td><a href="photos/<?php echo $rows['image']; ?>" ><img src="photos/<?php echo $rows['image']; ?>" width="50" height="50"></a></td>
                    <td><a class="btn btn-primary" href="admin_view_description.php?id=<?php echo $rows['id']; ?>">view</a></td>
					<td><div class="templatemo-block margin-bottom-5">
                     
                      <label for="c1" class="font-weight-400"> <input type="checkbox" name="emailOptions" id="c1" value="" ><span class="btn btn-success"><?php echo $rows ['published']; ?></span></label> 
                    </div></td>
                    <td><a href="admin_edit_audio_podcast.php?id=<?php echo $rows['id']; ?>" class="btn btn-warning">Edit</a></td>
                    <td>
					<form class="form-group"  action="delete_aiupodcast.php" method="post">
					<input type="hidden"  name="file" value="<?php echo $rows['audio_file']; ?>">
					<input type="hidden"  name="image" value="<?php echo $rows['image']; ?>">
					<input type="hidden"  name="id" value="<?php echo $rows['id']; ?>">
					<input class="btn btn-danger" type="submit" name="delete" value="delete">
					
					<!-- <a href="delete_aiupodcast.php?id=<?php echo $rows['id']; ?> & file=<?php echo $rows['audio_file']; ?> & image=<?php echo $rows['image']; ?> " class="templatemo-link">Delete</a>
					-->
					
					</form>
					
					</td>
                  </tr>
<?php 
}
?>              
                </tbody>
              </table>    
            </div>                   
          </div>
	 <ul class="pagination">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>   
          <footer class="text-right">
            <p>Copyright &copy; 2019 - All rights reserved. Africa International University</p>
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
