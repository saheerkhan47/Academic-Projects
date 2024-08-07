<?php
include("header.php");

	?><br><br>
<div id="fh5co-contact" class="fh5co-section animate-box">
		<div class="container">
			
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Send Remark </h2>
					<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae enim quae vitae cupiditate, sequi quam ea id dolor reiciendis consectetur repudiandae. Rem quam, repellendus veniam ipsa fuga maxime odio? Eaque!</p>
					<p><a href="mailto:info@yourdomainname.com" class="btn btn-primary btn-outline">Contact Us</a></p> -->
				</div>
			<?php
			$requestid=$_GET["requestid"];
			// echo $freelancerid;
			?>
			<div class="row">
				<div class="col-md-8 col-md-push-6 col-sm-6 col-sm-push-6"style="margin-left: -395px;margin-top: -143px;">
					<form action="rejectworkaction.php?requestid=<?php echo $requestid;?>" method="post" id="form-wrap">
						
						<div class="row form-group">
							<div class="col-md-12">
								<label for="message">About Work
								</label>
								<textarea name="workdesc" id="message" cols="30" rows="10" class="form-control"></textarea>
							</div>

							</div>
						<!-- <div class="row form-group">
							<div class="col-md-12">
							<div class="col-md-12 mb-4">
                 
				  <label class="form-label" for="form3Example1m1">Work Price</label>
                  <input type="text" id="form3Example9" class="form-control form-control-lg" name="workamount"/>
							</div>
						</div>
						</div> -->
						<div class="row form-group">
							<div class="col-md-12">
								<input type="submit" class="btn btn-primary btn-outline btn-lg" value="Submit Form">
								</form>
							</div>
						<!-- </div>
						<div class="row form-group">
							<div class="col-md-12">
								<label for="message">Your Message</label>
								<textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<input type="submit" class="btn btn-primary btn-outline btn-lg" value="Submit Form">
							</div> -->
						</div>

					
				</div>
			</div>

		</div>
	</div>
    <?php
include("footer.php");
	?>