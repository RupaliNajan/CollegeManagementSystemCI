<?php
class AllQueries extends CI_model
{
	public function getRoles()
	{
		$roles = $this->db->get('tbl_roles');
		if($roles->num_rows() > 0)
		{
          return $roles->result();
		}
	}

	public function registerAdmin($data)
	{
		return $this->db->insert('tbl_users',$data);
	}

	public function chkAdminExist()
	{
		$chkAdmin = $this->db->where(['role_id'=>'1'])->get('tbl_users');
        if( $chkAdmin->num_rows() > 0)
        {
        	return $chkAdmin->num_rows();
        }
	}

	public function adminExist($email,$password)
	{
		$chkAdmin = $this->db->where(['email'=>$email,'password'=>$password])->get('tbl_users');
		if($chkAdmin->num_rows() > 0)
		{
			return $chkAdmin->row();
		}
	}

	public function stud_insert($table_name,$studData)
	{
		return $this->db->insert('stud_info',$studData);
	}

	public function getstudData($table_name)
	{
		$query = $this->db->get('states');
        $response = $query->result_array();
        // $this->db->last_query();exit;
        return $response;
	}

	public function get_stud_city($state_id)
    {
    	$this->db->where('state_id',$state_id);
		 $this->db->select('*');
		 $q=$this->db->get('cities');
     //echo $this->db->last_query();exit;
		 $response = $q->result_array();
		 //echo "<pre>"; print_r($response) ;exit; 
         
          return $response;
	}

	public function stud_Exist($email,$password)
	{
		$chkStud = $this->db->where(['email'=>$email,'password'=>$password])->get('stud_info');
		// echo $this->db->last_query();exit;
		if($chkStud->num_rows() > 0)
		{
			return $chkStud->row();
		}
		// echo $this->db->last_query();exit;
	}

	public function AdminStudInfo($table_name)
	{

		$q = "SELECT tbl_users.username,tbl_users.user_id,tbl_users.email, stud_info.stud_id, stud_info.first_name,stud_info.last_name,stud_info.email,stud_info.course,stud_info.is_confirmed,stud_info.confimed_by FROM tbl_users JOIN stud_info ON tbl_users.user_id=stud_info.stud_id WHERE is_deleted = 'no'";

		$query = $this->db->query($q);
		// $query = $this->db->get('stud_info');
		// echo $this->db->last_query();exit;
		return $query->result_array();
	}
//Use for Export data into csv
	public function StudInfo($table_name)
	{
		$q = "select stud_id,first_name,last_name,m_name,f_name,email,c_address,p_address,pincode,course from stud_info";
		$query = $this->db->query($q);
		return $query->result_array();
	}

	public function update_data($table_name,$update_Data,$stud_id)
	{  
		$this->db->where('stud_id',$stud_id);
		// echo $this->db->last_query();exit;
		$this->db->update('stud_info',$update_Data,$stud_id);

	}

	public function fetch_stud_data()
	{
		return $this->db->select('*')
		->from('stud_info')
		->get()
		->result();
		echo $this->db->last_query();exit;
	}


    public function delete($table_name,$update_arr,$stud_id)
    {
    	$this->db->where('stud_id',$stud_id);
        $update = $this->db->update('stud_info',$update_arr);
          return $update;
     }    

   public function checked($table_name,$check,$stud_id)
    {
    	$this->db->where('stud_id',$stud_id);
        $insert = $this->db->insert('stud_info',$check);
          return $insert;
     }   


 public function updateRecord($tbl_name,$data_array,$stud_id)

	{

		$this->db->where('stud_id',$stud_id);	

		if($this->db->update($tbl_name,$data_array))
     
		{return true;}

		else

		{return false;}
 // 
	}  

	public function display($table_name)
	{
		$q = "select * from $table_name where is_confirmed = '1' ";
		$query = $this->db->query($q);
		// echo $this->db->last_query();exit;
		return $query->result_array();
	}

	public function getuserId()
	{
		$this->db->select('username');
		$this->db->from('tbl_users');
	  $this->db->join('stud_info','tbl_users.user_id=stud_info.confimed_by');
	  $query = $this->db->get();
	  // echo $this->db->last_query();exit;
	  return $query->result();
	}

 


}
?>