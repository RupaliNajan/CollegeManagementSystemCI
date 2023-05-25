<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcom extends CI_Controller {

	
public function index()
	{  
	    // error_reporting(0);
	    // $this->load->model('AllQueries');
	    // $chkAdminExist = $this->AllQueries->chkAdminExist();
	    // echo $chkAdminExist;
	    // exit();
		// $this->load->view('home',['chkAdminExist'=>$chkAdminExist]);
		$this->load->view('home');
	}


public function adminRegister()
	{
		$this->load->model('AllQueries');
		$roles = $this->AllQueries->getRoles();
		// echo "<pre>";
		// print_r($roles);
		// exit();
		$this->load->view('register',['roles'=>$roles]);
		
	}


public function adminSingup()
	{   error_reporting(0);
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('role_id','Role_id','required');
		$this->form_validation->set_rules('password','Password','required');
		
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

		if($this->form_validation->run())
         {
         	 $username = $this->input->post('username');
         	 // print_r($username);exit;
         	  $email = $this->input->post('email');
         	   $gender = $this->input->post('gender');
         	    $role_id = $this->input->post('role_id');
         	     $password = $this->input->post('password');
         	    
             $data = array(
             			'username'=> $username,
             			'email'   => $email,
             			'gender'   => $gender,
             			'role_id'   => $role_id,
             			'password'   => $password,
             			
             );
             // echo "<pre>"; print_r($data);exit;
             $data['password']=sha1($this->input->post('password'));
            
             
             $this->load->model('AllQueries');
             if( $this->AllQueries->registerAdmin($data) )
             {
                $this->session->set_flashdata('message','Admin Register Successfully');
                redirect("Welcom/login");
             }
             else
             {
                $this->session->set_flashdata('message','Failed to register Admin');
                redirect("Welcom/adminRegister");
             }
         }
         else
         {
               $this->adminSingup();
         }
	}


public function login()
	{
		$this->load->view('login');
	}



public function singin()
	{
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_error_delimiters('<div
			class="text-danger">','</div>');
		if($this->form_validation->run())
		{
           $email=$this->input->post('email');
           $password= sha1($this->input->post('password'));
           $this->load->model('AllQueries');
           $userExist = $this->AllQueries->adminExist($email,$password);
             // echo'<pre>';
             // print_r($userExist);
             // exit();
           if( $userExist )
           {
           	$sessionData = ['user_id' => $userExist->user_id,
                            'username' => $userExist->username,
                            'email' => $userExist->email,
                            'role_id' =>$userExist->role_id,
                        ];
                   $this->session->set_userdata($sessionData);  
                   return redirect("admin/adminPanel");  
           }
           else
           {
               $this->session->set_flashdata('message',"email or password is incorrect");
                  return redirect("welcom/login");
           }
		}
		else
		{
            $this->login();
		}
	}
}
