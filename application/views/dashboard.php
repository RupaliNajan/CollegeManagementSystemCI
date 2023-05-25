<?php include("inc/header.php")?>
<div class="container"><br>
	<h2 style="text-align: center;"><b>Admin Panel</b></h2>
	<?php echo $username = $this->session->userdata('username');?>
	<h3>Welcome <?php echo $username;?></h3>
</div>

<?php include("inc/footer.php")?>
