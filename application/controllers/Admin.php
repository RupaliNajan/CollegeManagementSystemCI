<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() 
	{  error_reporting(0);
		parent::__construct();
		$this->arr_data = array();
     $this->load->model('AllQueries');
     $this->load->library("pagination");

  }

  
  public function adminPanel()
  {   
    
     $arrdata = $this->AllQueries->AdminStudInfo('stud_info');
    	
       // echo"<pre>";
       //  print_r($arrdata);// echo"<pre>";
    	// print_r($arrdata);exit;
     $this->arr_data['getdata'] = $arrdata;
     $this->load->view('admin_panel',$this->arr_data);
  }

  //  public function view()
  //  {
  //       $student_list = $this->AllQueries->fetch_stud_data();
		// $this->load->view('Aview',['student_list'=>$student_list]);

  //  } 

  public function get_student_data()
  {
    $id = $this->input->get('id');
    $get_student = $this->AllQueries->get_student_data_model($id);
    echo json_encode($get_student); 
    exit();
 }


 public function view()
 {

    if(isset($_POST['checking_viewbtn']))
    {
   		// echo "hiifh";exit;
     $stud_id = $_POST['student_id'];

     $query ="select* from stud_info where stud_id='$stud_id'";
   		// print_r($query);exit;
     $getdata = $this->db->query($query)->result_array();
         // echo "<pre>";print_r($getdata);exit;
     if(($getdata) >0)
     {
      foreach($getdata as $data)

      {
       echo $return ='
       <h5> Stud_id    :'.$data['stud_id'].'</h5>
       <h5> Roll_No    : '.$data['roll'].'</h5>  
       <h5> first_name : '.$data['first_name'].'</h5>
       <h5> last_name  : '.$data['last_name'].'</h5>
       <h5> email      : '.$data['email'].'</h5>
       <h5> course     : '.$data['course'].'</h5>
       ';

   				// print_r($return);
    }	
 }
}
}


public function confirm()
{
 if(isset($_POST["c_id"]) && !empty($_POST["c_id"]))
 {

    $stud_id = $_POST["c_id"];

    $update_data= array('is_confirmed'=> '1');
                // print_r($update_data);exit;

    if($this->AllQueries->updateRecord('stud_info',$update_data,$stud_id))
    {
      echo '1';
      $conf_insert = array(
         "confimed_by" => $this->session->userdata('user_id')
      );
      $this->db->where('stud_id',$stud_id);
      $this->db->update('stud_info', $conf_insert);
      $this->AllQueries->getuserId();
                // echo $this->db->last_query();exit;

   }
   else
   { 
     echo '0';

  }

}   
$arr= $this->AllQueries->display('stud_info');
$this->arr_data['getdata'] = $arr;
                // print_r($this->arr_data);exit;
$this->load->view('admin_panel',$this->arr_data);
                // echo $this->db->last_query();exit;

}


//export data into csv format
public function exportCSV()
  {
    
    //csv file name
    $filename = 'users_'.date('Ymd').'.csv';
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$filename");
    header("Content-Type: application/csv; "); 

    // get data
    $usersData = $this->AllQueries->StudInfo('stud_info');
      // print_r($usersData);
    // file creation
    $file = fopen('php://output', 'w');

    $header = array("Stud id","First Name","Last Name","Mother Name","Father Name","Email","C_address","P_address","Pincode","Course",);
    fputcsv($file, $header);

    foreach ($usersData as $data){
     fputcsv($file,$data);
    }

    fclose($file);
    exit;
  }


  function mypdf(){


  $this->load->library('pdf');


    $this->pdf->load_view('stud_data');
    $this->pdf->createPDF($php, 'mypdf', false);

    $this->pdf->stream("welcome.pdf");
   }

}


?>