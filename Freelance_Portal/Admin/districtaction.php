<?php
require_once("../dboperation.php");
$obj=new dboperation();
$districtname=$_POST["districtname"];

$query="select * from tbldistrict where districtname='$districtname'";
$result=$obj->executequery($query);
$row=mysqli_num_rows($result);
// echo $res;
if($row==1)
{
    echo "<script>alert('Already existed!!');window.location='districtreg.php'</script>";
}
else
{
$query="insert into tbldistrict(districtname) values ('$districtname')";
$res=$obj->executequery($query);
echo "<script>alert('District registration successfully!!');</script>";
}
?>