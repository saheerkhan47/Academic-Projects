
<?php
// session_start();
include("header.php");
	?>
	<header id="fh5co-header" class="fh5co-cover js-fullheight" role="banner" style="background-image: url(images/job1.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="display-t js-fullheight">
						<div class="display-tc js-fullheight animate-box" data-animate-effect="fadeIn">
							<h1>See <em>Our</em> Gallery</h1>
							<!-- <h2>Brought to you by <a href="http://freehtml5.co/" target="_blank">freelanzoid</a></h2> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	
	<div id="fh5co-gallery" class="fh5co-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 fh5co-heading animate-box">
					<h2>Our Gallery</h2>
					<div class="row">
						<div class="col-md-6">
							<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ab debitis sit itaque totam, a maiores nihil, nulla magnam porro minima officiis! Doloribus aliquam voluptates corporis et tempora consequuntur ipsam, itaque, nesciunt similique commodi omnis. Ad magni perspiciatis, voluptatum repellat.</p> -->
						
							<p><a href="freegallery.php" class="btn btn-primary btn-outline">Add Gallery</a></p>
						</div>
					</div>
				</div>
				
				<?php
            require_once("../dboperation.php");
            $obj=new dboperation();
			$freelancerid=$_SESSION['loginid'];
            $query = "select * from tblfreelancergallery where freelancerid='$freelancerid'";
            $result=$obj->executequery($query);
            while($display=mysqli_fetch_array($result))
            {
            ?>
				<div class="col-md-3 col-sm-3 ">
					<img src="../uploads/<?php echo $display["image1"];?>" alt="" width="300" height="300">
				</div>
				<div class="col-md-3 col-sm-3 ">
					<img src="../uploads/<?php echo $display["image2"];?>" alt="" width="300" height="300">
				</div>
			<?php
			}
			?>
			</div>
		</div>
	</div>
	<?php
include("footer.php");
	?>

	