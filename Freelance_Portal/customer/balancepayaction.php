<?php
   include("../dboperation.php");
   $obj=new dboperation();
   $requestid=$_POST["requestid"];
   
   $paydate=date('Y-m-d');

   $status="Work completed";

   $sql1="update tblworkrequest set requeststatus='$status' where requestid='$requestid'";
   $result=$obj->executequery($sql1); 

    $sql="update tblpayment set paymentstatus='Full payment completed' where requestid='$requestid'";
   $result=$obj->executequery($sql); 
   {
    echo "<script>alert('Work completed successfully');window.location='myrequests.php'</script>";
   }
   
?>