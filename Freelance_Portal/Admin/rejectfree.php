<?php
   include("../dboperation.php");
   $obj=new dboperation();
   $loginid=$_GET["loginid"];
   echo $sql="update `tbllogin` set `status`='Rejected' where loginid='$loginid'";
   $result=$obj->executequery($sql); 
?>
<script>window.location='freelancerview.php'</script>