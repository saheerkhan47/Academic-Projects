<?php
include("header.php");
?>
<!-- <div class="main-panel"> -->
          <!-- <div class="content-wrapper pb-0"> -->
            <!-- <div class="page-header flex-wrap"> -->



            <?php
// include("header.php");
include("../dboperation.php");
$obj=new dboperation();
  
//  $sql ="SELECT count(*) as bookingcount,doctor_name,department_name FROM tbl_department de 
//  inner join tbl_doctor d on de.department_id=d.department_id inner join tbl_booking b on d.doctor_id=b.doctorid  group by b.doctorid ";



$sql ="SELECT count(*) as Categorycount,Freelancercategoryname FROM tblfreelancerreg f inner join tblcategory c on f.freelancercategoryid=c.freelancercategoryid  group by f.freelancercategoryid";

 $result = $obj->executequery($sql); 
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>    
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['category', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          { 
					echo "['".$row["Freelancercategoryname"]."', ".$row["Categorycount"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage ',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body>  
           <div class="logo">
              <a href="./index.php">
                <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                 <img src="img/logo.png" alt="">&nbsp; &nbsp;</a>
                 </div> 
           <div style="width:900px; margin-top:6%"><br>  
                <h3 align="center">Pie Chart showing the Count category wise Freelancers </h3>  
                <br />  
                <div id="piechart" style="width: 900px; height: 500px;"></div>  
           </div>  
          </div>
      </body>  
 </html>  
</body>
</html>
<?php
// include("footer.php");
?>




              <!-- <h3 class="mb-0"> Hi, welcome back! <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block">Your web analytics dashboard template.</span> -->
              </h3>
              <!-- <div class="d-flex"> -->
                <button type="button" class="btn btn-sm bg-white btn-icon-text border">
                  <!-- <i class="mdi mdi-email btn-icon-prepend"></i> Email </button> -->
                <button type="button" class="btn btn-sm bg-white btn-icon-text border ml-3">
                  <!-- <i class="mdi mdi-printer btn-icon-prepend"></i> Print </button> -->
                <!-- <button type="button" class="btn btn-sm ml-3 btn-success"> Add User </button> -->
              </div>
            </div>
            
              
            
                <!--browser stats ends-->
              </div>
            </div>
          </div>
          <?php
include("footer.php");
?>