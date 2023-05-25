<!DOCTYPE html>
<html>
<head>
	<title>Gallary Login</title>

	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <!-- font awesome cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css">
</head>
<body>
	 <div class="container">
      <h1 class="text-center">Login form</h1>
      <br><br>
      <?php echo validation_errors(); ?>

      <form method="post" action="<?php echo base_url('Image/login/');?>" enctype="multipart/form-data">
      <div class="form-group">
     <label for="exampleInputEmail1" >Name of Gallary </label>
     <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="width: 50%"; placeholder="Enter gallary name" name="gallary_name">
     </div>

   <div class="form-group">
    <label for="exampleInputEmail1">Name of City</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="width: 50%"; placeholder="Enter city" name="city">
  </div>
 
   
    <div class="form-group">
    <label for="image">Image</label>
    <div class="input-group">
    <input type="file" class="form-control" id="image[][]" style="width: 80%";placeholder="image" name="image" >
      <!-- <i class="fa-sharp fa-solid fa-plus"></i> -->
     <div class="input-group-append" id="onclick" >	
     <button type="button"  class="btn btn-success" id="rowAdd"> <span class="bi bi-plus-square-dotted"> </span> ADD</button>
    </div>
  </div>
 </div>

 <div id="newinput"></div>

    
  <br><br>

  <input type="submit" name="submit" class="btn btn-primary"> 
</form>
</div>

<script type="text/javascript">
	var i=0;
	$("#rowAdd").click(function(){
		i++;
          Addnew =  '<div id="row">  <div class="input-group m-3">' +
            '<div class="input-group-prepend">' +
            '<input type="file" class="form-control" id="exampleInputPassword1" style="width: 80%";placeholder="image" name="image'+i+'">'+
            '<button class="btn btn-danger" id="DeleteRow" type="button" >' +
            '<i class="bi bi-trash"></i> Delete</button> </div>' +
            ' </div> </div><br>';

            $('#newinput').append(Addnew);
	});

	$("body").on("click", "#DeleteRow", function () {
            $(this).parents("#row").remove();
        })
</script>
<!-- <script type="text/javascript">
	function myFunction() {
    document.getElementById("click").innerHTML = '<div class="form-group"><div class="input-group"><input type="file" class="form-control" id="exampleInputPassword1" style="width: 80%";placeholder="image"><div class="input-group-append"><button type="button" id="click" class="btn btn-danger"onclick="myFunction()">delete</button></div></div></div>' ;

    $('#click').append(innerHTML);

}
</script> -->


</body>
</html>