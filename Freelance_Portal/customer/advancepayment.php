<br><br><br><br><br><br><br><br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:weight@100;200;300;400;500;600;700;800&display=swap");


body{
 background-color:blue;
 font-family: "Poppins", sans-serif;
 font-weight: 300;
}

.container{

 height: 100vh;

}

.card{

 border: none;
}

.card-header {
     padding: .5rem 1rem;
     margin-bottom: 0;
     background-color: rgba(0,0,0,.03);
     border-bottom: none;
 }

 .btn-light:focus {
     color: #212529;
     background-color: #e2e6ea;
     border-color: #dae0e5;
     box-shadow: 0 0 0 0.2rem rgba(216,217,219,.5);
 }

 .form-control{

   height: 50px;
border: 2px solid #eee;
border-radius: 6px;
font-size: 14px;
 }

 .form-control:focus {
color: #495057;
background-color: #fff;
border-color: #039be5;
outline: 0;
box-shadow: none;

}

.input{

position: relative;
}

.input i{

   position: absolute;
top: 16px;
left: 11px;
color: #989898;
}

.input input{

text-indent: 25px;
}

.card-text{

font-size: 13px;
margin-left: 6px;
}

.certificate-text{

font-size: 12px;
}


.billing{
font-size: 11px;
}  

.super-price{

   top: 0px;
font-size: 22px;
}

.super-month{

   font-size: 11px;
}


.line{
color: #bfbdbd;
}

.free-button{

   background: #1565c0;
height: 52px;
font-size: 15px;
border-radius: 8px;
}


.payment-card-body{

flex: 1 1 auto;
padding: 24px 1rem !important;

}
</style>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body style="background-color: #94d6e1;">
<?php

$requestid=$_GET["requestid"];
$workprice=$_GET["workprice"];
$balamount=$workprice*.5;
$adminamount=$balamount*.1;
$freelanceramount=$balamount-$adminamount;
?>
<div class="container d-flex justify-content-center mt-5 mb-5">

<form action="advancepayaction.php" method="post">

<div class="row g-3">

  <div class="col-md-6">  
    
    <span>Payment Method</span>
    <div class="card">
      <div class="accordion" id="accordionExample">
        
        <div class="card">
          <div class="card-header p-0" id="headingTwo">
            <h2 class="mb-0">
              <button class="btn btn-light btn-block text-left collapsed p-3 rounded-0 border-bottom-custom" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <div class="d-flex align-items-center justify-content-between">

                  <span>Paypal</span>
                  <img src="https://i.imgur.com/7kQEsHU.png" width="30">
                  
                </div>
              </button>
            </h2>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
              <input type="text" class="form-control" placeholder="Paypal email">
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header p-0">
            <h2 class="mb-0">
              <button class="btn btn-light btn-block text-left p-3 rounded-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <div class="d-flex align-items-center justify-content-between">

                  <span>Credit card</span>
                  <div class="icons">
                    <img src="https://i.imgur.com/2ISgYja.png" width="30">
                    <img src="https://i.imgur.com/W1vtnOV.png" width="30">
                    <img src="https://i.imgur.com/35tC99g.png" width="30">
                    <img src="https://i.imgur.com/2ISgYja.png" width="30">
                  </div>
                  
                </div>
              </button>
            </h2>
          </div>

          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body payment-card-body">
              
              <span class="font-weight-normal card-text">From A/c No</span>
              <div class="input">

                <i class="fa fa-credit-card"></i>
                <input type="text" class="form-control" required pattern="[0-9]{16}" minlength="16" maxlength="16" placeholder="0000 0000 0000 0000" name="fromaccno" required>
                
              </div> 

              <span class="font-weight-normal card-text">To A/c No</span>
              <div class="input">

                <i class="fa fa-credit-card"></i>
                <input type="text" class="form-control" required pattern="[0-9]{16}" minlength="16" maxlength="16" placeholder="0000 0000 0000 0000" name="toaccno" required>
                
              </div> 

              <div class="row mt-3 mb-3">

                <div class="col-md-6">

                  <span class="font-weight-normal card-text">Expiry Date</span>
                  <div class="input">

                    <i class="fa fa-calendar"></i>
                    <input type="text" class="form-control" placeholder="MM/YY" required>
                    
                  </div> 
                  
                </div>


                <div class="col-md-6">

                  <span class="font-weight-normal card-text" required pattern="[0-9]{3}" minlength="3" maxlength="3">CVV</span>
                  <div class="input">

                    <i class="fa fa-lock"></i>
                    <input type="text" class="form-control" minlength="3" maxlength="3" placeholder="000" required>
                    <input type="hidden" name="freelanceramount" value="<?php echo $freelanceramount ?>">
                    <input type="hidden" name="adminamount" value="<?php echo $adminamount ?>">
                    <input type="hidden" name="requestid" value="<?php echo $requestid ?>">
                    <input type="hidden" name="balamount" value="<?php echo $balamount ?>">
                    
                  </div> 
                  
                </div>
                

              </div>

              <span class="text-muted certificate-text"><i class="fa fa-lock"></i> Your transaction is secured with ssl certificate</span>
             
            </div>
          </div>
        </div>
        
      </div>
      
    </div>

  </div>

  <div class="col-md-6">
      <span>Advance amount</span>

      <div class="card">

        <div class="d-flex justify-content-between p-3">

          <div class="d-flex flex-column">

            <!-- <span>Pro(Billed Monthly) <i class="fa fa-caret-down"></i></span>
            <a href="#" class="billing">Save 20% with annual billing</a> -->
            
          </div>

          <div class="mt-1">
            <sup class="super-price"><?php echo $balamount ?></sup>
            <span class="super-month">.00 /-</span>
          </div>
          
        </div>

        <hr class="mt-0 line">

       
        </div>

        <hr class="mt-0 line">


        <div class="p-3 d-flex justify-content-between">

          <div class="d-flex flex-column">

            <span>Total Price</span>
            <small></small>
            
          </div>
          <span><?php echo $workprice ?>.00 /-</span>
          
          

        </div>


        <div class="p-3">

        <button type="submit" class="btn btn-primary btn-block free-button">Confirm Payemnt</button> 
       <div class="text-center">
         <a href="myrequests.php">Cancel Payment</a>
       </div>
          
        </div>



        
      </div>
  </div>

</div>


</div>
</form>


</body>
</html>

