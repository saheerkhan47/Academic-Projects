<?php
include("header.php");
?>
<div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Category Details</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> category tables </li>
                </ol>
              </nav>
            </div>
            <?php
            require_once("../dboperation.php");
            $obj=new dboperation();
            $query="select * from tblcategory";
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
                            <th>Sl No:</th>
                            <th>Freelance categoryname</th>
                            <th>Freelance categorydescription</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                    
                                      <?php
                          while($display=mysqli_fetch_array($result))
                          {
                              ?>
                        <tbody>
                          <tr>
                          <td><?php echo $s++;?> </td>
    <td><?php echo $display["freelancercategoryname"];?> </td>
    <td><?php echo $display["freelancercategorydescription"];?></td>
    <td><img src="../uploads/<?php echo $display["freelancercategoryimage"]; ?>"width="80" height="80"></td>
    <td><a href="editcategory.php?freelancercategoryid=<?php echo $display["freelancercategoryid"];?>">Edit</a></td>
    <td><a href="deletecategory.php?freelancercategoryid=<?php echo $display["freelancercategoryid"];?>">Delete</a></td>
                          </tr>
                        </tbody>
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