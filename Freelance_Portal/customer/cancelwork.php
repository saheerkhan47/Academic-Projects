<?php
   include("../dboperation.php");
   $obj=new dboperation();
   $requestid=$_GET["requestid"];
   $status="cancelled";
  $sql="update tblworkrequest set requeststatus='$status' where requestid='$requestid'";
   $result=$obj->executequery($sql); 
   if($result==1)
   {
    echo "<script>alert('updated succusfully');window.location='myrequests.php'</script>";
   }
   else
   {
    echo "failed";
   }
?>