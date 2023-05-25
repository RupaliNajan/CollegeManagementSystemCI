<?php

class Image extends CI_controller
{
	public function __construct()
	{  
		error_reporting(0);
		parent::__construct();

	} 

	public function index()
	{
		$this->load->view('img_view');
	}

	public function login()
	{ 
		// echo "hii";
		$data=[];
		$files = $_FILES;
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('gallary_name','Gallary_Name','required');
			$this->form_validation->set_rules('city','City','required');
   //          echo "<pre>";
			// print_r($test);
            if($this->form_validation->run() === true)
            {
            	$gallary_name = trim($this->input->post('gallary_name'));
            	$city         = trim($this->input->post('city'));
            	// $image        = trim($this->input->post('image'));
       //      	echo "<pre>";
			    // print_r($image);
                 $i = $_FILES; 
			    $allcount = count($_FILES['image']);
			    echo "<pre>";
			    print_r($_FILES['image']);exit;
			
			   for($i=0;$i<$allcount;$i++){
                  
      //             if(!empty($_FILES['image'][$i]))
      //             {
                     
      //             }
            }

		}
	}
}
}
?>