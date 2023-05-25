<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentInfo extends CI_controller
{
 public function stud_data()
    {
    	$this->db->where('email', $this->session->userdata('email'));
               // echo $this->db->last_query();exit;
               $data['single_stud_data'] = $this->db->get('stud_info')->result_array();

               $this->load->view('stud_data',$data);
    }

    function mypdf(){


  $this->load->library('pdf');


    $this->pdf->load_view('stud_data');
    $this->pdf->createPDF($php, 'mypdf', false);

    $this->pdf->stream("welcome.pdf");
   }
}
?>