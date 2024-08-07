<?php
include("header.php");
?>
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Category Registration</h3>
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

                    <form class="forms-sample" action="categoryaction.php" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Category Name</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="categoryname" placeholder="Enter Your Category" 
                         required pattern="^[a-zA-Z]*$"
                         title="please fill out of this feild">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputUsername1">Category Description</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="categorydescription" placeholder="Enter Description" required 
          
                         title="please fill out of this feild">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Category Image</label><br>
                       <tr>
                       <td>Upload photo</td>
                       <td><input type="file" name="image" required pattern=""
                         title="please fill out of this feild"></td>
                       </tr>

                      <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
          </div>
          <?php
include("footer.php");
?>