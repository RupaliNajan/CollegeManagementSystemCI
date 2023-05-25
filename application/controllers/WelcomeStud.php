<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WelcomeStud extends CI_controller
  {
    public function __construct()
     {
        error_reporting(0);
        parent:: __construct();

        $this->stud_arr = array();
        $this->st_info =array();
        $this->load->model('AllQueries');
        $this->load->library("pagination");
     }


    public function fetch_stud_ci()
     {
        $postData=$this->input->post();
        
        $data=$this->AllQueries->get_stud_city($postData['state']);
        // echo "<pre>"; print_r($data) ;exit; 
         

        echo json_encode($data); 
    }
       
     

  	public function StudRegister()
  	{
  		$this->load->model('AllQueries');
  		error_reporting(0);
  	  if($this->input->post('register'))
    	{ 
          $this->form_validation->set_rules('roll','Roll','Required');
    	  $this->form_validation->set_rules('first_name','First_name','Required');
    	  $this->form_validation->set_rules('last_name','Last_name','Required');
    	  $this->form_validation->set_rules('m_name','mother_name','Required');
    	  $this->form_validation->set_rules('f_name','Father_name','Required');
    	  $this->form_validation->set_rules('c_address','C_address','Required');
    	  $this->form_validation->set_rules('p_address','P_address','Required');
    	  $this->form_validation->set_rules('gender','Gender','Required');
    	  $this->form_validation->set_rules('state','State','Required');
    	  $this->form_validation->set_rules('city','City','Required');
    	  $this->form_validation->set_rules('DOB','dob','Required');
    	  $this->form_validation->set_rules('pincode','Pincode','Required');
    	  $this->form_validation->set_rules('course','course','Required');
    	  $this->form_validation->set_rules('email','Email','Required');
        $this->form_validation->set_rules('password','Password','Required');

    	if($this->form_validation->run() == TRUE)
    	{
        $roll = $this->input->post('roll');
    		$first_name = $this->input->post('first_name');
    		$last_name = $this->input->post('last_name');
    		$m_name = $this->input->post('m_name');
    		$f_name = $this->input->post('f_name');
    		$c_address = $this->input->post('c_address');
    		$p_address = $this->input->post('p_address');
    		$gender = $this->input->post('gender');
    		 // print_r($gender);exit;
    		$state = $this->input->post('state');
            // print_r($state);exit;
    		$city = $this->input->post('city');
    		$DOB = $this->input->post('DOB');
    		$pincode = $this->input->post('pincode');
    		$course = $this->input->post('course');
    		$email = $this->input->post('email');
        $password = $this->input->post('password');
        $is_confirmed = $this->input->post('is_confirmed');
        $confimed_by = $this->input->post('confimed_by');
            $studData= array (
                             'roll' => $roll,
            	             'first_name' => $first_name,
            	             'last_name' => $last_name,
            	             'm_name' => $m_name,
            	             'f_name' => $f_name,
            	             'c_address' => $c_address,
            	             'p_address' => $p_address,
            	             'gender' => $gender,
            	             'state' => $state,
            	             'city' => $city,
            	             'DOB' => $DOB,
            	             'pincode' => $pincode,
            	             'course' => $course,
            	             'email' => $email,
                           'password' => $password,
                           'is_confirmed' =>$is_confirmed,
                           'confimed_by' =>$confimed_by,
            );
            // print_r($studData);exit;

            if($this->AllQueries->stud_insert('stud_info',$studData))
            {
                $this->session->set_flashdata('message','Student Register Successfully');
                
                redirect("WelcomeStud/studLogin");
            }

            else
             {
                $this->session->set_flashdata('message','Failed to register Admin');
                redirect("Welcom/adminRegister");
             }
    	}
      }

        $getsdData = $this->AllQueries->getstudData('states');
          // print_r($getsdData);exit;
        $this->stud_arr['getsdData'] = $getsdData ;
        
        $this->load->view('stud_register',$this->stud_arr);
         // $this->load->view('stud_register');   
      }
  	


    public function studLogin()
    { 
       error_reporting(0);     
    	$this->form_validation->set_rules('email','Email','Required');
        $this->form_validation->set_rules('password','Password','Required');
    	

        if($this->form_validation->run()==true)
        {

           $email    = $this->input->post('email');
           $password = $this->input->post('password');
              // print_r($password);exit;
            $this->load->model('AllQueries');
           $stExist = $this->AllQueries->stud_Exist($email,$password);
            // echo'<pre>';
            //  print_r($stExist);
            //  exit();
           


           if($stExist)
           {

              $sessionData = [
                                'email'   => $stExist->email,
                                'password'=> $stExist->password,
              ];
              $this->session->set_userdata($sessionData);

              // print_r($sessionData);exit;
              //For Displaying Student information.
               
               
                
               

                return redirect("StudentInfo/stud_data");
           }
            else
           {
               $this->session->set_flashdata('message',"email or password is incorrect");
                  return redirect("WelcomeStud/studLogin");
           }
        }
    
        $this->load->view('stud_login');
    }

    public function delete($stud_id)
     {
        
      if($stud_id)
      {
        $update_arr = array(
          'is_deleted' => 'yes'
        );
        // print_r($update_arr);exit;
         $deleted = $this->AllQueries->delete('stud_info',$update_arr,$stud_id);
        
        if($deleted)
         {
         
            $this->session->set_flashdata('message',"information deleted successfully");
         }
         else
         {
          $this->session->set_flashdata('message',"error,some problem is occur");
         }
      }
      redirect('admin/adminPanel');
  }

   
    
}
?>