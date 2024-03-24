<style>
     .video-container {
            position: relative;
            overflow: hidden;
            padding-bottom: 56.25%;
            margin: 20px 0;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            margin-left:140px;
            width: 70%;
            height: 70%;
        }
</style><?php include('header_dashboard.php'); ?>
    <body id="class_div">
		<?php include('navbar_about.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12" id="content">
                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
								<div class="navbar navbar-inner block-header">
									<div id="" class="muted pull-right"><a href="index.php"><i class="icon-arrow-left"></i> Back</a></div>
								</div>
                            <div class="block-content collapse in">
                                <div class="span12">
										<?php
											$mission_query = mysqli_query($conn,"select * from content where title  = 'mission' ")or die(mysqli_error());
											$mission_row = mysqli_fetch_array($mission_query);
											echo $mission_row['content'];
										?>
								<hr>
										<?php
											$mission_query = mysqli_query($conn,"select * from content where title  = 'vision' ")or die(mysqli_error());
											$mission_row = mysqli_fetch_array($mission_query);
											echo $mission_row['content'];
										?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                    <div class="video-container">
        <iframe src="./images/vd3.mp4" frameborder="0" allowfullscreen></iframe>
    </div>
                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>