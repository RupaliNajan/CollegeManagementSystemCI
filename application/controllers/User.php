<?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 class User extends CI_Controller {  
      
      public function __construct()
	{   
		error_reporting(0);

		parent::__construct();

        $this->load->model("user_model"); 
		$this->arr_data = array();
		$this->load->library('session');
	}

      public function index(){  
      	   $getArr = $this->user_model->get_all_data('user');
		   $this->arr_data['fetch_data'] = $getArr;
           $this->arr_data["title"] = "Datatable";  
           $this->load->view('userlist', $this->arr_data); 
          
      }  

      public function add()
	{  
		$data = array(); 
		$this->load->model("user_model"); 
		if($this->input->post('submit'))
		{
            $this->form_validation->set_rules('first_name', 'Fist_Name','required');
			$this->form_validation->set_rules('last_name','Last_Name','required');

			if($this->form_validation->run() === TRUE)
				$first_name  = trim($this->input->post('first_name'));
                  // print_r($first_name);
			    $last_name   = trim($this->input->post('last_name'));
                $image = trim($this->input->post('image'));
                // print_r($image);exit;
             //    echo"<pre>";
            	// print_r($_FILES['image']);exit;
            if(!empty($_FILES['image']['name'])){ 

               $imageName = $_FILES['image']['name'];
                  // print_r($imageName);exit;
                $config['upload_path']   = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = '50000000';
                $config['file_name']     = $imageName;
                
                 // echo"<pre>";
                 // print_r($config);exit;
                $this->load->library('upload',$config);
                  
                $test=$this->upload->initialize($config);
                 //    echo"<pre>";
                 // print_r($test);exit;
                if($this->upload->do_upload('image'))
                {
                 
				$arr=array(
					'first_name'  => $first_name,
					'last_name'   => $last_name,
                    'image' => $imageName
				);
                  //  echo"<pre>";
                  // print_r($arr);exit;    
              
				  $this->user_model->insert_data('user',$arr);
                  }
                 	// echo"<pre>";
                  // print_r($arr);exit;    

                 $this->session->set_flashdata('success_message', 'Your data inserted successfully');
				redirect('User');
                 
                 } 
			}
             
		 $this->load->view('useradd');
	}

	public function edit($id)
	{
       	if($this->input->post('submit'))
		{ 
             // echo "hi";exit;
			$this->form_validation->set_rules('first_name','first_name','required');
			$this->form_validation->set_rules('last_name','last_name','trim|required|min_length[4]');
			

			if($this->form_validation->run()==TRUE)
			// {   echo "hifg";exit;
				$first_name = trim($this->input->post('first_name'));
				$last_name  = trim($this->input->post('last_name'));
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
					'first_name' => $first_name,
					'last_name'  => $last_name,
					'image' => $imageName
				);
                 // print_r($update_arr);exit;
				$this->user_model->update_data('user',$update_arr,$id);
                 }
				}
				$this->session->set_flashdata('success_message','information updated successfully.');
				redirect('User');
			}



		$q = $this->db->query("select * from user where id = $id");
		//   // echo"<pre>";
  //   //             print_r($q);exit;
		$this->arr_data['fetch_data'] = $q->result_array();
        // print_r($this->arr_data['get_details'])
		$this->load->view('useredit',$this->arr_data);

	}


      function fetch_user(){  
           $this->load->model("user_model");  
           $fetch_data = $this->user_model->make_datatables(); 
           // echo"<pre>";
           //        print_r($fetch_data);exit;
           // echo $this->db->last_query();exit; 
           $data = array(); 
           $i=1; 
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                // $sub_array[] = $i;
                $sub_array[] = '<img src="'.base_url().'uploads/'.$row->image.'" class="img-thumbnail" width="50" height="35" />';  
                $sub_array[] = $row->first_name;  
                $sub_array[] = $row->last_name;  
                $sub_array[] = '<a href="'.base_url().'User/edit/'.$row->id.'" class="btn btn-warning btn-xs">edit</a>'; 
                // $sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs">Delete</button>';  
                $sub_array[] = '<a href="'. base_url().'User/delete/'.$row->id.'" class="btn btn-danger btn-xs" >delete</a>';
                $data[] = $sub_array;  
           }  

         $output = array(  
              "draw"             =>     intval($_POST["draw"]),  
              "recordsTotal"     =>      $this->user_model->get_all_data(),  
              "recordsFiltered"  =>      $this->user_model->get_filtered_data(),  
              "data"             =>     $data  
           );  
           echo json_encode($output);  
      }  

      public function delete($id)
	{
        $this->load->model("user_model");  

      if($id)
      {
      	$update_arr = array(
					'is_deleted' => 1
				);

         $delete = $this->user_model->delete('user',$update_arr,$id);
        
        if($delete)
         {
            $this->session->set_flashdata("information deleted successfully");
         }
         else
         {
         	$this->session->set_flashdata("error,some problem is occur");
         }
      }
      redirect('User');
	}
 }  