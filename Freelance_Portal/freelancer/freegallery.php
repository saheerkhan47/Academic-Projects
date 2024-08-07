<?php
include("header.php");
	?>
<br><br><br><br><br><br><br><br><br>



<style>
  .card-registration .select-input.form-control[readonly]:not([disabled]) 
  {
    font-size: 1rem;
    line-height: 2.15;
    padding-left: .75em;
    padding-right: .75em;
    }
    .card-registration .select-arrow
     {
    top: 13px;
    }
    </style>

<script src="js/jquery.min.js"></script>
	<script>

$(document).ready(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;

    // or instead:
    // var maxDate = dtToday.toISOString().substr(0, 10);

    //alert(maxDate);
    $('#form3Example9').attr('min', maxDate);
});
	</script>
    <!-- <br><br><br><br><br><br> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


    <!-- <section class="h-100 bg-dark"> -->
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-6 d-none d-xl-block">
              <img src="https://img.freepik.com/free-vector/freelancer-flexible-remote-work-locations-isometric-flowchart-with-shared-office-writing-home-outdoor-with-laptop-vector-illustration_1284-30324.jpg?w=2000 "height="700px", width="600px"
              
                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;">
            </div>
            <div class="col-xl-6">
              <div class="card-body p-md-5 text-black">
              <form action="freegalleryaction.php?freelancerid=<?php $freelancerid;?>" method="post" enctype="multipart/form-data">
                <h3 class="mb-5 text-uppercase">Freelancer Gallery</h3>


                <div class="col-md-12 mb-4">
                    <div class="form-outline">
                      <input type="text" id="tittle" class="form-control form-control-lg" placeholder="Enter your title"  required pattern="^[a-zA-Z]*$"
                         title="please fill out of this feild" name="tittle"/>
                      <label class="form-label"  for="form3Example1n">Gallery Title</label>
                    </div>
                  </div>

                  <!-- <div class="col-md-12 mb-4">
                    <div class="form-outline">
                      <input type="text" id="description" class="form-control form-control-lg" placeholder="Enter your title" name="description"/>
                      <label class="form-label" for="form3Example1n">Description</label>
                    </div>
                  </div> -->

              
                  <div class="col-md-12 mb-4">
                    <div class="form-outline">
                    <input type="file" id="form3Example1m1" class="form-control form-control-lg" required pattern=""
                         title="please fill out of this feild" name="image1"/>
                      <label class="form-label" for="form3Example1m1">Image 1</label>
                    </div>
                  </div>
               
                  <div class="col-md-12 mb-4">
                    <div class="form-outline">
                    <input type="file" id="form3Example1m1" class="form-control form-control-lg" required pattern=""
                         title="please fill out of this feild" name="image2"/>
                      <label class="form-label" for="form3Example1m1">Image 2</label>
                    </div>
                  </div>


             
                  <div class="col-md-12 mb-4">
                  <div class="form-outline">
                  <input type="date" id="#form3Example9" class="form-control form-control-lg" name="date"/>
                  <label class="form-label" for="form3Example1m1">Choose file date</label>
                </div><br><br>

                <!-- <div class="d-flex justify-content-end pt-3"> -->  
                  <!-- <button type="Submit"name="Submit" class="btn btn-light btn-lg"><br> -->
                    <!-- <a href="freegallery.php">Reset</button><br> -->
                  <button type="submit" class="btn btn-warning btn-lg ms-2" id="Submit" name="Submit">Submit</button>
                </div>
               </form>
                  <!-- <button type="button" class="btn btn-light btn-lg">Reset all</button>
                  <button type="Submit" class="btn btn-warning btn-lg ms-2">Submit</button>
                </div> -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
include("footer.php");
	?>