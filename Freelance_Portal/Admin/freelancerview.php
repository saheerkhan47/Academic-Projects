<?php
include("header.php");
?>
<div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Freelancer View</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <!-- <li class="breadcrumb-item"><a href="#">Tables</a></li> -->
                  <!-- <li class="breadcrumb-item active" aria-current="page"> category tables </li> -->
                </ol>
              </nav>
            </div>
            <?php
            require_once("../dboperation.php");
            $obj=new dboperation();
            $query="select l.*,h.*  from tblfreelancerreg h inner join tbllogin l on h.loginid=l.loginid where l.status='Not Confirmed'";
            $result=$obj->executequery($query);
            $s=1;
            ?>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <!-- <h4 class="card-title">Striped Table</h4> -->
                    <!-- <p class="card-description"> Add class <code>.table-striped</code> -->
                    </p>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Sl.No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Imege</th> 
                                <th scope="col">Email</th>
                                
                                <th scope="col">View More</th>
                               
                            </tr>
                        </thead>
                        <?php
                while($display=mysqli_fetch_array($result))
                {
                ?>
                <tr>
                    <td><?php echo $s++;?></td>
                    <td><?php echo $display["freelancername"];?></td>
                    <td><?php echo $display["freelancercontact"];?></td>
                    <td><img src="../uploads/<?php echo $display["image"]; ?>"width="80" height="80"></td>
                    <td><?php echo $display["freelanceremail"];?></td>
                    <td><button type="button"
                    class="feather icon-edit"><a href="freelancerviewmore.php?hid=<?php echo $display["freelancerid"];?>">View More</a></td>
                    
                </tr>
                <?php
                }
                ?>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
    </div>
<?php
include("footer.php");
?>