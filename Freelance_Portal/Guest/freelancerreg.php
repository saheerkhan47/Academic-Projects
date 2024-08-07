<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <section class="h-100 h-custom gradient-custom-2">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="flregdesign.css">
</head>
<body>
</body>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome</h3>
                        <p>You are 30 seconds away from earning your own money!</p>
                        <a href="login.php">
                        <input type="submit" name="" value="Login"/><br/>
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Customer</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Freelancer</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <h3 class="register-heading">Apply as a Freelancer</h3>

                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <form action="freelanceraction.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Name *" name="name" required pattern="^[A-Z][a-zA-Z]*$"
                title="Must start with capital letter followed by upper or lowercase letters"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="House Name*" name="house"  required pattern="^[A-Z][a-zA-Z]*$"
                title="Must start with capital letter followed by upper or lowercase letters"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="6" maxlength="6"class="form-control" placeholder="Pincode *" name="pin" required />
                                        </div>
                              
                                        <div class="form-group">
                                                <select class="form-control" name="ddldistrict1" id="ddldistrict1" onchange="getlocation(this.value)" required>
                                                <option>--------Select District-----------</option>
                                                <?php
                                                include_once("../dboperation.php");
                                                $obj=new dboperation();
                                                $sql="select * from tbldistrict";
                                                $res = $obj->executequery($sql);
                                                while($display= mysqli_fetch_array($res))
                                               {
                                             ?>
                                             <option value="<?php echo $display["districtid"]?>"> 
                                             <?php
                                             echo $display["districtname"]?> </option> 
                                             <?php
                                             }
                                             ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" minlength="12" maxlength="12"class="form-control" placeholder="ID proof *" name="idproof" required/>
                                        </div>
                                        <div class="form-group">
                                            Insert Your Image<input type="file" class="form-control"  placeholder="Id proof *" name="image" required />
                                        </div>
                                        <div class="form-group">
                                            <div class="maxl">
                                                <!-- <label class="radio inline" for="male">  -->
                                                    <!-- <input type="radio" name="gender" id="male" value="male" checked> -->
                                                    <!-- <span> Male </span>  -->
                                                </label>
                                                <!-- <label class="radio inline" for="female">  -->
                                                    <!-- <input type="radio" name="gender" id="female" value="female"> -->
                                                    <!-- <span>Female </span>  -->
                                                </label>
                                            </div>
                                        </div>
                                            
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Your Email *" name="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
                                            title="must enter a valid email address">
                                           </td>
                                        <required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="10" class="form-control" placeholder="Your Phone *" name="phn"  required/>
                                        </div>
                                        <div class="form-group">
                                            
                                    
                                                <select class="form-control" name="freelancercategoryid" id="freelancercategoryid" required>
                                                <option>--------Select Category-----------</option>
                                                <?php
                                                include_once("../dboperation.php");
                                                $obj=new dboperation();
                                                $sql="select * from tblcategory";
                                                $res=$obj->executequery($sql);
                                                while($display= mysqli_fetch_array($res))
                                                 {
                                                ?>
                                                <option value="<?php echo $display["freelancercategoryid"]?>"> 
                                                <?php
                                                echo $display["freelancercategoryname"]?> </option> 
                                                <?php
                                                 }
                                                ?>
                                            
                                                </select>
                                        </div>
                                        <div class="form-group" id="locationhandi"> 

                                        <select class="form-control" id="ddllocationh" name="ddllocationh" required>
                                                <option>--------Select Location-----------</option>
                                                <?php
                                                include_once("../dboperation.php");
                                                $obj=new dboperation();
                                                $sql="SELECT * FROM tbllocation";
                                                $res = $obj->executequery($sql);
                                                while($display=mysqli_fetch_array($res))
                                               {
                                             ?>
                                             <option value="<?php echo $display["locationid"];?>"> 
                                             <?php
                                             echo $display["locationname"];?>
                                             <?php
                                             }
                                             ?>
                                            </select>
                                        </div> 
                                        <br>
                                        <form action="loginprocess_new.php" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control"  placeholder="username *" name="username" id="username"  required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="password *" name="password" id="password" required />
                                        </div>
                                                
                                        <input type="submit" class="btnRegister"  value="Register"/>
                                            </form>
        
                                    </div>
                                </div>
                            </div>


                            
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3  class="register-heading">Apply as a Customer</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <form action="useraction.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Name *" name="name" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="House Name*" name="house" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="6" maxlength="6" class="form-control" placeholder="Pincode *" name="pin" required/>
                                        </div>
                              
                                       <div class="form-group">
                                                <select class="form-control" name="ddldistrict" id="ddldistrict" required>
                                                <option>--------Select District-----------</option>
                                                <?php
                                                include_once("../dboperation.php");
                                                $obj=new dboperation();
                                                $sql="select * from tbldistrict";
                                                $res = $obj->executequery($sql);
                                                while($display= mysqli_fetch_array($res))
                                               {
                                             ?>
                                             <option value="<?php echo $display["districtid"]?>"> 
                                             <?php
                                             echo $display["districtname"]?> </option> 
                                             <?php
                                             }
                                             ?>
                                            </select>
                                        </div>
                                        <div class="form-group"><br>

                                            <input type="text" class="form-control"  placeholder="username *" name="username" id="username" required />
                                        </div>
                                        <div class="form-group">
                                            <div class="maxl">
                                                <!-- <label class="radio inline" for="male">  -->
                                                    <!-- <input type="radio" name="gender" id="male" value="male" checked> -->
                                                    <!-- <span> Male </span>  -->
                                                </label>
                                                <!-- <label class="radio inline" for="female">  -->
                                                    <!-- <input type="radio" name="gender" id="female" value="female"> -->
                                                    <!-- <span>Female </span>  -->
                                                </label>
                                            </div>
                                        </div>
                                            
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Your Email *" name="email"   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
                                            title="must enter a valid email address">
                                           </td>
                                        <required/> 
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="10" class="form-control" placeholder="Your Phone *" name="phn"required />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="12" maxlength="12" class="form-control" placeholder="ID proof *" name="idproof" required/>
                                        </div>

                                        <!-- <div class="form-group" id="ddllocation"> -->
                                        <!-- <select class="form-control" name="locationid" id="locationid" required> -->
                                                <!-- <option>--------Select Location-----------</option> -->
                                                <?php
 $sql1="select * from tbllocation";

 $result1=$obj->executequery($sql1);
?>

<select name="ddllocation" id="ddllocation" class="form-control" required>
<option value="0">--select--</option>
<?php
while($r1=mysqli_fetch_array($result1))
{
?>

<option value="<?php echo $r1["locationid"];?>"><?php echo $r1["locationname"];?></option>
<?php
}
	
?>
</select>
                             <div class="form-group"><br><br>
                                
                                <input type="password" class="form-control" placeholder="password *" name="password" id="password" required/>
                            </div>
                                        <input type="submit" class="btnRegister"  value="Register"/>
                                         </form>
                                    </div>
                                </div>
                            </div>
                             <!-- End of customer -->
                        </div>
                    </div>
                </div>

            </div>
    </body>
</html>

<!-- customer ajax -->

<script>
		$(document).ready(function() 
        {
            // alert("a")
			$("#ddldistrict").change(function() 
            {
            //  alert("a")
				var district_id = $(this).val();
                // alert(district_id)
				$.ajax({
					url: "getlocation.php",
					method: "POST",
					data: { district_id: district_id },
					success: function(response) 
                    {
						$("#ddllocation").html(response);
					},
					error: function() 
                    {
						$("#ddllocation").html("Error occurred while getting location!");
					}
				});
			});
		});
	</script>
<!-- End of customer -->

<!-- Handi Ajax -->
<script>
          function getlocation(str)
{
//alert(str)
//var s=document.form1.t1.value;
//if (str==0)
 // {
 // document.getElementById("rose").innerHTML="";
 // return;
 // }
if (window.XMLHttpRequest)

  {// code for IE7+, Firefox, Chrome, Opera, Safari
    //alert(str)
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      //alert(str)
    document.getElementById("ddllocationh").innerHTML=xmlhttp.responseText;
    }
  }
  
xmlhttp.open("GET","getlocationhandinew.php?id="+str,true);
xmlhttp.send(null);
}
</script>

<!-- End of handi -->
