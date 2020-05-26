<!doctype html>
<!--[if IE 9]> <html class="no-js ie9 fixed-layout" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js " lang="en"> <!--<![endif]-->
<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <!-- Site Meta -->
    <title>Aiu_podcast</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Site Icons -->
   <link rel="shortcut icon" href="images/aiupodcasticon.png" type="image/x-icon"

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i" rel="stylesheet"> 
    
    <!-- Custom & Default Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/carousel.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/style.css">
	
	<link href="jPlayer-2.9.2/dist/skin/blue.monday/css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="jPlayer-2.9.2/lib/jquery.min.js"></script>
	<script type="text/javascript" src="jPlayer-2.9.2/dist/jplayer/jquery.jplayer.min.js"></script>
	
    <!--[if lt IE 9]>
        <script src="js/vendor/html5shiv.min.js"></script>
        <script src="js/vendor/respond.min.js"></script>
    <![endif]-->

</head>
<body>  
	<?php include'layout/header.php'; ?>
        <section class="section db p120">
            <div class="container">
                <div class="row">
				<br><br>
				<br>
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->

        <section class="section gb nopadtop">
            <div class="container">
                <div class="boxed">
                    <div class="row">

                        <div class="sidebar col-md-4">
<?php
include 'configure/config.php';
$id = $_GET['id'];
		
$sql="SELECT * FROM audio where id=$id";
$result = mysqli_query($conn, $sql);
?>	
				
<?php
while($rows=mysqli_fetch_assoc($result)) {
?>                      
    						
                            <div class="widget clearfix">
									
                                <div class="banner-widget">
                                    <img src="admin/photos/<?php echo $rows['image']; ?>" alt="" class="img-rounded" height="300" width="100%"> 
                                </div>
								
								<ul class="pagination">
                                      
                                      <li class=""><a href="casts.php">&laquo;&nbsp;Back</a></li>
                                      
                                    </ul>
                            </div>

                            <div class="widget clearfix">
                                <h3 class="widget-title">Popular Posts</h3>
                                <div class="post-widget">
                                    <div class="media"> 
									
                                    </div>

                                    

                                    
                                </div><!-- end post-widget -->
                            </div><!-- end widget -->

                      
                        </div><!-- end sidebar -->
	                      
                        <div class="col-md-8">
                            <div class="content blog-list">
                                <div class="blog-wrapper clearfix">
                                    <div class="blog-meta">
                                     
                                        <h3><a href="blog-single.html" title=""><?php echo $rows['audio_name']; ?></a></h3>
                                        <ul class="list-inline">
                                            <li><?php echo $rows['upload_date']; ?></li>
                                            <li><span> by</span> <a href="#"><?php echo $rows['speaker_name']; ?></a></li>
                                        </ul>
                                    </div><!-- end blog-meta -->


									 
<script type="text/javascript">
//<![CDATA[

// TMP For testing on standard browsers.
// $.jPlayer.platform.android = true;

var jPlayerAndroidFix = (function($) {
	var fix = function(id, media, options) {
		this.playFix = false;
		this.init(id, media, options);
	};
	fix.prototype = {
		init: function(id, media, options) {
			var self = this;

			// Store the params
			this.id = id;
			this.media = media;
			this.options = options;

			// Make a jQuery selector of the id, for use by the jPlayer instance.
			this.player = $(this.id);

			// Make the ready event to set the media to initiate.
			this.player.bind($.jPlayer.event.ready, function(event) {
				// Use this fix's setMedia() method.
				self.setMedia(self.media);
			});

			// Apply Android fixes
			if($.jPlayer.platform.android) {

				// Fix playing new media immediately after setMedia.
				this.player.bind($.jPlayer.event.progress, function(event) {
					if(self.playFixRequired) {
						self.playFixRequired = false;

						// Enable the contols again
						// self.player.jPlayer('option', 'cssSelectorAncestor', self.cssSelectorAncestor);

						// Play if required, otherwise it will wait for the normal GUI input.
						if(self.playFix) {
							self.playFix = false;
							$(this).jPlayer("play");
						}
					}
				});
				// Fix missing ended events.
				this.player.bind($.jPlayer.event.ended, function(event) {
					if(self.endedFix) {
						self.endedFix = false;
						setTimeout(function() {
							self.setMedia(self.media);
						},0);
						// what if it was looping?
					}
				});
				this.player.bind($.jPlayer.event.pause, function(event) {
					if(self.endedFix) {
						var remaining = event.jPlayer.status.duration - event.jPlayer.status.currentTime;
						if(event.jPlayer.status.currentTime === 0 || remaining < 1) {
							// Trigger the ended event from inside jplayer instance.
							setTimeout(function() {
								self.jPlayer._trigger($.jPlayer.event.ended);
							},0);
						}
					}
				});
			}

			// Instance jPlayer
			this.player.jPlayer(this.options);

			// Store a local copy of the jPlayer instance's object
			this.jPlayer = this.player.data('jPlayer');

			// Store the real cssSelectorAncestor being used.
			this.cssSelectorAncestor = this.player.jPlayer('option', 'cssSelectorAncestor');

			// Apply Android fixes
			this.resetAndroid();

			return this;
		},
		setMedia: function(media) {
			this.media = media;

			// Apply Android fixes
			this.resetAndroid();

			// Set the media
			this.player.jPlayer("setMedia", this.media);
			return this;
		},
		play: function() {
			// Apply Android fixes
			if($.jPlayer.platform.android && this.playFixRequired) {
				// Apply Android play fix, if it is required.
				this.playFix = true;
			} else {
				// Other browsers play it, as does Android if the fix is no longer required.
				this.player.jPlayer("play");
			}
		},
		resetAndroid: function() {
			// Apply Android fixes
			if($.jPlayer.platform.android) {
				this.playFix = false;
				this.playFixRequired = true;
				this.endedFix = true;
				// Disable the controls
				// this.player.jPlayer('option', 'cssSelectorAncestor', '#NeverFoundDisabled');
			}
		}
	};
	return fix;
})(jQuery);

$(document).ready(function() {

	var id = "#jquery_jplayer_1";

	var title = "<?php echo $title='' ?>"; 
	var audio = "<?php echo $rows['audio_file'] ?>";
	var bubble = {
		title:" <?php echo $title ?>",
		mp3:"admin/audio/<?php echo$rows['audio_file'] ?>",
		oga:"http://www.jplayer.org/audio/ogg/Miaow-07-Bubble.ogg"
	};
	var lismore = {
		title:"Lismore",
		mp3:"http://www.jplayer.org/audio/mp3/Miaow-04-Lismore.mp3",
		oga:"http://www.jplayer.org/audio/ogg/Miaow-04-Lismore.ogg"
	};

	var options = {
		swfPath: "../../dist/jplayer",
		supplied: "mp3,oga",
		wmode: "window",
		useStateClassSkin: true,
		autoBlur: false,
		smoothPlayBar: true,
		keyEnabled: true,
		remainingDuration: true,
		toggleDuration: true
	};

	var myAndroidFix = new jPlayerAndroidFix(id, bubble, options);

	$('#setMedia-Bubble').click(function() {
		myAndroidFix.setMedia(bubble);
	});
	$('#setMedia-Bubble-play').click(function() {
		myAndroidFix.setMedia(bubble).play();
	});

	$('#setMedia-Lismore').click(function() {
		myAndroidFix.setMedia(lismore);
	});
	$('#setMedia-Lismore-play').click(function() {
		myAndroidFix.setMedia(lismore).play();
	});

});
//]]>
</script>								

<div class="blog-wrapper clearfix">
									
<div id="jquery_jplayer_1" class="jp-jplayer"></div>
<div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
	<div class="jp-type-single">
		<div class="jp-gui jp-interface">
			<div class="jp-controls">
				<button class="jp-play" role="button" tabindex="0">play</button>
				<button class="jp-stop" role="button" tabindex="0">stop</button>
			</div>
			<div class="jp-progress">
				<div class="jp-seek-bar">
					<div class="jp-play-bar"></div>
				</div>
			</div>
			<div class="jp-volume-controls">
				<button class="jp-mute" role="button" tabindex="0">mute</button>
				<button class="jp-volume-max" role="button" tabindex="0">max volume</button>
				<div class="jp-volume-bar">
					<div class="jp-volume-bar-value"></div>
				</div>
			</div>
			<div class="jp-time-holder">
				<div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
				<div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
				<div class="jp-toggles">
					<button class="jp-repeat" role="button" tabindex="0">repeat</button>
				</div>
			</div>
		</div>
		<div class="jp-details">
			<div class="jp-title" aria-label="title">&nbsp;</div>
		</div>
		<div class="jp-no-solution">
			<span>Update Required</span>
			To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
		</div>
	</div>
</div>									

<div>									
<!-- end media -->

                                    <div class="blog-desc-big">
										</br>
                                        <p ><?php echo $rows['description']; ?></p>
                                       
                                       
                                    </div><!-- end desc -->
                                </div><!-- end blog -->
                            </div><!-- end content -->

						
                          
                        </div><!-- end col -->
<?php 
}
?> 				

       </div><!-- end row -->
                </div><!-- end boxed -->
            </div><!-- end container -->
        </section>

      
		<?php include'layout/footer.php'; ?>

    <!-- jQuery Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animate.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>