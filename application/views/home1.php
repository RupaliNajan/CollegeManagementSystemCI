 <?php include("inc/header.php")?>
<div class="container"><br>
	<div class="jumbotron">
	<h1>Admin And Co-Admin Login</h1>
	<br>
	<div class="my-4">
	  <div class="row">
	  	<?php if(count($chkAdminExist)):?>
	  	
	  	  <?php else:?>
	  	  	<div class="col-lg-4">  	
	  	
	  	 	<?php echo Anchor("Welcom/adminRegister","Admin Register",['class'=>'btn btn-primary']);?>
	  	 </div>

            <?php endif;?>
	  	 <div class="col-lg-4">
	  	 
	  	 		<?php echo Anchor("Welcom/login","Admin Login",['class'=>'btn btn-primary']);?>

	  	 </div>
	  </div>
</div>
</div>
</div>
<?php include("inc/footer.php")?>


<?php include("inc/header.php")?>
<div class="container"><br>
	<div class="jumbotron">
	<h1 class="display-5 " style="text-align: center; color:"><b>Gokhale Education Society R H Sapat College Of Engineering , Nashik</b></h1>
	<hr>
	<div class="my-4">
	  <div class="row">
	  	
	    <div class="col-lg-4">  	
	    	
	  	 	<?php echo anchor("Welcom/adminRegister","Admin Register",['class'=>'btn btn-primary']);?>
	  	 </div>
            
         
	  	 <div class="col-lg-4">
	  	 
	  	 		<?php echo anchor("Welcom/login","Admin Login",['class'=>'btn btn-primary']);?>

	  	 </div>
	  </div>
</div>
</div>
</div>
<?php include("inc/footer.php")?>
