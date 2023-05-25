<?php
 public function changeStatus()
    {
        $id = $this->uri->segment(4);
        $status = $this->uri->segment(5);

      if($status=='Active')
		{
			$newstatus = 'Inactive'; 
		}

		else if($status=='Inactive')
		{
			$newstatus = 'Active';
		}
        if($this->master_model->updateRecord("mh_image_master",array('status'=>$newstatus),array("id"=>$id)))
        {
            $this->session->set_flashdata('success_message','Image status updated successfully');
            redirect(base_url().'webmanager/Gallary/');   
        }

        else
        {
            $this->session->set_flashdata('error_message','Something went wrong! Please try again');
            redirect(base_url().'webmanager/Gallary/');
        }
    }




<td> 
     <?php if($info['status']=="Active"){ ?>
     <a href="<?php echo base_url(); ?>webmanager/Gallary/changeStatus/<?php echo $info['id'].'/'.$info['status']; ?>"><button class="btn btn-success btn-sm">Active </button> </a><?php }
                                                                    
    else if($info['status']=="Inactive"){ ?>
                                                                
    <a href="<?php echo base_url(); ?>webmanager/Gallary/changeStatus/<?php echo $info['id'].'/'.$info['status']; ?>"><button class="btn btn-danger btn-sm">Block</button> </a><?php }
                    ?>
         </td>




INSERT INTO `stud_info` (`confimed_by`) VALUES ('15')

?>


SELECT tbl_users.username,tbl_users.user_id,tbl_users.email, stud_info.stud_id, stud_info.first_name,stud_info.last_name,stud_info.email,stud_info.course,stud_info.is_confirmed,stud_info.confimed_by FROM tbl_users INNER JOIN stud_info ON tbl_users.user_id=stud_info.stud_id;


SELECT tbl_users.username,tbl_users.user_id,tbl_users.email, stud_info.stud_id, stud_info.first_name,stud_info.last_name,stud_info.email,stud_info.course,stud_info.is_confirmed,stud_info.confimed_by FROM tbl_users INNER JOIN stud_info ON tbl_users.user_id=stud_info.stud_id WHERE is_deleted = 'no';


$q = "select * from $table_name where is_deleted = 'no'";