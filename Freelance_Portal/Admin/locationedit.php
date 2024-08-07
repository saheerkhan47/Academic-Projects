<?php
include("header.php");
?>
<div class="main-panel">
<section class="pcoded-main-container">
<div class="pcoded-content">
<div class="row">
<div class="col-sm-12">
<br>
<br>
<div class="card">
<div class="card-header"><br><br><br>
<h5>Location Updations</h5>
</div>
<div class="card-body">
<html>
    <body>
        <form method="post" action="locationeditaction.php" name="f1">
            <?php
            include("../dboperation.php");
            $obj=new dboperation();
            if(isset($_GET['locationid']))
            {
                $locationid=$_GET['locationid'];
                $query="select * from tbllocation  where locationid=$locationid";
                $res=$obj->executequery($query);
                $display=mysqli_fetch_array($res);
                ?><br><br><br><br>

            
                <h4><th colspan="2">Location Details</th></h4>
                <!-- 
                    <td>location name</td>
                    <td> 
                        <input type="text" name="locationname" value="<?php echo $display["locationname"];?>"/></td>
                 -->
                <tr><br><br>
                <td>
                <div class="form-group col-md-6">
<label for="inputPassword4">Location Name</label>
<input type="text" class="form-control" name="locationname" placeholder="location name" value="<?php echo $display["locationname"];?>"/></td>
</div>   
</tr> 
            
                   
                   <td colspan="2"> 
                       <input type="submit" name="submit" class="btn btn-primary" value="submit"></td>

                
</table>
<?php
}
?>
<input type="hidden" name="locationid" value="<?php echo $display["locationid"];?>">
</form>
</body>
</html>
</div>
</div>
</div>
</div>
</section>

<?php
include("footer.php");
?>