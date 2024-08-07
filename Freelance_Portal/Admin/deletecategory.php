<?php
include("header.php");
?>
<?php
require_once("../dboperation.php");
$obj=new dboperation();
if(isset($_GET['freelancercategoryid']))
{
    $freelancercategoryid=$_GET['freelancercategoryid'];
    $query="delete from tblcategory where freelancercategoryid='$freelancercategoryid'";
    $result=$obj->executequery($query);
    if($result==1)
    {
        echo "<script>alert('deleted successfully');window.location='categoryview.php' </script>";
    }
    else
    {
      echo "<script>alert('Not successfully deleted');window.location='categoryview.php' </script>";

    }

}
?>