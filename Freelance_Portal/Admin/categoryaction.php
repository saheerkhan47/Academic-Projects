<?php
require_once("../dboperation.php");
$obj=new dboperation();
$freelancecategoryname=$_POST["categoryname"];
$freelancecategorydescription=$_POST["categorydescription"];
$freelancecategoryimage=$_FILES['image']['name'];
move_uploaded_file($_FILES['image']['tmp_name'],"../uploads/".$freelancecategoryimage);

$query="select * from tblcategory where freelancercategoryname='$freelancecategoryname'";
$result=$obj->executequery($query);
$row=mysqli_num_rows($result);
// echo $res;
if($row==1)
{
    echo "<script>alert('Already existed!!');window.location='categoryreg.php'</script>";
}
else
{
$query="insert into tblcategory(freelancercategoryname,freelancercategorydescription,freelancercategoryimage) values ('$freelancecategoryname','$freelancecategorydescription','$freelancecategoryimage')";
$res=$obj->executequery($query);
echo "<script>alert('category registration successfully!!');window.location='categoryreg.php'</script>";

}
?>