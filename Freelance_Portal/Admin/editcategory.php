<?php
include("header.php");
?>
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Category Edit</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Form elements </li>
                </ol>
              </nav>
            </div>
      <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
    <body>
        <form method="post" action="editcategoryaction.php" name="f1" enctype="multipart/form-data">
            <?php
            require_once("../dboperation.php");
            $obj=new dboperation();
            if(isset($_GET['freelancercategoryid']))
            {
                $freelancercategoryid=$_GET['freelancercategoryid'];
                $query="select * from tblcategory where freelancercategoryid=$freelancercategoryid";
                $res=$obj->executequery($query);
                $display=mysqli_fetch_array($res)
                ?>
                 <div class="form-group">
                        <label for="exampleInputUsername1">Category Name</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="categoryname" value="<?php echo $display["freelancercategoryname"];?>"
                        </div><br>
                        <div class="form-group">
                        <label for="exampleInputUsername1">Category Description</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="categorydescription" value="<?php echo $display["freelancercategorydescription"];?>"
                      </div><br>

                      <div class="form-group">
                        <label for="exampleInputUsername1">Category Image</label><br> 
                       <tr>
                       <td>Upload photo</td>
                       <td><input type="file" name="image" value="<?php echo $display["freelancercategoryimage"];?>"
                       <td colspan="2"><img src="../uploads/<?php echo $display['freelancercategoryimage'];?>"style="width: 100px; height:100px;">
                       </td><br>
            </div>

                    
                      <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                      <!-- <button class="btn btn-light">Cancel</button> -->
</table>
<?php
}
?>
<input type="hidden" name="freelancercategoryid" value="<?php echo $display["freelancercategoryid"];?>">
</form>
</div>
</div><br><br><br><br><br>
<?php
include("footer.php");
?>