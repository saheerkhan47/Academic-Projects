<?php
include_once("../dboperation.php");
$obj = new dboperation();
if(isset($_POST["Submit"]))
{
$seldistrictid = $_POST["districtid"];
$locationname = $_POST["locationname"];
$sql="select * from tbllocation where locationname='$locationname'";
$res = $obj->executequery($sql);
$rows = mysqli_num_rows($res);
if($rows == 1)
{
echo "<script>alert('Already Exist');window.location='locationview.php'
</script>";
}
else{
$sql="INSERT INTO `tbllocation`(`districtid`, `locationname`)VALUES ('$seldistrictid','$locationname')";
$obj->executequery($sql);
echo "<script>alert('Saved Successfully');window.location='locationview.php' </script>";
}
}
?>