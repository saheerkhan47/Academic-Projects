<?php
$name=$_POST["name"];
$catid=$_POST["freelancercategoryid"];
$house=$_POST["house"];
$pincode=$_POST["pin"];
$districtid=$_POST["ddldistrict1"];
$idproof=$_POST["idproof"];
$image=$_FILES["image"]["name"];
move_uploaded_file($_FILES["image"]["tmp_name"],"../uploads/" .$image);
$email=$_POST["email"];
$phn=$_POST["phn"];
$locationid=$_POST["ddllocationh"];
$username=$_POST["username"];
$password=$_POST["password"];
$date=date('y/m/d');

require_once("../dboperation.php");
$obj=new dboperation();
$sql="select * from tbllogin where username='$username'"; 
$res=$obj->executequery($sql);
$rows=mysqli_num_rows($res);
if($rows>0)
{
    echo"<script>alert('user already exists')</script>";
}
else{
    $sql="INSERT INTO tbllogin(username,password,role,status) VALUE('$username','$password','freelancer','Not Confirmed')";
    $res=$obj->executequery($sql);
$loginid=mysqli_insert_id($obj->con);
 $sql="INSERT INTO tblfreelancerreg(freelancername,freelancercategoryid,freelanceremail,freelancercontact,registereddate,housename,districtid,locationid,pincode,idproof,image,loginid) VALUE('$name','$catid','$email','$phn','$date','$house','$districtid','$locationid','$pincode','$idproof','$image','$loginid')";
$res=$obj->executequery($sql);

   $bodyContent="Dear $name, Your account has been successfully created, Please wait for the Admin confirmation then login to the site";
   $mailtoaddress=$email;
   require('phpmailer.php');

if($res==1)
{
    echo "<script>alert('Successfully');window.location='login.php'</script>";
}
else{
    echo "failed";
}
}
?>