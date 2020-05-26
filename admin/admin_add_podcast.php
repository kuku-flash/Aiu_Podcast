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
            <h2 class="margin-bottom-10">Add New Podcast Audio</h2>
			
            <form action="admin_add_podcast_script.php" class="templatemo-login-form" method="post" enctype="multipart/form-data">
              <div class="row form-group">

                <div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputFirstName">Title</label>
                    <input type="text" class="form-control"  placeholder="" name="audio_name">                  
                </div>
				<div class="col-lg-12">
                  <label class="control-label templatemo-block">Audio File</label> 
                  <input type="file" name="audio_file"  class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false">
                  <p>Maximum upload size is 20 MB.</p>                  
                </div>
				<div class="col-lg-6 col-md-6 form-group">                  
                    <label class="control-label templatemo-block" >year of study</label> 
                    <select class="form-control" name="yearofstudy">
						<option>2019/2020</option>
						<option>2020/2021</option>
					</select>                  
                </div>
				<div class="col-lg-6 col-md-6 form-group">                  
                    <label class="control-label templatemo-block" >semester</label> 
                    <select class="form-control" name="semester">
						<option>One</option>
						<option>two</option>
						<option>three</option>
					</select>                  
                </div>
				<div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputFirstName">Speaker name</label>
                    <input type="text" class="form-control"  placeholder="" name="speaker_name">                  
                </div>
				<div class="col-lg-6 col-md-6 form-group">                  
                    <label for="inputFirstName">Date</label>
                    <input type="date" class="form-control"  placeholder="" name="date">                  
                </div>
        
				<div class="col-lg-12">
                  <label class="control-label templatemo-block">Image</label> 
                  <input type="file" name="image"  class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false">
                  <p>Maximum upload size is 20 MB.</p>                  
                </div>
				
				<div class="col-lg-12 form-group">                   
                    <label class="control-label" for="inputNote">Description</label>
                    <textarea class="form-control" id="inputNote" name="description" cols="14" rows="14"  type="text"></textarea>
                </div>
               
				
				<div class="col-lg-12 form-group">                   
                   <div class="margin-right-15 templatemo-inline-block">                      
                      <input type="checkbox" name="publish" id="c4" value="1">
                      <label for="c4" class="font-weight-400"><span></span>Publish</label>
                  </div>
                </div>
				
              </div>
              
            
              
              
              
              <div class="form-group text-right">
                <input type="submit" class="templatemo-blue-button" name="submitt" value="Add">
				</form>
               <a href="admin_podcast_list.php" ><input type="button" class="templatemo-white-button" value="Back"></a>
              </div>                           
            
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
