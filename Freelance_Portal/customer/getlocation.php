<?php
	if(isset($_POST["district_id"])) 
	{
		$districtid=$_POST["district_id"];

		// You can replace this code with a database query to retrieve the states for the selected country
		include_once("../dboperation.php");
        $sql="select * from tbllocation where districtid=$districtid";
        $obj=new dboperation();
        $result=$obj->executequery($sql);
?> 
<!-- <div class="input-group-icon mt-10">
							<div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div>
							<div class="form-select" > -->
								
<select name="ddllocation" id="ddllocation" class="form-control">
<option value="0">--select--</option>
<?php
while($r=mysqli_fetch_array($result))
{
?>

<option value="<?php echo $r["locationid"];?>"><?php echo $r["locationname"];?></option>
<?php
}
	}
?>
</select>
<!-- </div>
</div>
</div> -->

