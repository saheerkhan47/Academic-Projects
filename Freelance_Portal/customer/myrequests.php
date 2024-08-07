<?php
// session_start();
include("header.php");
	?><br><br><br><br><br>
    <style>
        
h1{
  font-size: 30px;
  color: #fff;
  text-transform: uppercase;
  font-weight: 300;
  text-align: center;
  margin-bottom: 15px;
}
table{
  width:100%;
  table-layout: fixed;
}
.tbl-header{
  background-color: rgba(255,255,255,0.3);
 }
.tbl-content{
  height:300px;
  overflow-x:auto;
  margin-top: 0px;
  border: 1px solid rgba(255,255,255,0.3);
}
th{
  padding: 20px 15px;
  text-align: left;
  font-weight: 500;
  font-size: 20px;
  color: white;
  text-transform: uppercase;
}
td{
  padding: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: 300;
  font-size: 20px;
  color: #fff;
  border-bottom: solid 1px rgba(255,255,255,0.1);
}


/* demo styles */

/* @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
body{
  background: -webkit-linear-gradient(left, #25c481, #25b7c4);
  background: linear-gradient(to right, #25c481, #25b7c4);
  font-family: 'Roboto', sans-serif;
} */
section{
  margin: 50px;
}


/* follow me template */
.made-with-love {
  margin-top: 40px;
  padding: 10px;
  clear: left;
  text-align: center;
  font-size: 10px;
  font-family: arial;
  color: #fff;
}
.made-with-love i {
  font-style: normal;
  color: #F50057;
  font-size: 20px;
  position: relative;
  top: 2px;
}
.made-with-love a {
  color: #fff;
  text-decoration: none;
}
.made-with-love a:hover {
  text-decoration: underline;
}


/* for custom scrollbar for webkit browser*/

::-webkit-scrollbar {
    width: 6px;
} 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
} 
::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
}
    </style>
<section>
  <!--for demo wrap-->
  <h1>My Work Details</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>worktitle</th>
          <th>descripion</th>
          <th>freelancer name</th>
          <th>expecteddate</th>
          <th>requesteddate</th>
          <th>Amout</th>
          <!-- <th>requeststatus<th> -->
          <th>Remark</th>
          <th>Actions</th>

        </tr>
      </thead>
      <?php
            require_once("../dboperation.php");
            $obj=new dboperation();
			$freelancerid=$_SESSION['loginid'];
              $query = "select * from tblworkrequest wr inner join tblfreelancerreg u on u.loginid=wr.freelancerid where wr.userid='$freelancerid' and requeststatus='Accepted' or requeststatus='Progress updated ' or requeststatus='Rejected'";
            $result=$obj->executequery($query);
            while($display=mysqli_fetch_array($result))
            {
            ?>
      <tbody>
        <tr>
          <td><?php echo $display["worktittle"];?></td>
          <td><?php echo $display["description"];?> </td>
          <td><?php echo $display["freelancername"];?> </td>
          <td><?php echo $display["expecteddate"];?> </td>
          <td><?php echo $display["requesteddate"];?> </td>
          <td><?php echo $display["workprice"];?> </td>
          <!-- <td><?php echo $display["requeststatus"];?> </td> -->
          <td><?php echo $display["remark"];?> </td>
          <td>
          <?php
          if($display["requeststatus"]=="Accepted"){
          ?>
          <a href="advancepayment.php?requestid=<?php echo $display["requestid"];?>&workprice=<?php echo $display["workprice"];?>">
                       <button type="button" onclick="return confirm('Are you confirm the work ,Then make an advance payment')" class="btn btn-outline-danger">Confirm</button></a>
                        <a href="cancelwork.php?requestid=<?php echo $display["requestid"];?>">
                        <button type="button" class="btn btn-outline-success">Cancel</button></a></td>
                        <?php
          } else if($display["requeststatus"]=="Rejected"){
            
          }
          else {
            ?>
            <a href="balancepayment.php?requestid=<?php echo $display["requestid"];?>&workprice=<?php echo $display["workprice"];?>">
                       <button type="button" onclick="return confirm('Confirm your balance payment')" class="btn btn-outline-danger">Pay Now</button></a>
                        </td>
            <?php

          }
          ?>
        </tr>
        
        
      </tbody>
      <?php
            }
   ?>  
    </table>
  </div>
        
</section>


<!-- follow me template -->
<div class="made-with-love">

  <!-- <a target="_blank" href="https://codepen.io/nikhil8krishnan">Nikhil Krishnan</a> -->
</div>
<?php
include("footer.php");
	?>