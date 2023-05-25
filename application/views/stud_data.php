<?php include("inc/header.php");

?>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<div class="container"><br>

<?php echo form_open('WelcomeStud/StudRegister/', "class='form-horizontal'"); ?>

<h3 class="p-3  bg-light" style="text-align:center;">Student Information</h3>

<div class="container cart">
  <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3">
    <div class="col">
      <div class="p-3 "><b>Stud_id:</b> <?php echo $single_stud_data[0]['stud_id']?> </div>
      
    </div>
    <div class="col">
      <div class="p-3 "><b>First Name:</b><?php echo $single_stud_data[0]['first_name'] ?> </div>

    </div>
    <div class="col">
      <div class="p-3 "><b>Last name:</b> <?php echo $single_stud_data[0]['last_name']?></div>
    </div>
    <div class="col">
      <div class="p-3 "><b>Mother name:</b> <?php echo $single_stud_data[0]['m_name']?></div>
    </div>
    <div class="col">
      <div class="p-3 "><b>Father name:</b> <?php echo $single_stud_data[0]['f_name']?></div>
    </div>
    <div class="col">
      <div class="p-3 "><b>Correspondance Address:</b> <?php echo $single_stud_data[0]['c_address']?></div>
    </div>
    <div class="col">
      <div class="p-3 "><b>Permanent Address:</b><?php echo $single_stud_data[0]['p_address']?></div>
    </div>
    <div class="col">
      <div class="p-3 "><b>Pincode:</b> <?php echo $single_stud_data[0]['pincode']?></div>
    </div>
    <div class="col">
      <div class="p-3  "><b>Gender:</b> <?php echo $single_stud_data[0]['gender']?></div>
    </div>
    <div class="col">
      <div class="p-3 "><b>DOB:</b> <?php echo $single_stud_data[0]['DOB']?></div>
    </div>
    <!-- <div class="col">
      <div class="p-3  "><b>State:</b> <?php echo $single_stud_data[0]['state']?></div>
    </div>
    <div class="col">
      <div class="p-3  "><b>City:</b> <?php echo $single_stud_data[0]['city']?></div>
    </div> -->
    <div class="col">
      <div class="p-3  "><b>Class:</b> <?php echo $single_stud_data[0]['course']?></div>
    </div>
     <div class="col">
      <div class="p-3  "><b>Email:</b> <?php echo $single_stud_data[0]['email']?></div>
    </div>
  </div>
</div>


</div>

<?php include("inc/footer.php");?>