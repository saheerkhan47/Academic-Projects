<?php
include("header.php");

	?><br><br>
	<script src="js/jquery.min.js"></script>
	<script>

$(document).ready(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;

    // or instead:
    // var maxDate = dtToday.toISOString().substr(0, 10);

    //alert(maxDate);
    $('#form3Example9').attr('min', maxDate);
});
	</script>
<div id="fh5co-contact" class="fh5co-section animate-box">
		<div class="container">
			
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Send Enquiry </h2>
					<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae enim quae vitae cupiditate, sequi quam ea id dolor reiciendis consectetur repudiandae. Rem quam, repellendus veniam ipsa fuga maxime odio? Eaque!</p>
					<p><a href="mailto:info@yourdomainname.com" class="btn btn-primary btn-outline">Contact Us</a></p> -->
				</div>
			<?php
			$requestid=$_GET["requestid"];

			
			// echo $freelancerid;
			?>
			<div class="row">
				<div class="col-md-8 col-md-push-6 col-sm-6 col-sm-push-6"style="margin-left: -395px;margin-top: -143px;">
					<form action="progressaction.php?requestid=<?php echo $requestid;?>" method="post" id="form-wrap">
						
						<div class="row form-group">
							<div class="col-md-12">
								<label for="message">Description
								</label>
								<textarea name="description" id="message" cols="30" rows="10" class="form-control"></textarea>
							</div>

							</div>
						<div class="row form-group">
							<div class="col-md-12">
							<div class="col-md-12 mb-4">
                  <div class="form-outline">
				  <label class="form-label" for="form3Example1m1">Due Date</label>
                  <input type="date" id="form3Example9" class="form-control form-control-lg" name="duedate"/>
							</div>
						</div>
						</div>
                         </div>
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