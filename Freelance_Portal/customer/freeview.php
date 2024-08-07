<?php
include("header.php");
	?>
<style>
/* body{ */
    /* margin-top:20px; */
    /* background:#eee;     */
/* } */
a {
    color: #f96333;
}
.m-t-5{
    margin-top: 5px;   
}
.card {
    background: #fff;
    margin-bottom: 20px;
    transition: .5s;
    border: 0;
    border-radius: .1875rem;
    display: inline-block;
    position: relative;
    width: 100%;
    box-shadow: none;
}
.card .body {
    font-size: 18px;
    color: #111111;
    padding: 20px;
    font-weight: 400;
}
.profile-page .profile-header {
    position: relative;
}

.profile-page .profile-header .profile-image img {
    border-radius: 50%;
    width: 140px;
    border: 3px solid #fff;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23)
}

.profile-page .profile-header .social-icon a {
    margin: 0 5px
}

.profile-page .profile-sub-header {
    min-height: 60px;
    width: 100%
}

.profile-page .profile-sub-header ul.box-list {
    display: inline-table;
    table-layout: fixed;
    width: 100%;
    background: #eee
}

.profile-page .profile-sub-header ul.box-list li {
    border-right: 1px solid #e0e0e0;
    display: table-cell;
    list-style: none
}

.profile-page .profile-sub-header ul.box-list li:last-child {
    border-right: none
}

.profile-page .profile-sub-header ul.box-list li a {
    display: block;
    padding: 15px 0;
    color: #424242
}

</style>
<br><br><br><br><br>    
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container profile-page">
    <div class="row">
        <div class="col-xl-6 col-lg-7 col-md-12">
            <div class="card profile-header">
                <div class="body">
                <?php
                        require_once("../dboperation.php");
                        $obj=new dboperation();
                        $query = "select * from tblfreelancerreg";
                        $result=$obj->executequery($query);
                        while($display=mysqli_fetch_array($result))
                        {
                        ?>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="profile-image float-md-right"> <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt=""> </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12">
                            <h4 class="m-t-0 m-b-0"><strong><?php echo $display['freelancername']?></strong>
                            <span class="job_post"><?php echo $display['freelanceremail']?></span>
                            <!-- <p>795 Folsom Ave, Suite 600 San Francisco, CADGE 94107</p> -->
                            <div>
                                <button class="btn btn-primary btn-round">viewmore</button>
                                <button class="btn btn-primary btn-round btn-simple">Apply requst</button>
                            </div>
                            <p class="social-icon m-t-5 m-b-0">
                                <!-- <a title="Twitter" href="javascript:void(0);"><i class="fa fa-twitter"></i></a>
                                <a title="Facebook" href="javascript:void(0);"><i class="fa fa-facebook"></i></a>
                                <a title="Google-plus" href="javascript:void(0);"><i class="fa fa-twitter"></i></a>
                                <a title="Behance" href="javascript:void(0);"><i class="fa fa-behance"></i></a>
                                <a title="Instagram" href="javascript:void(0);"><i class="fa fa-instagram "></i></a> -->
                            </p>
                        </div>  
                        
                    </div>
                    <?php
        }
        ?>             
                </div>                    
            </div>
        </div>
       
        
<?php
include("footer.php");
	?>