<body>


<!DOCTYPE html>
<html lang="en">

    <link href="<?php echo base_url('assets/css/datatables.min.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/datatables.min.js'); ?>"></script>
    


    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">About
                        <strong>Food Forms</strong>
                    </h2>
                    <hr>
                </div>
             
<!-- ddddddddddddddddddddddddddddddddddddddddddddddddddddddddd -->


<div class="container">  

<form data-toggle="validator" role="form" action="../updatefoodedit" id="foodform" method="post" enctype="multipart/form-data" >
  
   <input type="hidden" name="id" value="<?php echo $foodeditinfo["foodID"]; ?>" >

<br>
 <div class="form-group">
    <label for="inname" class="control-label">Food Name</label>
 
    <div class="col-md-12 ">
     <div class="col-md-3"> 
    <input type="text" class="form-control" id="foodname" name="foodname"  value="<?php echo  $foodeditinfo["foodName"]; ?>" data-error="Ingredient Name is required"  required>
    <div class="help-block with-errors"></div>

  </div>
 </div>
</div>
 <br>
<br>
 <!-- //ingredient -->
  <label class="control-label">Ingredient</label>
  <div class="form-group">
  <div class="input_fields_wrap" data='<?php echo json_encode($foodeditinfo["in"]);?>'>
  <div class="col-xs-6">
  <button class="add_field_button btn btn-default  col-xs-offset-3"  required>Add More Fields</button>
  </div>
  </div>
  </div>
<br>
<br>
<br><br>
<br><br>


<label for="upload">Upload :</label>
<div class="col-md-12 ">

<div class="fileinput fileinput-new" data-provides="fileinput">
    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 300px; height: 200px;" >   </div>
    <img src="<?php echo  $foodeditinfo["imageTitle"];?>" class="img-thumbnail" style="width:300px;height:200px;">
    <div class="col-md-12">
  <div class="col-md-3">
    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
    <input type="file"  name="fileToEdit"  id="fileToEdit" data-error="image  is required"  ></span>
    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
  </div>
      <div class="col-md-3 col-md-offset-1" >  &nbsp;  &nbsp;  &nbsp;
       <div class="glyphicon glyphicon-arrow-up"></div> <label> Old picture :    <?php echo  $foodeditinfo["imageTitle2"];?>  </label></div>
    </div>
</div>
</div>






<br>
<div class="col-md-12">
   <br>
  </div>
  <div class="col-md-6 col-md-offset-3">
  <input type="submit" name="submit" class="btn btn-primary" value="Submit" onClick="return confirm('Do you Confirm?')">
  &nbsp;
  <button type="button" onclick="location.href='<?php echo site_url('Foodcontroller/viewfood') ?>'" class="btn btn-success">Back</button>
</div>
</form>
<br>







<!-- ddddddddddddddddddddddddddddddddddddddddddddddddddddddddd -->

                <div class="clearfix"></div>

            </div>
        </div>

    
    </div>
    <!-- /.container -->



    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>















</body>