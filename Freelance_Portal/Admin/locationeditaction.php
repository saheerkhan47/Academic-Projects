<?php
include("../dboperation.php");
$obj=new dboperation();
$locationname=$_POST["locationname"];
$locationid=$_POST["locationid"];
$query="update tbllocation set locationname='$locationname' where locationid=$locationid";
$res=$obj->executequery($query);
if($res==1)
{
    echo "<script>alert('Successfully Edited');window.location='locationview.php' </script>";

}
else
{
    echo "<script>alert('Not Successfully Edited');window.location='locationview.php' </script>";
}
?>