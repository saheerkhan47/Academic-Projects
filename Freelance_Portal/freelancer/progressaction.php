<?php
session_start();
require_once("../dboperation.php");
$obj=new dboperation();
$requestid=$_GET["requestid"];
// $userid=$_SESSION['loginid'];
$sql="select * from tblworkrequest w inner join tbluser u on u.loginid=w.userid inner join tblfreelancerreg f on f.loginid=w.freelancerid where w.requestid='$requestid'";
$result=$obj->executequery($sql);
$display=mysqli_fetch_array($result);
$email=$display['email'];
$name=$display['username'];
$freelancername=$display['freelancername'];
$freelanceremail=$display['freelanceremail'];
$freelancercontact=$display['freelancercontact'];

$description=$_POST["description"];
$duedate=$_POST["duedate"];





$query="update tblworkrequest set requeststatus='Progress updated' where requestid='$requestid'";
$res=$obj->executequery ($query);

$bodyContent="Dear $name, $description , Please collect your work before :$duedate 
 Freelancer : $freelancername 
 Email : $freelanceremail 
 Contact : $freelancercontact";
$mailtoaddress=$email;
require('phpmailer.php');



echo "<script>alert('Progress updated successfully!!');window.location='workdetails.php'</script>";

?>