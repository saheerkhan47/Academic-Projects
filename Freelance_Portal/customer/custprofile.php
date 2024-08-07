<?php
// include("header.php");
session_start();
	?>
<style>
.profile-head {
    transform: translateY(5rem)
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
.profile-tab label{
    font-weight: 600;
}

.cover {
    background-image: url(https://images.unsplash.com/photo-1530305408560-82d13781b33a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80);
    background-size: cover;
    background-repeat: no-repeat
}

body {
    background: #04160d;
    background: linear-gradient(to top, rgb(0, 0, 0), rgb(200, 200, 200));
    min-height: 100vh;
    overflow-x:hidden;
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<div class="row py-5 px-4"> 
    <div class="col-md-5 mx-auto"> 
        <!-- Profile widget  -->
        <div class="bg-white shadow rounded overflow-hidden"> 
        <?php
            require_once("../dboperation.php");
            $obj=new dboperation();
            $userid=$_SESSION['loginid'];
            $query="select * from tbldistrict d inner join tbllocation l on d.districtid=l.districtid inner join tbluser f on f.locationid=l.locationid inner join tbllogin lo on f.loginid=lo.loginid where f.loginid=$userid";
            $result=$obj->executequery($query);
            $display=mysqli_fetch_array($result);
            $s=1;
            ?>
            <div class="px-4 pt-0 pb-4 cover"> 
                <div class="media align-items-end profile-head">
                    <div class="profile mr-3">
                        <!-- <img src="../uploads/<?php echo $display["image"]; ?>" alt="..."  width="150" class="rounded mb-2 img-thumbnail"> -->
  
                        <!-- <a href="#" class="btn btn-outline-dark btn-sm btn-block">Edit profile</a> -->
                
                    
                </div> 

                <div class="media-body mb-5 text-white">

                         <h4 class="mt-0 mb-0"><?php echo $display['username'] ?></h4> 
                         <p class="small mb-4">
                             <i class="fas fa-map-marker-alt mr-2"></i><?php echo $display['contact'] ?></p>
                             </div> 
                            </div>
                         </div> 
                         <div class="bg-light p-4 d-flex justify-content-end text-center"> 
                            <ul class="list-inline mb-0"> <li class="list-inline-item">
                                 </ul>
                                         </div>

                                         



                                          <div class="px-4 py-3"> 
                                            <h5
                                             class="mb-0">About</h5>
                                             <div class="p-4 rounded shadow-sm bg-light">

                                             <div class="tab-content profile-tab" id="myTabContent">



                                             <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6" name="name">
                                                <p><?php echo $display['username'] ?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Conctact</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $display['contact'] ?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $display['email'] ?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>House Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $display['housename'] ?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>District</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $display['districtname'] ?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Location</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $display['locationname'] ?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Pincode</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $display['pincode'] ?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Id proof</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $display['idproof'] ?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Register date</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $display['registereddate'] ?></p>
                                            </div>
                                        </div>
                                        
    
                                             </div> 
                                             <a href="custeditprofile.php" class="btn btn-outline-dark btn-sm btn-block">Edit Profile </a>
                                             <a href="changepass.php" class="btn btn-outline-dark btn-sm btn-block">Change Password</a>
                                             <a href="index.php" class="btn btn-outline-dark btn-sm btn-block">HOME</a>
                                                    </div> 
                                                </div> 
                                            </div> 
                                        </div>
</div>
<?php
// include("footer.php");               
	?>

                <!-- </tbody> -->