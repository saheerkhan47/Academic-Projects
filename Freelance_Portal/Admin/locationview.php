<?php
include("header.php")
?>

<div class="main-panel">
<section class="main-panel">
<div class="pcoded-content">
<div class="row">
<div class="col-xl-12">
<div class="card">
<div class="card-body">
<form action="" method="POST" enctype="multipart/form-data">
<div class="form-row">
<div class="form-group col-md-6">
<label for="inputEmail4">Choose District</label>
<select class="form-control" name="seldistrictid"
id="seldistrictid" onchange="this.form.submit()">
<option>--------Select District-----------</option>
<?php
include_once("../dboperation.php");
$obj=new dboperation();
$sql="select * from tbldistrict";
$res = $obj->executequery($sql);
while($display= mysqli_fetch_array($res))
{
?>
<option value="<?php echo $display["districtid"]?>"> <?php
echo $display["districtname"]?> </option> <?php
}
?>
</select>
</div>
</div>
</form>
</div>
<div class="card-header">
<h5>Location View</h5> <?php
if(isset($_POST["seldistrictid"]))
{
$district_id1=$_POST["seldistrictid"];
?>
<script>document.getElementById("seldistrictid").value = <?php echo
$district_id1; ?></script>
<a href="locationreg.php?districtid=<?php echo $district_id1?>"
class="btn btn-outline-primary" style="margin-left: 717px;">Add Location </a>
<?php
}
?>
</div>
<div class="card-body table-border-style">
<div class="table-responsive">
<table class="table table-striped">
<thead>
<tr>
<th>Sl.no</th>
<th>Location Name</th>
<th colspan="2">Actions</th>
</tr>
</thead>
<?php
if(isset($_POST["seldistrictid"]))
{
$district_id=$_POST["seldistrictid"];
include_once("../dboperation.php");
$obj = new dboperation();
$sql = "SELECT * FROM `tbllocation` where districtid='$district_id'";
$res = $obj->executequery($sql);
$s=1;
?>
<tbody>
<?php
while($display=mysqli_fetch_array($res))
{
?>
<tr>
<td> <?php echo $s++ ?> </td>
<td> <?php echo $display["locationname"] ; ?> </td> 
<td>
<button type="button" class="btn btn-outline-danger">

<!-- <i class="feather icon-edit"> -->
    <a href="locationedit.php?locationid=<?php echo $display["locationid"];?>">Edit
</button>
<button type="button" class="btn btn-outline-warning">
<!-- <i class="feather icon-delete"> -->
    <a href="locationdelete.php?locationid=<?php echo $display["locationid"];?>">Delete
</button>
</td>
</tr>
<?php
}
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<?php
include("Footer.php")
?>