<?php
include("Header.php")
?>
<div class="main-panel">

<section class="pcoded-main-container">
<div class="pcoded-content">
<div class="row">
<div class="col-sm-12">
<br>
<br>
<div class="card">
<div class="card-header"><br><br><br>
<h5>Location Registration</h5>
</div>
<div class="card-body">
<form action="Locationregaction.php" method="POST">
<div class="form-row">
<div class="form-group col-md-6">
<label for="inputEmail4">District</label>
<?php
include_once("../dboperation.php");
$obj=new dboperation();
$districtid = $_GET["districtid"];
$sql="select * from tbldistrict where districtid='$districtid'";
$res = $obj->executequery($sql);
$display= mysqli_fetch_array($res);
?>
<input type="hidden" name="districtid" value="<?php
echo $districtid ?>">
<input type="text" class="form-control" placeholder="Enter 
District Name " name="districtname" value="<?php echo $display["districtname"] ?>" readonly>
</div>
<div class="form-group col-md-6">
<label for="inputPassword4">Location Name</label>
<input type="text" class="form-control" placeholder="Enter Location Name " name="locationname" Required>
</div>
</div>
<button type="submit" class="btn btn-primary"
name="Submit">Save</button>
</form>
</div>
</div>
</div>
</div>
</section>
<?php
include("Footer.php")
?>