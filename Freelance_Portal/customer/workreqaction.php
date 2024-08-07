<?php
session_start();
$freelancerid=$_GET["freelancerid"];
$userid=$_SESSION['loginid'];
$worktittle=$_POST["worktittle"];
$description=$_POST["description"];
$requesteddate=date('y/m/d');
$expecteddate=$_POST["date"];
$remark="NULL";
$requeststatus="enquired";  

require_once("../dboperation.php");
$obj=new dboperation();


$query="insert into tblworkrequest(freelancerid,userid,worktittle,description,requesteddate,expecteddate,requeststatus,workprice,remark) values('$freelancerid','$userid','$worktittle','$description','$requesteddate','$expecteddate','$requeststatus','0','$remark')";
$res=$obj->executequery ($query);
echo "<script>alert('work request successfully!!');window.location='freelancersview.php'</script>";
?>