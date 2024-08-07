<?php
   include("../dboperation.php");
   $obj=new dboperation();
   $requestid=$_GET["requestid"];
   $workamount=$_POST["workamount"];
   $status="Accepted";
   $remark=$_POST['workdesc'];
  $sql="update tblworkrequest set requeststatus='$status',remark='$remark',workprice='$workamount' where requestid='$requestid'";
   $result=$obj->executequery($sql); 
   if($result==1)
   {
    echo "<script>alert('updated succusfully');window.location='workrequests.php'</script>";
   }
   else
   {
    echo "failed";
   }
?>