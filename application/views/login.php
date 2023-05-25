<?php include("inc/header.php")?>
<div class="container"><br>
	<?php echo form_open("Welcom/Singin",['class'=>'form-horizontal']);?>
	<?php if($msg = $this->session->flashdata('message')):?>
		<div class="row">
		<div class="col-md-6">
		<div class="alert alert-dismissible alert-success">
			<?php echo $msg;?>
		</div>
		</div>
	</div>
		
	<?php endif;?>
	<h3>Admin login</h3>
	<hr>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-md-3  control-label">Email</label>
                <div class="col-md-9">
                <?php echo form_input(['name'=>'email','class'=>'form_control','placeholder'=>'email','value'=>set_value('email')]); ?>

                </div><br>
            </div>
        </div>
        <div class="col-md-9">
            <?php echo form_error('email','<div class="text-danger">','</div>'); ?>
        </div>
     </div>  

        <div class="row">
     	<div class="col-md-6">
     		<div class="form-group">
                <label class="col-md-3  control-label">Password</label>
                <div class="col-md-9">
                <?php echo form_input(['name'=>'password','class'=>'form_control','placeholder'=>'Password']); ?>
                </div><br>
            </div>
        </div>
        <div class="col-md-9">
        	<?php echo form_error('password','<div class="text-danger">','</div>'); ?>
        </div>
     </div>   

       
     <button type="submit"  class="btn btn-primary">Login</button>
     
    
     <?php echo Anchor("Welcom","Back",['class'=>'btn btn-primary']);?>
     </div>  
     <div>
     <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="adminRegister"
              class="link-danger">Register</a></p>
      </div>
     <?php echo form_close();?>   
</div>
<?php include("inc/footer.php")?>