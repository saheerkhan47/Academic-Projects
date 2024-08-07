<?php
	if(isset($_GET["id"])) 
	{
		echo "a";
		$districtid=$_GET["id"];

		// You can replace this code with a database query to retrieve the states for the selected country
		include_once("../dboperation.php");
       echo  $sql="select * from tbllocation where districtid=$districtid";
        $obj=new dboperation();
        $result=$obj->executequery($sql);
?>


<select name="ddllocationh" id="ddllocationh" class="form-control">
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

