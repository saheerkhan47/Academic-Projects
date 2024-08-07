<?php
session_start();
require_once("../dboperation.php");
$obj=new dboperation();
$freelancerid=$_SESSION['loginid'];
$freelancername=$_POST["name"];
$freelanceremail=$_POST["email"];
$freelancercontact=$_POST["contact"];
$housename=$_POST["housename"];
$pincode=$_POST["pincode"];
 $freelancercategoryid=$_POST["freelancercategoryname"];
 $districtid=$_POST["districtname"];
 $locationid=$_POST["locationname"];
$idproof=$_POST["idproof"];
$image=$_FILES['image']['name'];

if($image=="")
{
    $query="update tblfreelancerreg set freelancername ='$freelancername',freelanceremail='$freelanceremail',freelancercontact='$freelancercontact',housename='$housename',pincode='$pincode',idproof='$idproof',freelancercategoryid='$freelancercategoryid',districtid='$districtid',locationid='$locationid' where loginid=$freelancerid";
    $res=$obj->executequery($query);
    echo "<script>alert('successfully edited');window.location='viewprofile.php' </script>";

}

else
{
move_uploaded_file($_FILES["image"]["tmp_name"],"../uploads/" .$image);

  $query="update tblfreelancerreg set freelancername ='$freelancername',freelanceremail='$freelanceremail',freelancercontact='$freelancercontact',housename='$housename',pincode='$pincode',idproof='$idproof',image='$image',freelancercategoryid='$freelancercategoryid',districtid='$districtid',locationid='$locationid' where loginid=$freelancerid";
$res=$obj->executequery($query);
echo "<script>alert('Successfully Edited with file');window.location='viewprofile.php'</script>";

    
}



?>
