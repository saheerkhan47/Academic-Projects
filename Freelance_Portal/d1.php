<?php
include("header.php");
?>
<div class="container">
<?php
include("../dboperation.php");
$obj=new dboperation();
$customerid=$_GET["customerid"];
$sql="select * from  tbl_customer c inner join tbl_location l on c.locationid=l.locationid inner join tbl_district d on d.districtid=l.districtid where c.loginid=$customerid";
$res=$obj->executequery($sql);
?>

<div class="section-top-border">
<?php
      $display=mysqli_fetch_array($res);
    //   $locationid= $display["locationid"];
?> 
			<div class="row">
				<div class="col-lg-8 col-md-8">
					<h3 class="mb-30">Edit Profile</h3>
					<form action="editprofileaction.php" method="post" enctype="multipart/form-data">
						<div class="mt-10">
							<input type="text" name="name" required pattern="^[A-Z][a-zA-Z]*$"
                title="Must start with capital letter followed by upper or lowercase letters" value="<?php echo $display["name"];?>" onfocus="this.placeholder = ''"
								onblur="this.placeholder = " required class="single-input">
						</div>
						<div class="mt-10">
							<input type="text" name="mail" value="<?php echo $display["email"];?>" onfocus="this.placeholder = ''"
								onblur="this.placeholder = ''" required class="single-input" required>
						</div>
						<div class="mt-10">
							<input type="text" name="house" required pattern="^[A-Z][a-zA-Z]*$"
                title="Must start with capital letter followed by upper or lowercase letters" value="<?php echo $display["housename"];?>" onfocus="this.placeholder = ''"
								onblur="this.placeholder = ''" required class="single-input">
						</div>
						<div class="mt-10">
							<input type="place" name="place" required pattern="[A-Za-z]" 
                title="Must start with capital letter followed by upper or lowercase letters" value="<?php echo $display["place"];?>" onfocus="this.placeholder = ''"
								onblur="this.placeholder = ''" required class="single-input">
						</div>
						<div class="mt-10">
							Male<input type="radio" value="male" name="gender" <?php if($display['gender']=='male'){ echo "checked=checked";}  ?>>
							Female<input type="radio" value="female" name="gender" <?php if($display['gender']=='female'){ echo "checked=checked";}  ?>>
							
						</div>
                        
                        <div class="mt-10">
							<input type="pincode" name="pincode" required pattern="[0-9]{6}" title="Must contain 6 digits" value="<?php echo $display["pincode"];?>" onfocus="this.placeholder = ''"
								onblur="this.placeholder = ''" required class="single-input">
						</div>
                        <div class="mt-10">
							<input type="contact" name="contact" required pattern="[0-9]{10}" 
         required  title="Must contain 10 digits" value="<?php echo $display["contactno"];?>" onfocus="this.placeholder = ''"
								onblur="this.placeholder = ''" required class="single-input">
						</div>
                        
                        <div class="mt-10">
                        ID Proof<div><input type="file" name="idproof" value="<?php echo $display["idproof"];?>">
                        <img src="../Admin/uploads/<?php echo $display["idproof"]; ?>"width="80" height="80">
						</div>
                        <div class="input-group-icon mt-10">
							<div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div>
                            <?php
                                                include_once("../dboperation.php");
                                                $obj=new dboperation();
                                                $sql="select * from  tbl_district";
                                                $res = $obj->executequery($sql);
                                                ?>
							<div class="form-select" >
								<select class="form-control" id="ddldistrict" name="ddldistrict">
                                <option value="<?php echo $display["districtid"]?>"><?php echo $display["districtname"];?></option>
                                                <?php
                                                while($display1= mysqli_fetch_array($res))
                                               {
                                             ?>
                                             <option value="<?php echo $display1["districtid"]?>" <?php echo ($display1["districtid"]==$display['districtid'])?"selected==selected":""?>> 
                                             <?php echo $display1["districtname"]?> </option> 
                                             <?php
                                             }
                                             ?>
								</select>
							</div>
						</div>
                        <div class="input-group-icon mt-10">
							<div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div>
							<div class="form-select" >
                        <?php
                                        $sql1="select * from tbl_location";

                                        $result1=$obj->executequery($sql1);
                                        ?>

                                      <div id="divlocation">
                                        <select name="ddllocation" id="ddllocation" class="form-control">
                                            <option value="0">--select--</option>
                                            <?php
                                            while($r1=mysqli_fetch_array($result1))
                                            {
                                            ?>

                                            <option value="<?php echo $r1["locationid"];?>" <?php echo ($r1["locationid"]==$display['locationid'])?"selected==selected":""?>><?php echo $r1["locationname"];?></option>
                                            <?php
                                            }
                                                
                                            ?>
                                            </select>
                                        </div>
                                            </div>
						</div>
                                        </div>
            </div><br>
                        
                       
                        <?php echo str_repeat("&nbsp;",180);?><button class="genric-btn info-border circle arrow" type="submit">Update</button>
                        <input type="hidden" name="customerid" value="<?php echo $customerid; ?>">
					</form>
                    
				</div>
				
			</div>
		
	</div>
    </div>
	<br><br><br><br><br><br><br>

                    <?php
include("footer.php");
?>
<script>
		$(document).ready(function() 
        {
            // alert("a")
			$("#ddldistrict").change(function() 
            {
            //  alert("a")
				var district_id = $(this).val();
                //  alert(district_id)
				$.ajax({
					url: "getlocation.php",
					method: "POST",
					data: { district_id: district_id },
					success: function(response) 
                    {
						$("#divlocation").html(response);
					},
					error: function() 
                    {
						$("#divlocation").html("Error occurred while getting location!");
					}
				});
			});
		});
	</script>
				
                