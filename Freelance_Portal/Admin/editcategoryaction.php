<?php
require_once("../dboperation.php");
$obj=new dboperation();
$freelancercategoryid=$_POST["freelancercategoryid"];
$freelancecategoryname=$_POST["categoryname"];
$freelancecategorydescription=$_POST["categorydescription"];
$freelancecategoryimage=$_FILES['image']['name'];

if($freelancecategoryimage!=null)
{
   // echo "a";
move_uploaded_file($_FILES['image']['tmp_name'],"../uploads/".$freelancecategoryimage);

$query="update tblcategory set freelancercategoryname ='$freelancecategoryname',freelancercategorydescription='$freelancecategorydescription',freelancercategoryimage='$freelancecategoryimage' where freelancercategoryid=$freelancercategoryid";
$res=$obj->executequery($query);

}

else
{
   echo $query="update tblcategory set freelancercategoryname ='$freelancecategoryname',freelancercategorydescription='$freelancecategorydescription' where freelancercategoryid=$freelancercategoryid";
$res=$obj->executequery($query);
}
if($res==1)
{
echo "<script>alert('Successfully Edited');window.location='categoryview.php' </script>";

}
 else
{
    echo "<script>alert('Not successfully edited');window.location='locationview.php' </script>";
}
?>