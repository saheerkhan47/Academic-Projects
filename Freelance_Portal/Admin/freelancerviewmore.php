<link rel="stylesheet" href="freeviewdesign.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<section class="h-100 h-custom gradient-custom-2">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
          <!-- <form action="parentregaction.php" method="post"> -->
            <div class="row g-0">
              <div class="col-lg-6">
                
                <div class="p-5">
                  <h3 class="fw-normal mb-5" style="color: #080808;">Contact Details</h3>

                  <div class="mb-4 pb-2">
                    <!-- <select class="select">
                      <option value="1">Title</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                      <option value="4">Four</option>
                    </select> -->
                  </div>
                  <?php

                  include("../dboperation.php");
            $obj=new dboperation();
            if(isset($_GET['hid']))
             
                $freelancerid=$_GET['hid'];
                $query="select d.*,l.*,f.*,lo.*,ca.* from tbldistrict d inner join tbllocation l on d.districtid=l.districtid inner join tblfreelancerreg f on f.locationid=l.locationid inner join tblcategory ca on ca.freelancercategoryid=f.freelancercategoryid inner join tbllogin lo on f.loginid=lo.loginid where f.freelancerid=$freelancerid";
                $res=$obj->executequery($query);
                $display=mysqli_fetch_array($res);
                ?>
                  <div class="mb-4 pb-2">
                    
                </div>

                  <div class="column">
                     <div class="col-md-6 mb-4 pb-2">

                      <div class="form-outline">
                
                    Name<input type="text" id="form3Examplea2" name="name" class="form-control form-control-lg" value="<?php echo $display["freelancername"];?>" readonly>
                      
                      </div>
                    </div>
                    <div class="col-md-6 mb-4 pb-2">

                      <div class="form-outline">
                      Contact<input type="text" id="form3Examplea2" name="contact" class="form-control form-control-lg" value=<?php echo $display["freelancercontact"];?> readonly>
                     
                      </div>
    
                      
                      <div class="mb-4 pb-2">
                    <div class="form-outline form-white"><br>
                    Email<input type="text" id="form3Examplea2" name="email" class="form-control form-control-lg" value=<?php echo $display["freelanceremail"];?> readonly>
             
                    </div><br>
                    
                    image<br><img src="../uploads/<?php echo $display["image"];?>"width="180" height="180">
                  </div>
                    </div> 
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-4 pb-2 mb-md-0 pb-md-0">

                      <div class="form-outline">
                        <!-- <input type="text" id="form3Examplev5" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Examplev5">Bussines Arena</label> -->
                      </div>

                      <a href="rejectfree.php?loginid=<?php echo $display["loginid"];?>">
                       <button type="button" class="btn btn-outline-danger">Reject</button>
                        <a href="acceptfree.php?loginid=<?php echo $display["loginid"];?>">
                        <button type="button" class="btn btn-outline-success">Accept</button></a>
                    
                      </div>
                  
                    <div class="col-md-6">
                    </div>
                  </div>

                </div>
              </div>
              <div class="col-lg-6 bg-indigo text-white">
                <div class="p-5">

        
             
                  <h3 class="fw-normal mb-5">General Information</h3>
                  
                  <div class="mb-4 pb-2">
                    <div class="form-outline form-white">
                    House name<input type="text" id="form3Examplea2" name="housename" class="form-control form-control-lg" value=<?php echo $display["housename"];?> readonly>
                    
                    </div>
                  </div>
                  <div class="mb-4 pb-2">
                    <div class="form-outline form-white">
                    Pincode<input type="text" id="form3Examplea2" name="pincode" class="form-control form-control-lg" value=<?php echo $display["pincode"];?> readonly>
                    
                    </div>
                  </div>
                  <div class="mb-4 pb-2">
                    <div class="form-outline form-white">
                    ID proof<input type="text" id="form3Examplea2" name="idproof" class="form-control form-control-lg" value=<?php echo $display["idproof"];?> readonly>
                    
                    </div>
                  </div>
                  <div class="mb-4 pb-2">
                    <div class="form-outline form-white">
                    <div class="form-group">
                          Category<input type="text" class="form-control form-control-lg" name="categoryname" value="<?php echo $display["freelancercategoryname"];?>" readonly>
                    
                    </div>
                  </div><br>
                  <div class="form-group">
                          District<input type="text" class="form-control form-control-lg" name="district" value="<?php echo $display["districtname"];?>" readonly>
                       </div><br>
                       <div class="form-group">
                          Location<input type="text" class="form-control form-control-lg" name="location" value="<?php echo $display["locationname"];?>" readonly>
                          </div><br>
                  <div class="form-group">
                          Registration date<input type="text" class="form-control form-control-lg" name="date" value="<?php echo $display["registereddate"];?>" readonly>
                </div>
              </div>
            </div>
          </div>
          <!-- </form> -->
        </div>
      </div>
    </div>
  </div>
</section>