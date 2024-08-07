<?php
include("header.php");
?>
<html>
  <head>
  <script src="jquery-3.6.0.min.js"></script>
    <script>
		$(document).ready(function() {
            //alert("a")
			$("#districtid").change(function() {
               // alert("a")
				var districtid = $(this).val();
               // alert(district_id)
				$.ajax({
					url: "getlocation.php",
					method: "POST",
					data: { districtid: districtid },
					success: function(response) 
                    {
						$("#ddllocation").html(response);
					},
					error: function() 
                    {
						$("#ddllocation").html("Error occurred while getting location!");
					}
				});
			});
		});
	</script>  
  </head>
  <body>
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profile Updations</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Forms</li>
              <li class="breadcrumb-item active" aria-current="page">Form Basics</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Profile Updations</h6>
                </div>
                <div class="card-body">

                    <form class="forms-sample" action="editprofileaction.php" method="post" >
                    <?php
            require_once("../dboperation.php");
            $obj=new dboperation();
            if(isset($_GET['loginid']))
            {
                $loginid=$_GET['loginid'];
                 $query="select d.,l.*,b. from tbl_district d inner join tbl_location l on d.districtid=l.districtid inner join tbl_blacksmither b on l.locationid=b.locationid where b.loginid=$loginid";
                $res=$obj->executequery($query);
                $display=mysqli_fetch_array($res)
                ?>
                <tr>
                    
                    <div class="form-group">
                        <b><label for="exampleInputUsername1">Blacksmith Name  </label></b>&nbsp;&nbsp;
                        <input type="text" class="form-control" id="exampleInputUsername1" name="blacksmithname" placeholder="Enter Your Name" value= "<?php echo $display["blacksmithname"];?>">
              
                        </div>
                        <div class="form-group">
                        <div class="row">
                <div class="col-md-6 mb-4">
                <div class="form-outline mb-4">
                        <b><label for="exampleInputUsername1">District Name  </label></b>&nbsp;&nbsp;<br>
                        <!-- <input type="text" class="form-control" id="exampleInputUsername1" name="blacksmithname" placeholder="Enter Your Name" value= ""> -->
              
                       <select class="select" name="districtid" id="districtid">
                        <option value="1"><?php echo $display["districtname"];?></option>
                        <?php
                        include_once("../dboperation.php");
                        $obj=new dboperation();
                        $sql="select * from tbl_district";
                        $result=$obj->executequery($sql);
                        while($dis=mysqli_fetch_array($result))
                        {
                          ?>
                
                         <option value="<?php echo $dis["districtid"]?>">
                        <?php
                         echo $dis["districtname"]
                         ?>
                         </option>
                         <?php
                        }
                        ?>
</select>
</div>
                  
                        <div class="form-group">
                        <b><label for="exampleInputUsername1">Location Name  </label></b>&nbsp;&nbsp;<br>
                        <!-- <input type="text" class="form-control" id="exampleInputUsername1" name="producttypename" placeholder="Enter Your Product Name" value=""> -->
                        <div class="form-outline mb-4" id="ddllocation">
                           <select class="select" name="locationid" id="locationid">
                        <option value="1"><?php echo $display["locationname"];?></option>
                        <?php
                        include_once("../dboperation.php");
                        $obj=new dboperation();
                        $sql="select * from tbl_location";
                        $result=$obj->executequery($sql);
                        while($dis=mysqli_fetch_array($result))
                        {
                          ?>
                
                         <option value="<?php echo $dis["districtid"]?>">
                        <?php
                         echo $dis["locationname"]
                         ?>
                         </option>
                         <?php
                        }
                        ?>
            </select>
          </div>
                      </div>
          </div>
                      </div>
                      
                        <div class="form-group">

                   <b><label for="exampleInputUsername1">House Name  </label></b>&nbsp;&nbsp;
                   <input type="text" class="form-control" id="exampleInputUsername1" name="housename" placeholder="Enter Your House Name" value="<?php echo $display["housename"];?>"></div>
                   <div class="form-group">
                   <b><label for="exampleInputUsername1">Pincode </label></b>&nbsp;&nbsp;
                   <input type="text" class="form-control" id="exampleInputUsername1" name="pincode" placeholder="Enter Your Pincode" value="<?php echo $display["pincode"];?>"></div>
                    <div class="form-group">
                    <b><label for="exampleInputEmail1">Email id </label></b>&nbsp;&nbsp;
                    <input type="text" class="form-control" id="exampleInputUsername1" name="email" placeholder="Enter Your Email" value="<?php echo $display["emailid"];?>"></div>
                    <div class="form-group">
                    <b><label for="exampleInputUsername1">Contact No. </label></b>&nbsp;&nbsp;
                    <input type="text" class="form-control" id="exampleInputUsername1" name="contact" placeholder="Enter Your Contact Number" value="<?php echo $display["contactno"];?>"></div>
                    <div class="form-group">
                    <b><label for="exampleInputUsername1">License No </label></b>&nbsp;&nbsp;
                    <input type="text" class="form-control" id="exampleInputUsername1" name="license" placeholder="Enter Your License Number" value="<?php echo $display["licenseno"];?>"></div>
                    <b><label for="exampleInputUsername1">Year of Expterience </label></b>&nbsp;&nbsp;
                    <input type="text" class="form-control" id="exampleInputUsername1" name="year" placeholder="Year of Experience" value="<?php echo $display["yearofexp"];?>"></div>
                    
                       <input type="submit" name="Submit" ></td>
               </tr>
                 <br>
                  <?php
}
?>
<input type="hidden" name="loginid" value="<?php echo $display["loginid"];?>">

                  </form>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->
        <!---Container Fluid-->
      </div>
</body>
</html>
      <?php
include("footer.php");
?>