<html>  
 <head>  
   <title><?php echo $title; ?></title> 
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> 
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
      <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
      <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
   
 </head>  
 <body>  
      <div class="container box">  
      	  
      	   <?php echo form_open('user/add/', "class='form-horizontal'"); ?>
           
           <h3 align="center"><?php echo $title; ?></h3><br />  
           
           <div class="table-responsive">  
                <br />  
                <table id="user_data" class="table table-bordered table-striped">  
                     <thead>  
                          <tr> 
                          	   <!-- <th width="10%">Sr No</th>  -->
                               <th width="10%">Image</th>  
                               <th width="35%">First Name</th>  
                               <th width="35%">Last Name</th>  
                               <th width="10%">Edit</th>  
                               <th width="10%">Delete</th>  
                          </tr> 
                     </thead> 
                     <?php
         if(isset($fetch_data) && is_array($fetch_data) && count($fetch_data)):
         $i=1;
                     // echo"<pre>";
                     // print_r($fetch_data);exit;    
         foreach ($fetch_data as $row)  
         {  ?>
            <tr>  
            <td><?php echo $i;?></td>
            <td><a href="<?php echo base_url('uploads/'.$row['image']);?>"><?php echo 'view'; ?></a></td>
            <td><?php echo $row['first_name'];?></td>  
            <td><?php echo $row['last_name']?></td>
                      
            <td><a href="<?php echo base_url('User/edit/'.$row['id']);?>">edit</a></td>

            <td><a href="<?php echo base_url('User/delete/'.$row['id']);?>" onclick="return confirm('Are you sure want to Delete this Record?')">delete</a></td>
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
      </div>  
 </body>  
 </html>  
 <script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
      var dataTable = $('#user_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'User/fetch_user'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 3, 4],  
                     "orderable":false,  
                },  
           ],  
      });  
 });  
 </script>  