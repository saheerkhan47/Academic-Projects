<?php
include("header.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>>Sales Management</title>
</head>

<body>
<form action="Excel/excel_product.php" method="post">
<div class="logo">
              <a href="./index.php">
                <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                 <img src="img/logo.png" alt="">&nbsp; &nbsp;</a>
                 </div>
  <div class="container" style="width:100%;margin-left:15%;margin-bottom: 5%;" >
  <div class="row">
    
  <div class="col-md-12" style="box-shadow: 2px 2px 10px #1b93e1; border-radius:15px; top: 106px;    margin-bottom: 59px;">
  <div class="row" style="margin-left: -173%;margin-top: 2%;margin-bottom: -5%;">
    </div>

  <h2 style="text-align: center;margin-top: 6%;font-family: fantasy;">Sales Report</h2>
  From:<input type="date" name="fromdate" class="form-control" required> To:<input type="date" name="todate" class="form-control" required>
  <input type="submit" name="addnew" value="Export" class="btn btn-primary" style="margin-left:0%"><br><br>

  <div class="form-horizontal" style="margin-left:0px;">
  <table class="table table-hover" style="border: 2px solid #adaaaa; box-shadow: 3px 3px 11px #777777; margin-bottom:7%">

  <tr>
                          <th> Sl.No </th>
                          <th> product Name </th> 
                          <th> Count </th>
                          <!-- <th> Email </th>
                          <th> Phone </th>
                          <th> Designation </th>
                          <th> Qualification </th> -->
                          
                          
                          
                        </tr>
   
    <?php
include("../dboperation.php");
$obj=new dboperation();
$s=1;
$sql="SELECT count(*) as Sellcount,Productname FROM tbl_product p INNER JOIN tbl_request r on p.productid=r.productid  where r.requeststatus='Accepted' or r.requeststatus='Completed' GROUP by p.productid";
$result=$obj->executequery($sql);
   while($display=mysqli_fetch_array($result))
   {
    ?>
	<tr>
                          <td class="py-1"><?php echo $s++;?></td>
                          <td> <?php echo $display["Productname"];?></td>
                          <td> <?php echo $display["Sellcount"];?></td>
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