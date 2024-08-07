<?php
include("header.php");
	?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>card</title>
    <link rel="stylesheet" href="./Profile-card.css" />
    <script
      src="https://kit.fontawesome.com/66aa7c98b3.js"
      crossorigin="anonymous"
    ></script>
    <style>
        * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* body {
    font-family: 'Times New Roman', Times, serif;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: linear-gradient(#03a9f4, #03a9f4 45%, #fff 45%, #fff 100%);
} */

.card {
  position: relative;
  width: 280px;
  height: 400px;
  background: #fff;
  border-radius: 10px;
  background: rgba(255, 255, 255, 0.1);
  border-top: 1px solid rgba(255, 255, 255, 0.5);
  backdrop-filter: blur(15px);
  box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
}

.img-bx {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 10px;
  overflow: hidden;
  transform: translateY(30px) scale(0.5);
  transform-origin: top;
}

.img-bx img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 90%;
  object-fit: cover;
}

.content {
  position: absolute;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: flex-end;
  padding-bottom: 30px;
}

.content .detail {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  text-align: center;
}

.content .detail h2 {
  color: #444;
  font-size: 1.6em;
  font-weight: bolder;
}

.content .detail h2 span {
  font-size: 0.7em;
  color: #03a9f4;
  font-weight: bold;
}

.sci {
  position: relative;
  display: flex;
  margin-top: 5px;
}

.sci li {
  list-style: none;
  margin: 4px;
}

.sci li a {
  width: 45px;
  height: 45px;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50%;
  background: transparent;
  font-size: 1.5em;
  color: #444;
  text-decoration: none;
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
  transition: 0.5s;
}

.sci li a:hover {
  background: #03a9f4;
  color: #fff;
}

    </style>
  </head>
  <div class="container profile-page">
 
    <div class="row">
    <?php
            require_once("../dboperation.php");
            $obj=new dboperation();
            $query = "select * from tblfreelancerreg f inner join tblcategory c on c.freelancercategoryid=f.freelancercategoryid inner join tbllogin l on l.loginid=f.loginid where l.status='Confirm'";
            $result=$obj->executequery($query);
            while($display=mysqli_fetch_array($result))
            {
            ?>
        <div class="col-lg-3 col-md-6" style="margin-top: 249px;">
      
            <div class="card profile-header">
                <div class="card">
                <div class="img-bx">
                    <img src="../uploads/<?php echo $display["image"];?>" alt="img" />
                </div><br>
                <div class="content">
                    <div class="detail">
                    <h2 style="color:white"><?php echo $display['freelancername']?><br />| <span style="color:white"><?php echo $display['freelancercategoryname']?> | </span><br>
                    <a href="freelancerviewmore.php?freelancerid=<?php echo $display["loginid"];?>"><span style="color:skyblue">View Details</span></a></h2>
                    <ul class="sci">
                        <li>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </li>
                        <li>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
           
        </div>
        </div>
        <?php
    }
        ?>
    </div>
   
</div>
</html>
<?php
include("footer.php");
	?>
