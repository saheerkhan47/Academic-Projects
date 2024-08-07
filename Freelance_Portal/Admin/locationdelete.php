<?php
include("../dboperation.php");
$obj=new dboperation();
if(isset($_GET['locationid']))
{
    $locationid=$_GET['locationid'];
    $query="delete from tbllocation where locationid=$locationid";
    $res=$obj->executequery($query);
    if($res==1)
    {
        echo "<script>alert(' Successfully Deleted');window.location='locationview.php' </script>";
    }
    else
    {
        echo "<script>alert('Not Successfully Deleted');window.location='locationview.php' </script>";
    } 
}
?>