<?php
   include("../dboperation.php");
   $obj=new dboperation();
   $requestid=$_POST["requestid"];
   $adminamount=$_POST["adminamount"];
   $balamount=$_POST["balamount"];
   $freelanceramount=$_POST["freelanceramount"];
   $fromaccno=$_POST["fromaccno"];
   $toaccno=$_POST["toaccno"];
   $adminaccno=123456781236264;
   
   $paydate=date('Y-m-d');

   $status="Confirmed";

   $sql="update tblworkrequest set requeststatus='$status' where requestid='$requestid'";
   $result=$obj->executequery($sql); 

    $sql="insert into tblpayment (requestid,paymentdate,advanceamount,balanceamount,paymentstatus,fromaccount,toaccount,role) values ('$requestid','$paydate','0','$adminamount','Adminprice completed','$fromaccno','$adminaccno','Admin') ";
   $result=$obj->executequery($sql); 

    $sql="insert into tblpayment (requestid,paymentdate,advanceamount,balanceamount,paymentstatus,fromaccount,toaccount,role) values ('$requestid','$paydate','$freelanceramount','$balamount','Advancepayment completed','$fromaccno','$toaccno','Freelancer')";
   $result=$obj->executequery($sql); 


   if($result==1)
   {
    echo "<script>alert('Advance payment succusfully Completed');window.location='myrequests.php'</script>";
   }
   
   else
   {
    echo "failed";
   }
?>