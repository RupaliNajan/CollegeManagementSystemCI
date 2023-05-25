<!DOCTYPE html>
<html>
<head>
   <title>list</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
   <!-- <script defer src= "https://code.jquery.com/jquery-3.5.1.js"></script> -->

   <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

     <!-- jQuery Library -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

     <!-- Datatable JS -->
     <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

</head>
<body>
   <script type="text/javascript" >
     $(document).ready(function(){
       $('#dt').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
         'ajax': {
             'url':'<?=base_url()?>Student/add'
          },
          'column': [
                       { data: 'name' },
                       { data: 'mob' },
                       { data: 'city'},
                       { data: 'image' },
          ]
        });
     });
     </script>
   <div class="container">
    <!-- <?php if($this->session->flashdata('success_message')); ?>  -->
                <!-- <div class ="alert alert-success"> -->
               <?= $this->session->flashdata('success_message'); ?>

              <!-- </div>   -->
   
<?php
      defined('BASEPATH') OR exit('No direct script access allowed');
      ?>

      <?php echo validation_errors(); ?>
      <!-- <?php echo $error;?>  -->
 
     <?php echo form_open('student/add/', "class='form-horizontal'"); ?> 
     

   <h3>List Items</h3>

      <table id="dt" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" class='display dataTable'> 
      <thead> 
         <tr>  
            <td>Id</td>
            <td>Name</td>  
            <td>Phone_no</td>
            <td>City</td>
            <td>Image</td>
            <td>Action</td>

         </tr>  
      </thead>

      <tbody>
         <?php
         if(isset($get_details) && is_array($get_details) && count($get_details)):
         $i=1;

         foreach ($get_details as $row)  
          // echo $get_details;exit;
         {  ?>
            <tr>  
            <td><?php echo $i;?></td>
            <td><?php echo $row['name'];?></td>  
            <td><?php echo $row['mob']?></td>
            <td><?php echo $row['city'];?></td>
            <td><a href="<?php echo base_url('uploads/'.$row['image']);?>"><?php echo 'view'; ?></a></td>
            
            <td><a href="<?php echo base_url('Student/edit/'.$row['id']);?>">Edit</a></td>

            <td><a href="<?php echo base_url('Student/delete/'.$row['id']);?>" onclick="return confirm('Are you sure want to Delete this Record?')">Delete</a></td>
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
   <button class="btn btn-success">Add</button>
   </div> 
   <div>
   <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>
</div>
<!-- <script type="text/javascript">
  $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
}); 

</script> -->


</body>
</html>
