<!DOCTYPE html>
<html>
<head>
  <title>Edit</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
<div id="container" class="container">

<div class="row">
 <div class="col-md-8 col-md-offset-2">
        <h2 class="text-center">Edit data</h2>
        <br><br>
  <?php    
       if(isset($fetch_data) && is_array($fetch_data) && count($fetch_data)): 
        $i=1;
        foreach ($fetch_data as $row) 
    { 
      
        // print_r($fetch_data);
    ?> 
    <form method="post" action="<?php echo site_url('user/edit/'.$row['id'].''); ?>" enctype="multipart/form-data" >

        <label for="Name">Name</label>
        <input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name']; ?>" required >
        <br>
        <label for="Mob_no">Phone_no</label>
        <input type="text" class="form-control" name="last_name" value="<?php echo $row['last_name']; ?>" >
        <br>
       
        <label for="Image">Image</label>
        <input type="file" name="image" class="form-control" value="<?php echo $row['image']; ?>" required>
       <div>
        <lable for="existing">Existing Image</lable>
            <a href="<?php echo base_url(); ?>uploads/<?php echo $row['image']; ?>" target="_blank"><?php echo $row['image']; ?></a>
        <input type="hidden" name="old_image" id="old_image" value="<?php echo $row['image']; ?>">
                    </div> 

       
        <br><br>
        <input  type="submit" name="submit" class="btn btn-primary pull-right"></input>
        <br><br>
    </form>
     <?php
        }
 endif;
     ?>
    <br><br>
 </div>
</div>
</body>
</html>
