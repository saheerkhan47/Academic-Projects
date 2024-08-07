<?php
session_start();

 require_once("../dboperation.php");
$obj=new dboperation();
if(isset($_POST["Submit"]))

$tittle=$_POST["tittle"];
$freelancerid=$_SESSION["loginid"];
$image1=$_FILES['image1']['name'];
move_uploaded_file($_FILES['image1']['tmp_name'],"../uploads/".$image1);
$image2=$_FILES['image2']['name'];
move_uploaded_file($_FILES['image2']['tmp_name'],"../uploads/".$image2);
$date=$_POST['date'];

$query="select * from tblfreelancergallery where tittle='$tittle'";
$result=$obj->executequery($query);
$row=mysqli_num_rows($result);
// echo $res;
if($row==1)
{
    echo "<script>alert('Already existed!!');window.location='gallery.php'</script>";
}
else
{
$query="insert into tblfreelancergallery(freelancerid,image1,image2,registerdate,tittle) values ('$freelancerid','$image1','$image2','$date','$tittle')";
$res=$obj->executequery($query);
 echo "<script>alert('Gallery registration successfully!!');window.location='gallery.php'</script>";
}

?>