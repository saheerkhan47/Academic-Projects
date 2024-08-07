<?php
include("header.php");
	?><br><br>
<div id="fh5co-about" class="fh5co-section">
            <?php
            require_once("../dboperation.php");
            $obj=new dboperation();
            $freelancerid=$_GET['freelancerid'];
            $query = "select * from tblfreelancerreg f inner join tblcategory c on c.freelancercategoryid=f.freelancercategoryid where f.loginid='$freelancerid'";
            $result=$obj->executequery($query);
            $display=mysqli_fetch_array($result);
            ?>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-pull-4 img-wrap animate-box" data-animate-effect="fadeInLeft">
					<img src="../uploads/<?php echo $display["image"];?>" alt="Free Restaurant Bootstrap Website Template by FreeHTML5.co" width="500" height="500" style="margin-left: 400px;">
				</div>
				<div class="col-md-5 col-md-push-1 animate-box">
					<div class="section-heading">
						<h2><?php echo $display['freelancername']?></h2>
						<p>Profession : <?php echo $display['freelancercategoryname']?></p>
						<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam iure reprehenderit nihil nobis laboriosam beatae assumenda tempore, magni ducimus abentey.</p> -->
						<a href="workgallery.php?freelancerid=<?php echo $freelancerid ?>" class="btn btn-primary btn-outline">Work History</a>
                        <a href="workrequest.php?freelancerid=<?php echo $freelancerid ?>" class="btn btn-primary btn-outline">Send Enquiry</a>
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php
include("footer.php");
	?>