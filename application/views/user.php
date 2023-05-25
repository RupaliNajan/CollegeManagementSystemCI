</!DOCTYPE html>
<html>
<head>
	<title>Form</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
	 <div class="container" class="text-center">

	 	<?php echo validation_errors(); ?>

     <form method="post" action="<?php echo base_url('Dropdown/add');?>" enctype="multipart/form-data">
    <h1 class="text-center">ESDS User Side</h1>

    <div class="form-group">
    <label for="exampleInputEmail1">Zone</label>
    <select class="form-select" aria-label="Default select example">
    <option selected>Open this select menu</option>
    <option value="1">One</option>
    <option value="2">Two</option>
  <option value="3">Three</option>
</select>  
   </div><br>

    <div class="form-group">
    <label for="exampleInputEmail1">Zone</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter zone"  name="zone" value="<?php echo set_value('zone'); ?>" />  
   </div><br>

  <div class="form-group">
    <label for="exampleInputPassword1">Offices</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="office name"  name="offices" value="<?php echo set_value('offices'); ?>" />
  </div><br>

  <div class="form-group">
    <label for="exampleInputPassword1">Department</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Department" name="dept" value="<?php echo set_value('dept'); ?>" />
  </div><br><br>

  <input type="submit" class="btn btn-primary" name="submit"/>
</form>
</div>
</body>
</html>