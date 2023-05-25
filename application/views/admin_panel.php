<?php 
// echo "<pre>";print_r($getdata);exit;
// echo $this->session->userdata('username');exit;
// echo $this->pagination->create_links();
include("inc/header.php")?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="http://localhost/CI/asset/font-awesome/font/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.4.1.js" integrity="sha256-CfQXwuZDtzbBnpa5nhZmga8QAumxkrhOToWweU52T38=" crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>



 
  
  
<div class="container"><br>

  <h4 class="pull-right float-right" style="color:green">welcome <?php echo $this->session->userdata('username');?> </h4> 

	<h2 style="text-align: center;"><b>Admin Panel</b></h2>
  
	<a href="<?php echo base_url('WelcomeStud/StudRegister');?>" class="btn btn-primary btn-sm pull-right float-right">LogOut</a>

  <?php if($msg = $this->session->flashdata('message')):?>
    <div class="row">
    <div class="col-md-6 m-auto d-block">
    <div class="alert alert-dismissible alert-danger">
      <?php echo $msg;?>
    </div>
    </div>
  </div>
    
  <?php endif;?>
  <a href='<?= base_url() ?>admin/exportCSV'>Export</a><br><br>
  <?php echo form_open('WelcomeStud/StudRegister/', "class='form-horizontal'"); ?>
  	<h1>Student Data List</h1>
  	<table id="dt" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" class='display dataTable'> 
      <thead style="background-color:powderblue;"> 
         <tr> 
            <td>Sr No.</td> 
            <td>stud_id</td>
            <td>Student Name</td>  
            <td>Email</td>
            <td>Class</td>
            <td>Confirmed</td>
            <td>Confimed_by</td>
            <td>Action</td>

         </tr>  
      </thead>

      <tbody>
         <?php
         
         if(isset($getdata) && is_array($getdata) && count($getdata)):
         	// print_r($getdata);exit;
         $i=1;
         //echo "<pre>"; print_r($getdata);exit;
         foreach ($getdata as $data)  
         	// echo "hii";
         {  



          ?>
            <tr>  
            <td><?php echo $i ?></td>  
            <td class="stud_id" id="a"><?php echo $data['stud_id']; ?></td>
            <td><?php echo $data['first_name']; ?></td>
            <td><?php echo $data['email']; ?></td>
            <td><?php echo $data['course']; ?></td>
            <td id="unchecked">
               <?php if($data['is_confirmed']=="0" || $data['is_confirmed']==NULL)
               {
                ?>
               <input type="checkbox" id="conf" onclick="show_info($data['stud_id'])" value="<?php echo $data['stud_id']; ?>" c_no="<?php echo $i; ?>" >  
              <?php }

               else
               {?>
                <div id="div_chk"><i class="fa fa-check-square" aria-hidden="true"></i><span style="color:green">Confirmed</span></i></div>
              <?php }
              ?>

            </td>
            <td><?php if($data['is_confirmed']=="0" || $data['is_confirmed']==NULL)
            {
              ?>
                
              
              <?php }
              else
                {   
                  $conf_id = $data['confimed_by'];

                  $this->db->where('user_id',$conf_id);
                  $q = $this->db->get('tbl_users')->result_array();
               // echo $this->db->last_query();               
               //      echo "<pre>";print_r($q);exit; 
                  echo $q[0]['username'];

                  ?>
                  
                  <?php }
              ?>
            </td>
            
              <td>
                <a href="#" class="btn btn-info view_btn" data-target="#studentViewModal" data-toggle="modal">View</a>
                <a href="<?php echo base_url('WelcomeStud/delete/'.$data['stud_id']);?>" class="btn btn-danger" onclick="return confirm('Are you sure want to Delete this Record?')">Delete</a>

            </td>
            
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
   <p><?php echo $this->pagination->create_links();?></p>
   <!-- Student View Model -->
  <div class="modal fade" id="studentViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

           <div class="student_viewing_data">
             
           </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>

<!-- End model -->
</div>
  
<script type="text/javascript">
     $(document).ready(function () {
     
       $('.view_btn').click(function(e){
        e.preventDefault();
        // alert('hello');
         var stud_id = $(this).closest('tr').find('.stud_id').text();
        
          // console.log($stud_id);

          $.ajax({
             type:"POST",
             url:'<?php base_url();?>view',
             data:{
                 'checking_viewbtn':true,
                 'student_id':stud_id,
             },
             success:function(response){
                 // console.log(response);
                // $(".student_viewing_data").append(response); //repeate data
                $(".student_viewing_data").html(response);
                // console.log(response);
                $('#studentViewModal').modal('show');


             }
          });
       });
     });
  </script>

<script>  
function show_info(stud_id){  
  $(".fa fa-check-square").colorbox({width:"1024",height:"600",iframe:true,href:"<?php echo base_url() ?>/admin/confirm/"+stud_id});
}
</script>


<script type="text/javascript">
  
    $(document).on('click', '#conf', function(event){
    var ans = confirm("Are you sure want to to Confirmed ?");
      // console.log(ans);
    if(ans==true) 
    {
      var c_id = $(this).attr('value');
      var con_no = $(this).attr('c_no');
      // console.log(con_no);
      if (c_id) {
        $.ajax({
          type:"POST",
          url:'<?php base_url();?>confirm',
          data:'c_id='+c_id,
          success:function(response){        
           // console.log(response);
           if (response==1) {
              $('#unchecked_'+con_no).hide();
              $('#div_chk_'+con_no).css("display", "block");
              $('#div_show_'+con_no).css("display", "block");
              
            }  
            location.reload();          
        }
      
      });

      }
        }
    else
      return false;
  // }
});
</script>


  <script>
    $(document).ready(function () {
    $('#dt').DataTable();
});
  </script>

<?php include("inc/footer.php")?>



