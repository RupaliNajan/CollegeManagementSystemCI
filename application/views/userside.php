</!DOCTYPE html>
<html>
<head>
	<title>Form</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  
</head>
<body>
	 <div class="container" class="text-center">
    <a href="<?php echo base_url('Dropdown/admin');?>">Admin add data</a>
	 	<?php echo validation_errors(); ?>

     <form method="post" action="<?php echo base_url('Dropdown/addData/');?>" enctype="multipart/form-data">
    <h1 class="text-center">ESDS User Side</h1>

    <div class="form-group">
    <label for="exampleInputPassword1">Employee Id</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Emp_id"  name="emp_id" value="<?php echo set_value('emp_id'); ?>" >
   </div><br>
    
    <table>
      <tr>
      <td>Zone</td>
      <td>
      <select id ="zone" name="emp_zone">
      <option>Select Zone</option>
      <?php
      foreach ($getdata as $data) 
           // print_r($getdata);
       {
           echo"<option value='".$data['zone']."''>" .$data['zone']."</option>";
       } 
      ?>
      </select>
    </td>
  </tr>

  <tr>
    <td>Offices</td>
    <td>
      <select id='office' name="emp_office">
        <option value="">Offices</option>
      </select>
    </td>
  </tr>

  <tr>
    <td>Department</td>
    <td>
      <select id='dept' name="emp_dept">
        <option value="">Select Dept</option>
      </select>
    </td>
  </tr>

    </table><br>
     

  <input type="submit" class="btn btn-primary" name="submit"/>
</form>
</div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

 <script type="text/javascript">
    var baseURL= "<?php echo base_url();?>";
 
  $(document).ready(function(){

    $('#zone').change(function(){
      var czone = $(this).val();

      $.ajax({
         url:'<?php base_url();?>Dropdown/fetch_office',
         method: "POST",
         data:{zone:czone},
         dataType: 'json',
         success: function(response)
         {
            
          //remove Option
          $('#dept').find('option').not(':first').remove();
          $('#office').find('option').not(':first').remove();

          //Add option
            $.each(response,function(index,data){
              
             $('#office').append('<option value="'+data['offices']+'">'+data['offices']+'</option>');
         });
      }

      });       

    });


     $('#office').change(function(){
      var czone = $('#zone').val();
       var choffice = $(this).val();


       $.ajax({
         url:'<?php base_url();?>Dropdown/fetch_dept',
         method: "POST",
         data: {zone:czone, offices: choffice},
         dataType: 'json',
         success:function(response)
         {
          //remove Option
          $('#dept').find('option').not(':first').remove();
          
          //Add option
            $.each(response,function(index,data){
             $('#dept').append('<option value="'+data['dept']+'">'+data['dept']+'</option>');
         });
      }

      });       

    });


  });

</script>
</body>
</html>