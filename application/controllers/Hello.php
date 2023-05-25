<?php 
class Hello extends CI_controller
{
	public function index()
	{   
		echo "hii";
	     $this->load->view('hello');
     }
}
?>