<?php 
class dropdown_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();

	}

	public function get_data()
	{
		$this->db->distinct();
		$this->db->select('zone');
		$this->db->from('zone_master');
		$query = $this->db->get();
        $response = $query->result_array();
		// $q = $this->db->query('SELECT DISTINCT zone FROM zone_master');
        // $response = $q->result_array();
        // $this->db->last_query();exit;
		return $response;
	}


	

   public function get_office_data($dataz)
   {
       // $this->db->distinct();
       // $this->db->select('offices');
       // $this->db->where('zone_master', $id);
       // $que = $this->db->get('offices');
       // $response = $que->result_array();

       $q = $this->db->query("select DISTINCT offices from zone_master where zone= '$dataz'");
        // echo $this->db->last_query();exit;
       $response = $q->result_array();
       return $response;
   	     
   }

   public function get_dept_data($dataz,$arrdata)
   {
   	 $qu = $this->db->query("select DISTINCT dept from zone_master where zone='$dataz' and offices= '$arrdata'");

   	  $response = $qu->result_array();
   	  // echo $this->db->last_query();exit;
       return $response;
   }

	public function insert_data($arr)
	{
		$this->db->insert('zone_master',$arr);
		return true;
	}

	public function insert($arrvalue)
	{
		$this->db->insert('user_data',$arrvalue);
		return true;
	}

	public function get_user_data()
	{

	$query = $this->db->get('user_data');
	// echo $this->db->last_query();exit;
		return $query->result_array();
	}


	
}
?>