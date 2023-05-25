<?php
class stud_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
        
	}

    

	public function get_data($table_name)
	{ 
		$q = "select * from $table_name where is_deleted = 'no' ";
		$query = $this->db->query($q);

		// echo $this->db->last_query();exit;
		

		//$query = $this->db->get('student');
		return $query->result_array();

	//	echo "<pre>"; print_r($query->result_array());exit;
	}

	public function insert_data($table_name,$arr)
	{
		
       $this->db->insert('student',$arr);
          
	}

	public function update_data($table_name,$update_arr,$id)
	{    
		// $data = array();
		$this->db->where('id',$id);
         $update = $this->db->update('student',$update_arr);
         // echo $this->db->last_query();exit;
       // $data=$update->result_array();
       //   return $data;
         // return $update->result_array();
    }

    public function delete($table_name,$update_arr,$id)
    {
    	$this->db->where('id',$id);
        $update = $this->db->update('student',$update_arr);

    }

    public function get_count()
    {
    	return $this->db->count_all('student',$arr);
    }

    public function get_authors($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('student',$arr);

        return $query->result();
    }
}
?>

