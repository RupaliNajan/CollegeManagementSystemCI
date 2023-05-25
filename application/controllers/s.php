//     public function edit()
//     {
//     	if($this->input->post('register'))
//     	{ 
//           $this->form_validation->set_rules('roll','Roll','Required');
//     	  $this->form_validation->set_rules('first_name','First_name','Required');
//     	  $this->form_validation->set_rules('last_name','Last_name','Required');
//     	  $this->form_validation->set_rules('m_name','mother_name','Required');
//     	  $this->form_validation->set_rules('f_name','Father_name','Required');
//     	  $this->form_validation->set_rules('c_address','C_address','Required');
//     	  $this->form_validation->set_rules('p_address','P_address','Required');
//     	  $this->form_validation->set_rules('gender','Gender','Required');
//     	  $this->form_validation->set_rules('state','State','Required');
//     	  $this->form_validation->set_rules('city','City','Required');
//     	  $this->form_validation->set_rules('DOB','dob','Required');
//     	  $this->form_validation->set_rules('pincode','Pincode','Required');
//     	  $this->form_validation->set_rules('course','course','Required');
//     	  $this->form_validation->set_rules('email','Email','Required');
//           $this->form_validation->set_rules('password','Password','Required');

//     	if($this->form_validation->run() == TRUE)
//     	{
//             $roll = $this->input->post('roll');
//     		$first_name = $this->input->post('first_name');
//     		$last_name = $this->input->post('last_name');
//     		$m_name = $this->input->post('m_name');
//     		$f_name = $this->input->post('f_name');
//     		$c_address = $this->input->post('c_address');
//     		$p_address = $this->input->post('p_address');
//     		$gender = $this->input->post('gender');
//     		 // print_r($gender);exit;
//     		$state = $this->input->post('state');
//             // print_r($state);exit;
//     		$city = $this->input->post('city');
//     		$DOB = $this->input->post('DOB');
//     		$pincode = $this->input->post('pincode');
//     		$course = $this->input->post('course');
//     		$email = $this->input->post('email');
//             $password = $this->input->post('password');

//             $update_Data= array (
//                              'roll' => $roll,
//             	             'first_name' => $first_name,
//             	             'last_name' => $last_name,
//             	             'm_name' => $m_name,
//             	             'f_name' => $f_name,
//             	             'c_address' => $c_address,
//             	             'p_address' => $p_address,
//             	             'gender' => $gender,
//             	             'state' => $state,
//             	             'city' => $city,
//             	             'DOB' => $DOB,
//             	             'pincode' => $pincode,
//             	             'course' => $course,
//             	             'email' => $email,
//                              'password' => $password,
//             );

//             $this->AllQueries->update_data('stud_info',$update_Data,$stud_id);
//         }
//     }
//     // $q = $this->db->query("select * from stud_info where stud_id = $stud_id");
   
//     // $this->arr_data['getdata'] = $q->result_array();
//     // echo $this->db->last_query();exit;

//     // $arrdata = $this->AllQueries->AdminStudInfo('stud_info');
//     // $this->arr_data['getdata'] = $arrdata;
//     $this->load->view('adminEdit',$this->arr_data);
// }








public function details()

	{

		$id = $this->uri->segment(4);

	

		$page_info = $data['page_info'] = $this->master_model->getRecords("page_master",array("pageid"=>$id));

		$data = array('middle_content'=>'page_details','page_title'=>"Front Page Detail Information",'page_info'=>$page_info,'show_last_modified'=>date("d-m-Y",strtotime($page_info[0]['last_modified'])));

		$this->load->view('admin/admin_combo',$data);

	}



	 <!-- View pop-up model -->
  <!--  <div class="modal fade" id="myModal" role="dialog">
             <div class="modal-dialog">
     -->
      <!-- Modal content-->
              <!-- <div class="modal-content">
                 <div class="modal-header">
                     
                       <h4 class="modal-title">student data</h4>
             </div>
               <div class="modal-body">
                   <div>
                      <label class="form-label" for="form3Example1m">Student Id</label>
                          <?php echo $data['stud_id'];?> 
                    </div>

                   <div>
                      <label class="form-label" for="form3Example1m">Roll No</label>
                          <?php echo $data['roll'];?> 
                    </div>

                    <div>
                      <label class="form-label" for="form3Example1m">First name</label>
                          <?php echo $data['first_name'];?> 
                    </div>

                    <div>
                      <label class="form-label" for="form3Example1m">Last name</label>
                          <?php echo $data['last_name'];?> 
                    </div>

                    <div>
                      <label class="form-label" for="form3Example1m">Mother name</label>
                          <?php echo $data['m_name'];?> 
                    </div>

                    <div>
                      <label class="form-label" for="form3Example1m">father name</label>
                          <?php echo $data['f_name'];?> 
                    </div>

                    <div>
                      <label class="form-label" for="form3Example1m">Correspondance Address</label>
                          <?php echo $data['c_address'];?> 
                    </div>

                    <div>
                      <label class="form-label" for="form3Example1m">Permanent Address</label>
                          <?php echo $data['p_address'];?> 
                    </div>

                    <div>
                      <label class="form-label" for="form3Example1m">Gender</label>
                          <?php echo $data['gender'];?> 
                    </div>

                    <div>
                      <label class="form-label" for="form3Example1m">State</label>
                          <?php echo $data['state'];?> 
                    </div>

                    <div>
                      <label class="form-label" for="form3Example1m">City</label>
                          <?php echo $data['city'];?> 
                    </div>

                    <div>
                      <label class="form-label" for="form3Example1m">Birth date</label>
                          <?php echo $data['DOB'];?> 
                    </div>

                    <div>
                      <label class="form-label" for="form3Example1m">Pincode</label>
                          <?php echo $data['pincode'];?> 
                    </div>

                    <div>
                      <label class="form-label" for="form3Example1m">Email</label>
                          <?php echo $data['email'];?> 
                    </div>
             
                  </div>
              </div>
              <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div> -->