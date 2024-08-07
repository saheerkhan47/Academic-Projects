
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
							<h1>See <em>Freelancer</em> Gallery</h1>
							<!-- <h2>Brought to you by <a href="http://freehtml5.co/" target="_blank">Freelanzoid</a></h2> -->
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
							<p>A work gallery, in a broad sense, is a curated collection or display of creative or professional works, often presented for public viewing or evaluation.</p>
						</div>
					</div>
				</div>

				
				<?php
            require_once("../dboperation.php");
            $obj=new dboperation();
			$freelancerid=$_GET['freelancerid'];
            $query = "select * from tblfreelancergallery where freelancerid='$freelancerid'";
            $result=$obj->executequery($query);
            while($display=mysqli_fetch_array($result))
            {
            ?>
			<div class="row">
			<div class="col-md3 col-sm-3">
					<?php echo $display["tittle"];?>
				</div>
			
				<div class="col-md-3 col-sm-3 ">
					<img src="../uploads/<?php echo $display["image1"];?>" alt="" width="300" height="300">
				</div><div class="col-md-1 col-sm-1">&nbsp;</div>
				<div class="col-md-3 col-sm-3 ">
					<img src="../uploads/<?php echo $display["image2"];?>" alt="" width="300" height="300">
					
				</div></div><br>
			<?php
			}
			?>
				
			</div><br>
			<p><a href="freelancerviewmore.php?freelancerid=<?php echo $freelancerid ?>" class="btn btn-primary btn-outline">Back</a></p>
		</div>
	</div>
	<?php
include("footer.php");
	?>

	