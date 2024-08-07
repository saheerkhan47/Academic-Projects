<?php
// include("header.php");
session_start();
	?>
  <!-- <br><br><br><br><br><br><br><br><br> -->
  
<style>
@media (min-width: 1025px) {
    .h-custom {
    height: 100vh !important;
    }
    }
    .card-registration .select-input.form-control[readonly]:not([disabled]) {
    font-size: 1rem;
    line-height: 2.15;
    padding-left: .75em;
    padding-right: .75em;
    }
    .card-registration .select-arrow {
    top: 13px;
    }
    
    .gradient-custom-2 {
    /* fallback for old browsers */
    background: #ffffff;
    
    /* Chrome 10-25, Safari 5.1-6 */
    /* background: -webkit-linear-gradient(to right, rgb(5, 251, 157), rgb(245, 239, 239)); */
    
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    /* background: linear-gradient(to right, rgb(5, 5, 5), rgb(300, 300, 300)); */
    }
    
    .bg-indigo {
    background-color:#bb0101;
    }
    @media (min-width: 996px) {
    .card-registration-2 .bg-indigo {
    border-top-right-radius: 15px;
    border-bottom-right-radius: 15px;
    }
    }
    @media (max-width: 996px) {
    .card-registration-2 .bg-indigo {
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    }
    }
</style>
<!-- <link rel="stylesheet" href="freeviewdesign.css"> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<section class="h-100 h-custom gradient-custom-2">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
          <form action="editproaction.php" method="post" enctype="multipart/form-data">
            <div class="row g-0">
              <div class="col-lg-6">
                
                <div class="p-5">
                  <h3 class="fw-normal mb-5" style="color: #080808;">Profile Edit</h3>

                  <div class="mb-4 pb-2">
                    <!-- <select class="select">
                      <option value="1">Title</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                      <option value="4">Four</option>
                    </select> -->
                  </div>
                  
                  <?php

require_once("../dboperation.php");
$obj=new dboperation();
$freelancerid=$_SESSION['loginid'];
 $query="select * from tbldistrict d inner join tbllocation l on d.districtid=l.districtid inner join tblfreelancerreg f on f.locationid=l.locationid inner join tblcategory ca on ca.freelancercategoryid=f.freelancercategoryid inner join tbllogin lo on f.loginid=lo.loginid where f.loginid=$freelancerid";
$result=$obj->executequery($query);
$display=mysqli_fetch_array($result);
$s=1;
                ?>


                  <div class="mb-4 pb-2">
                    
                </div>

                  <div class="column">
                     <div class="col-md-6 mb-4 pb-2">

                      <div class="form-outline">
                
                    Name<input type="text" id="form3Examplea2" name="name" class="form-control form-control-lg" value="<?php echo $display["freelancername"];?>">
                      
                      </div>
                    </div>
                    <div class="col-md-6 mb-4 pb-2">

                      <div class="form-outline">
                      Contact<input type="text" id="form3Examplea2" name="contact" class="form-control form-control-lg" value=<?php echo $display["freelancercontact"];?>>
                     
                      </div>
    
                      
                      <div class="mb-4 pb-2">
                    <div class="form-outline form-white"><br>
                    Email<input type="text" id="form3Examplea2" name="email" class="form-control form-control-lg" value=<?php echo $display["freelanceremail"];?>>
             
                    </div><br>


                    <td>Upload photo</td><br>
                       <td><input type="file" name="image" value="<?php echo $display["image"];?>">
                       <td colspan="2"><img src="../uploads/<?php echo $display['image'];?>"width="180" height="180">
                       </td>
                  </div>
                    </div> 
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-4 pb-2 mb-md-0 pb-md-0">

                      <div class="form-outline">
                        <!-- <input type="text" id="form3Examplev5" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Examplev5">Bussines Arena</label> -->
                      </div>


                      <a href="viewprofile.php">
                     <button type="button" class="btn btn-outline-dark">Back</button></a>

                     <a href="editproaction.php?freelancerid=<?php echo $display["freelancerid"];?>">
                     <button type="submit" class="btn btn-outline-danger">Save profile</button></a>

                     
                    
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
                    House name<input type="text"  name="housename" class="form-control form-control-lg" value=<?php echo $display["housename"];?>>
                    
                    </div>
                  </div>
                  <div class="mb-4 pb-2">
                    <div class="form-outline form-white">
                    Pincode<input type="text" id="form3Examplea2" name="pincode" class="form-control form-control-lg" value=<?php echo $display["pincode"];?>>
                    
                    </div>
                  </div>
                  <div class="mb-4 pb-2">
                    <div class="form-outline form-white">
                    ID proof<input type="text" id="form3Examplea2" name="idproof" class="form-control form-control-lg" value=<?php echo $display["idproof"];?>>
                    

                    </div>
                  </div>
                  <!-- <div class="mb-4 pb-2">
                    <div class="form-outline form-white">
                    ID proof<input type="text" id="form3Examplea2" name="idproof" class="form-control form-control-lg" value=<?php echo $display["idproof"];?>>
                    
                    
                    </div>
                  </div> -->
                  <div class="mb-4 pb-2">
                    <div class="form-outline form-white">
                    <div class="form-group">
                    Choose category<select class="form-control" name="freelancercategoryname" id="freelancercategoryid" >
                      <option value="<?php echo $display['freelancercategoryid']; ?>"><?php echo $display['freelancercategoryname'];?></option>
                      <?php
                      include_once("../dboperation.php");
                      $obj=new dboperation();
                      $sql="select * from tblcategory where freelancercategoryid not in(".$display['freelancercategoryid'].")";
                      $res=$obj->executequery($sql);
                      while($display1= mysqli_fetch_array($res))
                        {
                      ?>
                      <option value="<?php echo $display1["freelancercategoryid"]?>"  > 
                      <?php
                      echo $display1["freelancercategoryname"]?> </option> 
                      <?php
                        }
                      ?>
                  
                      </select>
                    </div>
                  </div><br>
                  <div class="form-group">
                  Choose District<select class="form-control" name="districtname" id="districtid" >
                      <option value="<?php echo $display['districtid']; ?>"><?php echo $display['districtname'];?></option>
                      <?php
                      include_once("../dboperation.php");
                      $obj=new dboperation();
                      $sql="select * from tbldistrict where districtid not in(".$display['districtid'].")";
                      $res=$obj->executequery($sql);
                      while($display2= mysqli_fetch_array($res))
                        {
                      ?>
                      <option value="<?php echo $display2["districtid"]?>"> 
                     <?php echo $display2['districtname']; ?> </option> 
                      <?php
                        }
                      ?>
                      </select>


                      </div>
                  </div>
                  <div class="mb-4 pb-2">
                    <div class="form-outline form-white">
                    <div class="form-group">
                    Choose Location<select class="form-control" name="locationname" id="locationid" >
                      <option value="<?php echo $display['locationid']; ?>"><?php echo $display['locationname'];?></option>
                      <?php
                      include_once("../dboperation.php");
                      $obj=new dboperation();
                      $sql="select * from tbllocation where locationid not in(".$display['locationid'].")";
                      $res=$obj->executequery($sql);
                      while($display3= mysqli_fetch_array($res))
                        {
                      ?>
                      <option value="<?php echo $display3["locationid"]?>"> 
                      <?php
                      echo $display3["locationname"]?> </option> 
                      <?php
                        }
                      ?>
                  
                      </select>
                      
                  <div class="form-group">
                          <!-- Registration date<input type="text" class="form-control form-control-lg" name="date" value="<?php echo $display["registereddate"];?>"> -->
                </div>
              </div>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
// include("footer.php");
	?>