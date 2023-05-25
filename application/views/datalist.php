<!DOCTYPE html>
<html>
<head>
	<title>User data List</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
  <div class= "container">

  	<a href="<?php echo base_url('Dropdown/');?>" class="btn btn-primary btn-sm pull-right float-right">Back</a>

  	<h1>User Data List</h1>
  	<table id="dt" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" class='display dataTable'> 
      <thead style="background-color:powderblue;"> 
         <tr>  
            <td>Sr.No</td>
            <td>Emp Id</td>  
            <td>Zone</td>
            <td>Offices</td>
            <td>Department</td>

         </tr>  
      </thead>

      <tbody>
         <?php
         
         if(isset($getdata) && is_array($getdata) && count($getdata)):
         	// print_r($getdata);
         $i=1;
         
         foreach ($getdata as $data)  
         	// echo "hii";
         {  ?>
            <tr>  
            <td><?php echo $i; ?></td>
            <td><?php echo $data['emp_id']; ?></td>  
            <td><?php echo $data['emp_zone']; ?></td>
            <td><?php echo $data['emp_office']; ?></td>
            <td><?php echo $data['emp_dept']; ?></td>
            </tr>  
         <?php 
         $i++;  
         }  
           else:
         ?> 

              <tr>
                    <td colspan="7" align="center" >No Records Found..</td>
              </tr>
               <?php
                    endif;
                ?>
      </tbody> 
   </table>
    
  </div>
</body>
</html>