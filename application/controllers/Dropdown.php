<?php

class Dropdown extends CI_controller
{
	public function __construct()
	{
		//rror_reporting(0);
		error_reporting(0);
		parent::__construct();
       $this->load->model('dropdown_model');
       $custom_arr = array();
	}


	public function index()
	{
		//error_reporting(0);
		$getdata = $this->dropdown_model->get_data();
		$custom_arr['getdata'] = $getdata;
          // print_r($custom_arr['getdata']);exit;
		$this->load->view('userside',$custom_arr);
		  // print_r($test);exit;
	}

    public function fetch_office()
     {
     	$dataz = $this->input->post('zone');
     	$getdata = $this->dropdown_model->get_office_data($dataz);
    	//$office_arr['getdata'] = $getdata;
    	// return json_encode($getdata);
    	echo json_encode($getdata); 
     }

     public function fetch_dept()
     {     
     	  $dataz = $this->input->post('zone');
          $arrdata = $this->input->post('offices');
          $getdata = $this->dropdown_model->get_dept_data($dataz,$arrdata);
          // print_r($getdata);
          echo json_encode($getdata); 
     }

    

      public function admin()
    {
    	$this->load->view('dropdownlist');
    	 
    }
      public function user_data()
    {
    	$getdata = $this->dropdown_model->get_user_data();
    	// print_r($getdata);exit;
		$user_arr['getdata'] = $getdata;

		$this->load->view('datalist',$user_arr);
    }


   public function addData()
    {   
    	$this->input->post('submit');
    	{
    		$this->form_validation->set_rules('emp_id','Emp_id','required');
    		$this->form_validation->set_rules('emp_zone','Emp_Zone','required');
    		$this->form_validation->set_rules('emp_office','Emp_Offices','required');
    		$this->form_validation->set_rules('emp_dept','Emp_Dept','required');

    		if($this->form_validation->run()==TRUE)
                 $emp_id    = $this->input->post('emp_id');
              // print_r($emp_id);exit;
    			 $emp_zone    = $this->input->post('emp_zone');
                 $emp_office = $this->input->post('emp_office');
                 $emp_dept    = $this->input->post('emp_dept'); 
    			 
    			 $arrvalue =array(
    			 	'emp_id'   => $emp_id,
    			 	'emp_zone' => $emp_zone,
    			 	'emp_office'   => $emp_office,
    			 	'emp_dept'    => $emp_dept
    			 );
    			//  echo"<pre>";
    			// print_r($arrvalue);exit;
    		$this->dropdown_model->insert($arrvalue);
    		redirect('Dropdown/user_data');
    	}
    	$this->load->view('datalist');
    }

	public function add()
	{ $this->load->model('dropdown_model');
		// echo "hii";exit;
		$this->input->post('submit');
		{
			$this->form_validation->set_rules('zone','Zone','required');
			$this->form_validation->set_rules('offices','Offices','required');
			$this->form_validation->set_rules('dept','Dept','required');
            // print_r($test);
		if($this->form_validation->run() == TRUE)
		  	 // echo "hii";exit;
             $zone    = $this->input->post('zone');
             $offices = $this->input->post('offices');
             $dept    = $this->input->post('dept');
               // print_r($dept);
             $arr=array(
					'zone'  => $zone,
					'offices'   => $offices,
					'dept'  => $dept
                   
				);
		  	      // print_r($arr);

		     $this->dropdown_model->insert_data($arr);

		     $this->session->set_flashdata('success_message', 'Your data inserted successfully');
			     
		    //  print_r($test);exit;
		}
		$this->load->view('dropdownlist');
	}
}
?>