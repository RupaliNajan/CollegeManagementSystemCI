<?php include("inc/header.php")?>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  
<style>
	.error{  
    color: red;  
}  
</style>

<div class="container" ><br>
	<?php echo form_open("Welcom/adminSingup",['class'=>'form-horizontal','id'=>'MyForm']);?>
	<?php if($msg = $this->session->flashdata('message')):?>
		<div class="row">
		<div class="col-md-6 m-auto d-block">
		<div class="alert alert-dismissible alert-success">
			<?php echo $msg;?>
		</div>
		</div>
	</div>
		
	<?php endif;?>
	<h3>Admin Registration</h3>
	<hr>
     <div class="row">
     	<div class="col-md-6">
     		<div class="form-group">
                <label class="col-md-3  control-label">Username</label>
                <div class="col-md-9">
                <?php echo form_input(['name'=>'username','class'=>'form_control','placeholder'=>'Username','value'=>set_value('username'),'required']);?>
                </div><br>
            </div>
        </div>
        <div class="col-md-9">
        	<?php echo form_error('username','<div class="text-danger">','</div>'); ?>
        </div>
     </div>    

     <div class="row">
     	<div class="col-md-6">
     		<div class="form-group">
                <label class="col-md-3  control-label">Email</label>
                <div class="col-md-9">
                <?php echo form_input(['type'=>'email','name'=>'email','class'=>'form_control','placeholder'=>'email','value'=>set_value('email')]); ?>
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
                <label class="col-md-3  control-label">Gender</label>
                <select class="col-md-3" name="gender">
                	<option value="">--select gender--</option>
                	<option value="Male">Male</option>
                	<option value="Female">Female</option>

                </select>
            </div><br>
        </div>
        <div class="col-md-9">
        	<?php echo form_error('gender','<div class="text-danger">','</div>'); ?>
        </div>
    </div>

        <div class="row">
     	<div class="col-md-6">
     		<div class="form-group">
                <label class="col-md-3  control-label">Role</label>
                <select class="col-md-3" name="role_id">
                	<option value="">--select Role--</option>
                <?php if(count($roles)): ?>
                <?php foreach($roles as $role):?>
                	<option value=<?php echo $role->role_id?>> <?php echo $role->role_name?> </option>
                	<!-- <option value="Co-Admin">Co Admin</option> -->
                <?php endforeach; ?> 

                <?php endif; ?>
                </select>
            </div>
        </div>
        <div class="col-md-9">
        	<?php echo form_error('role_id','<div class="text-danger">','</div>'); ?>
        </div><br>
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

        
     <button type="submit" name='submit' class="btn btn-primary">Register</button>
     

     <?php echo Anchor("Welcom/login","Back",['class'=>'btn btn-primary']);?>
     </div>  
     <?php echo form_close();?>   
</div>
<script>
$(document).ready(function() {
$("#MyForm").validate({
rules: {
'username': {
required: true,
minlength: 2
},
'email': {
required: true,
email:true,
},
'gender':{
required: true,
},
'role_id':{
required: true,
},
'password': {
required: true,
minlength: 2
},
'confpswd': {
required: true,
minlength: 2
},
},
messages: {
'username': "Please enter a valid Username Name.",
'email': "Please enter a valid email.",
'gender': "Please enter gender.",
'role_id': "Please enter a role_id",
'password': "Please enter a Password",
'confpswd': "Please enter a confpswd",
}
});
});
</script>
<?php include("inc/footer.php")?>