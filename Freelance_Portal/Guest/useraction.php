<?php
$name=$_POST["name"];
$house=$_POST["house"];
$pin=$_POST["pin"];
$districtid=$_POST["ddldistrict"];
$email=$_POST["email"];
$idproof=$_POST["idproof"];
$phn=$_POST["phn"];
$locationid=$_POST["ddllocation"];
$username=$_POST["username"];
$password=$_POST["password"];
$date=date('y/m/d');
require_once("../dboperation.php");

$obj=new dboperation();

$sql="SELECT * FROM tbllogin WHERE username='$username'";
$res=$obj->executequery($sql);
$rows=mysqli_num_rows($res);
if($rows>0) // changed condition from >1 to >0 since username should be unique
{
echo "<script>alert('Username already exists')</script>";
}
else
{
   $sql="INSERT INTO tbllogin(username,password,role,status) VALUES ('$username','$password', 'Customer', 'Confirm')";
   $res=$obj->executequery($sql);
   $loginid=mysqli_insert_id($obj->con);
   $sql= "INSERT INTO tbluser(username,email,contact,housename,districtid,locationid,registereddate,idproof,loginid,pincode) VALUES ('$name','$email','$phn','$house','$districtid','$locationid','$date','$idproof','$loginid','$pin')";
   $res=$obj->executequery($sql);

   $bodyContent="Dear $name, Your account has been successfully created, Please login to the site";
   $mailtoaddress=$email;
   require('phpmailer.php');

   if($res==1)
   {
      // echo "<script>alert('Successfully');window.location='login.php'</script>";

   }
   else
   {
      echo "Failure";
   }
}
?>