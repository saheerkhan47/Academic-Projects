<?php
include("header.php");
?>
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">District Registration</h3>
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

                    <form class="forms-sample" action="districtaction.php" method="post">
                      <div class="form-group">
                        <label for="exampleInputUsername1">District Name</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="districtname" placeholder="Enter district name" required/>
                      </div>
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