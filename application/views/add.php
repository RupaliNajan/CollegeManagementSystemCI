<!DOCTYPE html>
<html>
<head>
	<title>Add</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
          <div id="container" class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="text-center">Add Information</h2>
            
             <?php echo validation_errors(); ?>

          <form method="post" action="<?php echo base_url('Student/add'); ?>" enctype="multipart/form-data">
            <label for="Name">Enter you name</label>
              <input type="text" class="form-control" name="name" value="<?php echo set_value('name'); ?>" />
            <br>
            <label for="phone-no">Enter you Mob_no</label>
              <input type="text" class="form-control" name="mob" value="<?php echo set_value('mob'); ?>"/>
            <br>
            <label for="City">City</label><br>
              <input type="text" class="form-control" name="city" value="<?php echo set_value('city'); ?>">   
              <br>
           
            <label for="Image">Image</label>
              <input type="file" name="image" class="form-control">
              <br>
              <input  type="submit" name="submit" class="btn btn-primary pull-right"></input>
            <br><br>
          </form>
        </div>
    </div>
</div>  
</body>
</html>