<?php include("inc/header.php")?>
<div class="container">
  <?php echo form_open("WelcomeStud/studLogin");?>
  <?php if($msg = $this->session->flashdata('message')):?>
    <div class="row">
    <div class="col-md-6 m-auto d-block">
    <div class="alert alert-dismissible alert-success">
      <?php echo $msg;?>
    </div>
    </div>
  </div>
    
  <?php endif;?>
	<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
	<h2><b>Student Login Form</b></h2><br><br>
  
	<div class="form-outline mb-4">
		    <label class= >Email address</label>
            <?php echo form_input(['name'=>'email','class'=>'form-control form-control-lg','placeholder'=>' Enter email','value'=>set_value('email')] ); ?>
           
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
          	<label class="form-label" >Password</label>
            <?php echo form_input(['name'=>'password','class'=>'form-control form-control-lg','placeholder'=>'Enter password','value'=>set_value('email')] ); ?>
          </div>


          
          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit"  name="login" class="btn btn-primary">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="StudRegister"
                class="link-danger">Register</a></p>
          </div>
      </div>
  </div>
</div>
</section>
</div>
<?php include("inc/footer.php")?>