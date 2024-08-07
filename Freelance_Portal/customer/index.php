<?php
include("header.php");
    ?>
<header id="fh5co-header" class="fh5co-cover js-fullheight" role="banner" style="background-image: url(images/job.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="display-t js-fullheight">
						<div class="display-tc js-fullheight animate-box" data-animate-effect="fadeIn">
							<h1>When you want to create a business bigger than yourself,you need a lot of help.<em></em><em></em></h1>

							<?php
							 include_once("../dboperation.php");
							 $obj=new dboperation();
                              $loginid=$_SESSION['loginid'];
							  $sql="select * from tbluser where loginid='$loginid'";
							  $res=$obj->executequery($sql);
                              $display= mysqli_fetch_array($res);
                        
							?>
							<h2>That's what freelanzoid does.<br> Hai..<?php echo $display['username'];?><a href="http://freehtml5.co/" target="_blank"></a></h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="fh5co-about" class="fh5co-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-pull-4 img-wrap animate-box" data-animate-effect="fadeInLeft">
					<img src="images/job.jpg" width='800' height='400' alt="Free Restaurant Bootstrap Website Template by FreeHTML5.co">
				</div>
				<div class="col-md-5 col-md-push-1 animate-box">
					<div class="section-heading">
						<h2>The Freelanzoid</h2>
						<p>A freelanzoid, also known as a freelance marketplace or freelance platform, is an online platform that connects freelancers with clients or businesses seeking freelance services.</p>
						<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam iure reprehenderit nihil nobis laboriosam beatae assumenda tempore, magni ducimus abentey.</p> -->
						<!-- <p><a href="#" class="btn btn-primary btn-outline">Our History</a></p> -->
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="fh5co-started" class="fh5co-section animate-box" style="background-image: url(images/job.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Freelanzoid</h2>
					<p>A freelanzoid, also known as a freelance marketplace or freelance platform, is an online platform that connects freelancers with clients or businesses seeking freelance services.!</p>
					<p><a href="freelancersview.php" class="btn btn-primary btn-outline">see freelancers</a></p>
				</div>
			</div>
		</div>
	</div>
    <?php
include("footer.php");
    ?>