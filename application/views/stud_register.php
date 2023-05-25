<?php include("inc/header.php");
//echo "<pre>";print_r($getsdData);exit;
  //echo "<pre>";print_r($postData);exit;
?>
<div class="container">
  
<?php if($msg = $this->session->flashdata('message')):?>
		<div class="row">
		<div class="col-md-6 m-auto d-block">
		<div class="alert alert-dismissible alert-danger">
			<?php echo $msg;?>
		</div>
		</div>
	</div>
		
	<?php endif;?>

 <?php echo validation_errors(); ?>

 <?php echo form_open("WelcomeStud/StudRegister",['class'=>'form-horizontal','id'=>'MyForm']);?>

<section class="h-100 bg-dark">
  <div class="container py-5 h-100">
      <div class="col">    
      <div class="row d-flex justify-content-center align-items-center h-100">
">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-6 d-xl-block">
              <img src="../../uploads/register.jpg"
                alt="register" class="img-fluid"
                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
            </div>
            <div class="col-xl-6">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase">Student registration form</h3>
                 
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
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                    	<label class="form-label" for="form3Example1n">Last name</label>
                      <input type="text" id="form3Example1n" name="last_name" class="form-control form-control-lg" value="<?php echo set_value('last_name'); ?>" />
                      
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                    	<label class="form-label" for="form3Example1m1">Mother's name</label>
                      <input type="text" id="form3Example1m1" name="m_name"class="form-control form-control-lg" value="<?php echo set_value('m_name'); ?>"/>
                      
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                    	<label class="form-label" for="form3Example1n1">Father's name</label>
                      <input type="text" id="form3Example1n1" name="f_name" class="form-control form-control-lg" value="<?php echo set_value('f_name'); ?>"/>
                      
                    </div>
                  </div>
                </div>

                <div class="form-outline mb-4">
                <label class="form-label" for="form3Example9">DOB</label>
                  <input type="date" id="form3Example9" name="DOB" class="form-control form-control-lg" value="<?php echo set_value('DOB'); ?>"/>                 
                </div>
               

               <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">
          <h6 class="mb-0 me-4" name="gender" >Gender: </h6>
             <label><input type="radio" name="gender" value="female" required> Female</label> &nbsp;&nbsp; &nbsp;    
              <label><input type="radio" name="gender" value="male" required> Male</label> 
                </div>


                <div class="form-outline mb-4">
                	<label class="form-label" for="form3Example8">Correspondece Address</label>
                  <input type="text" id="corAddress" name="c_address" class="form-control form-control-lg" value="<?php echo set_value('c_address'); ?>"/>  
                </div>
                <div class="form-group">
          <input type="checkbox" id="checkBox"  onclick="autoFilAddress()"> Same as Correspondece address
                </div><br>

                <div class="form-outline mb-4">
                	<label class="form-label" for="form3Example8">permanent Address</label>
                  <input type="text" id="perAddress" name="p_address" class="form-control form-control-lg" value="<?php echo set_value('p_address'); ?>"/>
                  
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example90">Pincode</label>
                  <input type="text" id="form3Example90" name="pincode" class="form-control form-control-lg" value="<?php echo set_value('pincode'); ?>"/>                 
                </div>
           

                <div class="row">
                  <div class="col-md-6 mb-4">

                    <select name="state" id='s_state'>
                      <option>Select State</option>
                      <?php 
                        foreach ($getsdData as $data) {
                        	echo"<option value='".$data['id']."'>".$data['name']. "</option>";
                        }
                      ?>
                    </select>

                  </div>
                  <div class="col-md-6 mb-4">

                    <select name="city" id="s_city">
                      <option > Select City</option>
                      
                    </select>

                  </div>
                </div>

                

                

                <div class="form-outline mb-4">
                <label class="form-label" for="form3Example99">Class</label>
                  <input type="text" id="form3Example99" name="course" class="form-control form-control-lg" value="<?php echo set_value('course'); ?>"/>                 
                </div>

                <div class="form-outline mb-4">
                <label class="form-label" for="form3Example97">Email ID</label>
                  <input type="email" id="form3Example97" name="email" class="form-control form-control-lg" value="<?php echo set_value('email'); ?>"/>                  
                </div>

                <div class="form-outline mb-4">
                <label class="form-label" for="form3Example97">password</label>
                  <input type="text" id="form3Example97" name="password" class="form-control form-control-lg" value="<?php echo set_value('password'); ?>"/>                  
                </div>

                  <input type="submit" name="register" value="Register" class="btn btn-warning btn-lg ms-2"></input>
                </div>
             
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</section>
    <?php echo form_close();?> 
</div>


<script type="text/javascript">

function autoFilAddress()
    {    
        if (checkBox.checked == true)
        {
            var caddr = document.getElementById("corAddress").value;
            var copycaddr =caddr;
            document.getElementById("perAddress").value = copycaddr;

        }
        else if(checkBox.checked == false)
        {
              document.getElementById('perAddress').value='';   
        }
    }
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    var baseURL= "<?php echo base_url();?>";
 
  $(document).ready(function(){

    $('#s_state').change(function(){
      var sState = $(this).val();
        console.log(sState);
      
      $.ajax({
         url:'<?php base_url();?>fetch_stud_ci',
         method: "POST",
         data:{state:sState},
         dataType: 'json',
         success: function(response)
         {
          
          //remove Option
          $('#s_city').find('option').not(':first').remove();

          //Add option
            $.each(response,function(index,data){
              
             $('#s_city').append('<option value="'+data['id']+'">'+data['city']+'</option>');
         });
      }

      });       

    });

    });

</script>

    <?php include("inc/footer.php")?>
