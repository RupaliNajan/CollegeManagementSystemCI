<?php
class Student extends CI_controller
{
	public function __construct()
	{   
		error_reporting(1);

		parent::__construct();

		$this->load->model('stud_model');
		$this->arr_data = array();
		$this->load->library('session');
	    // $this->load->library('form_validation');
	    // $this->load->helper('form');
	}

	public function index()
	{
		$getArr = $this->stud_model->get_data('student');
		$this->arr_data['get_details'] = $getArr;
		$this->arr_data['model_title'] = "List data";
		$this->load->view('list', $this->arr_data);
		// $this->load->library("pagination");
		

	}

	public function add()
	{ 
		 $data = array();
		$error='';
		if($this->input->post('submit'))
		{
            $this->form_validation->set_rules('name', 'Name','required');
			$this->form_validation->set_rules('mob','Mob','required');
			$this->form_validation->set_rules('city','City','required');
            // $this->form_validation->set_rules('image', 'Image', 'required');

			if($this->form_validation->run() === TRUE)
				$name  = trim($this->input->post('name'));
                  // print_r($name);
			    $mob   = trim($this->input->post('mob'));
			    $city  = trim($this->input->post('city'));
                $image = trim($this->input->post('image'));
                // print_r($image);exit;
// echo"<pre>";
//             	print_r($_FILES['image']);exit;
            if(!empty($_FILES['image']['name'])){ 

               $imageName = $_FILES['image']['name'];
                //   print_r($imageName);exit;
                $config['upload_path']   = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = '50000000';
                $config['file_name']     = $imageName;
                
                 // echo"<pre>";
                 // print_r($config);exit;
                $this->load->library('upload',$config);
                  
                $this->upload->initialize($config);
                // $this->upload->set_allowed_types('*');
                
                if($this->upload->do_upload('image'))
                {
                   
                   
				$arr=array(
					'name'  => $name,
					'mob'   => $mob,
					'city'  => $city,
                    'image' => $imageName
				);
                  //  echo"<pre>";
                  // print_r($arr);exit;    
              
				  $this->stud_model->insert_data('student',$arr);
                  }
                 	// echo"<pre>";
                  // print_r($arr);exit;    

                 $this->session->set_flashdata('success_message', 'Your data inserted successfully');
				redirect('Student');
                 
                 } 
			
                 
			}
             
		 $this->load->view('add');
	}

    public function pagination() {
       
        $config = array();
        $config["base_url"] = base_url() . "student";
        $config["total_rows"] = $this->stud_model->get_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $data["links"] = $this->pagination->create_links();

        $data['student'] = $this->stud_model->get_authors($config["per_page"], $page);

        $this->load->view('pagination', $data);
        // $this->load->view('edit',$this->arr_data);
    }


	public function edit($id)
	{

		if($this->input->post('submit'))
		{ 
             // echo "hi";exit;
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('mob','Mob','trim|required|min_length[4]');
			$this->form_validation->set_rules('city','City','required');

			if($this->form_validation->run()==TRUE)
			// {   echo "hifg";exit;
				$name = trim($this->input->post('name'));
				$mob  = trim($this->input->post('mob'));
				$city = trim($this->input->post('city'));
				$image= trim($this->input->post('image'));
                   // print_r($image);exit;   
				if(!empty($_FILES['image']['name']))
				{ 
                  
               $imageName = $_FILES['image']['name'];
                    // print_r($imageName);exit;
                 $config['upload_path']   = './uploads/';
                 $config['allowed_types'] = 'gif|jpg|png|jpeg';
                 $config['max_size']      = '50000000';
                 $config['file_name']     = $imageName;
                 // $config["total_rows"] = $this->authors_model->get_count();
                 // $config["per_page"] = 10;
                 // echo"<pre>";
                 // print_r($config);exit;
                $this->load->library('upload',$config);
                  
                $this->upload->initialize($config);
                // echo"<pre>";
                // print_r($test);exit;
                  
                if($this->upload->do_upload('image'))
                {
                	// echo "hii";
//                 	$error = array('error' => $this->upload->display_errors());
//                        print_r($error); exit;

				$update_arr = array(
					'name' => $name,
					'mob'  => $mob,
					'city' => $city,
					'image' => $imageName
				);
                 // print_r($update_arr);exit;
				$this->stud_model->update_data('student',$update_arr,$id);
                 }
				}
				$this->session->set_flashdata('success_message','information updated successfully.');
				redirect('Student');
			}



		$q = $this->db->query("select * from student where id = $id");
		//   // echo"<pre>";
  //   //             print_r($q);exit;
		$this->arr_data['get_details'] = $q->result_array();
        // print_r($this->arr_data['get_details'])
		$this->load->view('edit',$this->arr_data);

	}

	public function delete($id)
	{

      if($id)
      {
      	$update_arr = array(
					'is_deleted' => 'yes'
				);

         $delete = $this->stud_model->delete('student',$update_arr,$id);
        
        if($delete)
         {
            $this->session->set_flashdata("information deleted successfully");
         }
         else
         {
         	$this->session->set_flashdata("error,some problem is occur");
         }
      }
      redirect('Student');
	}
}
?>