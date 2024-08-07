<?php
include("header.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Freelancer portal</title>
</head>

<body>
<form action="Excel/excel_free.php" method="post">
<div class="logo">
              <a href="./index.php">
                <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                 <img src="img/logo.png" alt="">&nbsp; &nbsp;</a>
                 </div>
  <div class="container" style="width:100%;margin-left:15%;margin-bottom: 5%;" >
  <div class="row">
  <div class="col-md-12" style="box-shadow: 2px 2px 10px #1b93e1; border-radius:15px; top: 106px;    margin-bottom: 59px;">
  <div class="row" style="margin-left: -173%;margin-top: 2%;margin-bottom: -5%;">
      <input type="submit" name="addnew" value="Export" class="btn btn-primary" style="margin-left:63%">
    </div>
  <h2 style="text-align: center;margin-top: 6%;font-family: fantasy;">FREELANCER REPORT</h2>
  <div class="form-horizontal" style="margin-left:0px;">
  <table class="table table-hover" style="border: 2px solid #adaaaa; box-shadow: 3px 3px 11px #777777; margin-bottom:7%">

  <tr>
                          <th> Sl.No </th>
                          <th> freelancer Name  </th> 
                          <!-- <th> customerid </th> -->
                          <th> Contact </th>
                          <th> Email </th>
                          <!-- <th> Email </th>
                          <th> Phone </th>
                          <th> Designation </th>
                          <th> Qualification </th> -->
                          
                          
                          
                        </tr>
   
    <?php
include("../dboperation.php");
$obj=new dboperation();
$s=1;
//$sql="select de.department_name,d.* from tbl_doctor d inner join tbl_department de on d.department_id=de.department_id";
$sql ="SELECT count(*) as custcount,freelancername,freelancercontact,freelanceremail FROM tblfreelancerreg group by freelancerid";

$result=$obj->executequery($sql);
   while($display=mysqli_fetch_array($result))
   {
    ?>
	<tr>
                          <td class="py-1"><?php echo $s++;?></td>
                          <td> <?php echo $display["freelancername"];?></td>
                          <!-- <td> <?php echo $display["userid"];?></td> -->
                          <td> <?php echo $display["freelancercontact"];?></td>
                          <td> <?php echo $display["freelanceremail"];?></td>
                          <!-- <td> <?php echo $display["designation"];?></td> -->
                          <!-- <td> <?php echo $display["qualification"];?></td> -->
                          
                          
                      </tr>
                      <?php  
	
  }
  ?>
</table>

</div>
  </div>
  </div>
  <div> </div>
  </div>
  </div>
</form>
</body>
</html>
<?php
include("footer.php");
?>