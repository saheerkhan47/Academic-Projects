<?php
session_start();
require_once("../dboperation.php");
$obj=new dboperation();
$userid=$_SESSION['loginid'];
$username=$_POST["name"];
$email=$_POST["email"];
$contact=$_POST["contact"];
$housename=$_POST["housename"];
$pincode=$_POST["pincode"];
 $districtid=$_POST["ddldistrict"];
 $locationid=$_POST["ddllocation"];
$idproof=$_POST["idproof"];

{
    $query="update tbluser set username ='$username',email='$email',contact='$contact',housename='$housename',pincode='$pincode',idproof='$idproof',locationid='$locationid' where loginid=$userid";
    $res=$obj->executequery($query);
    echo "<script>alert('successfully edited');window.location='custprofile.php' </script>";


    
}


?>
