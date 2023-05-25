<?php include("inc/header.php")?>

<div class="container">
	<div class="row">
 <div class="col-md-8 col-md-offset-2">
        <h2 class="text-center">Edit data</h2>
       <?php
         if(isset($getdata) && is_array($getdata) && count($getdata)):
         	// print_r($getdata);exit;
         $i=1;
         
         foreach ($getdata as $data)  
         	// echo "hii";
         {  ?>
         	<form method="post" action="<?php echo site_url('admin/edit/'.$data['stud_id'].''); ?>" enctype="multipart/form-data" >


          <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <label class="form-label" for="form3Example1m">Roll No</label>
                      <input type="text" id="form3Example1m" name="roll" class="form-control form-control-lg" value="<?php echo set_value('roll'); ?>"/>
  
                    </div>
                  </div>

                   <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                    	<label class="form-label" for="form3Example1m">First name</label>
                      <input type="text" id="form3Example1m" name="first_name" class="form-control form-control-lg" value="<?php echo set_value('first_name'); ?>"/>
  
                    </div>
                  </div>

                  <div class="form-outline mb-4">
                <label class="form-label" for="form3Example97">Email ID</label>
                  <input type="email" id="form3Example97" name="email" class="form-control form-control-lg" value="<?php echo set_value('email'); ?>"/>                  
                </div>

                <div class="form-outline mb-4">
                <label class="form-label" for="form3Example99">Class</label>
                  <input type="text" id="form3Example99" name="course" class="form-control form-control-lg" value="<?php echo set_value('course'); ?>"/>                 
                </div>



        <input  type="submit" name="submit" class="btn btn-primary pull-right"></input>
        <br><br>
        </form>
     <?php
        }
 endif;
     ?>
    
 </div>
</div>

<?php include("inc/footer.php")?>
