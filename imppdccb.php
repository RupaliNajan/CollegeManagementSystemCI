<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Photogallery extends CI_Controller {

	public function __construct()
	{	
		 parent::__construct(); 
	}
	
	public function mainAlbum()
        {
            $aData = array();
            $this->db->group_by('main_album_master.aa_id');
            // print_r($test);exit;
            $this->db->join('album_master','album_master.a_album_main = main_album_master.aa_id');
            $aData['mainAlbum'] = $this->master_model->getRecords('main_album_master','','main_album_master.aa_id, main_album_master.aa_title,main_album_master.aa_image',array('main_album_master.aa_id'=>'DESC'));
            //print_r($test);exit;
            $aData['middle_content'] = 'mainAlbum';
            $this->load->view('common_view',$aData);
        }
	public function album()
	{	
		$aData = array();
		$this->db->group_by('album_master.a_id'); 
		$this->db->join('photo_master','photo_master.photo_album = album_master.a_id');
		$aData['aAlbum'] = $this->master_model->getRecords('album_master','','album_master.a_id, album_master.a_title,album_master.a_image',array('album_master.a_id'=>'DESC'));
                //print_r($aData);exit;
		$aData['middle_content'] = 'album_view';
		$this->load->view('common_view',$aData);
	}
	
	
	public function gallery($albumID = 0)
	{	
		$aData = array();
		$where = array('photo_album'=>$albumID,'status'=>'Published');
		$this->db->join('album_master','album_master.a_id = photo_master.photo_album');
		$aData['aPhoto'] = $this->master_model->getRecords('photo_master',$where,'',array('photo_master.insert_date'=>'DESC'));
		// print_r($aData['aPhoto']);
		$aData['middle_content'] = 'photo_view';
		$this->load->view('common_view',$aData);
	}
}









$aData = array();
                //print_r($aData);exit;
		$where = array('album_master'=>$aa_id,'status'=>'Published'); 
                //print_r($where);exit;
		//$this->db->join('photo_master','photo_master.photo_album = album_master.a_id');
		//$aData['aAlbum'] = $this->master_model->getRecords('album_master',$where,'',array('album_master.insert_date'=>'DESC'));
                //print_r($aData);exit;
		//$aData['middle_content'] = 'album_view';
		//$this->load->view('common_view',$aData);




		$this->db->join('main_album_master','main_album_master.aa_id = album_master.a_album_main');



		$aData = array();
		$where = array('album_master.a_id' => $aalbumID);
		$this->db->join('main_album_master','main_album_master.aa_id = album_master.a_album_main');
                $aData['aAlbum'] = $this->master_model->getRecords('album_master',$where,'',array('album_master.insert_date'=>'DESC'));  
                 //print_r($aData['aAlbum']);exit;           
	        echo $this->db->last_query();exit;
               
                //$this->db->last_query();exit;
		$aData['middle_content'] = 'album_view';
		$this->load->view('common_view',$aData);


		SELECT * FROM `pdccb_album_master` JOIN `pdccb_main_album_master` ON `pdccb_main_album_master`.`aa_id` = `pdccb_album_master`.`a_album_main` WHERE `pdccb_album_master`.`a_id` = '6' ORDER BY `pdccb_album_master`.`insert_date` DESC



		

           $aData = array();
           print_r($aData );exit;
           $test=$this->db->group_by('main_album_master.aa_id');
         
           $this->db->join('album_master','album_master.a_album_main = main_album_master.aa_id)
           $aData['mainAlbum'] = $this->master_model->getRecords('main_album_master','','main_album_master.aa-id,main_album_master.aa_title,main_album_master.aa_image',array('main_album_master.aa_id'=>'DESC'));
           $aData['middle_content'] = 'mainAlbum';
           $this->load->view('common_view',$aData);


           $aData = array();
		$where = array('album_master.a_id' => $aalbumID);
		$this->db->join('main_album_master','main_album_master.aa_id = album_master.a_album_main');
                $aData['aAlbum'] = $this->master_model->getRecords('album_master',$where,'',array('album_master.insert_date'=>'DESC'));  
                 //print_r($aData['aAlbum']);exit;           
	        echo $this->db->last_query();exit;
               
                //$this->db->last_query();exit;
		$aData['middle_content'] = 'album_view';
		$this->load->view('common_view',$aData);

		SELECT * FROM `pdccb_album_master` JOIN `pdccb_main_album_master` ON `pdccb_main_album_master`.`aa_id` = `pdccb_album_master`.`a_album_main` WHERE `pdccb_album_master`.`a_album_main` = '6' ORDER BY `pdccb_album_master`.`insert_date` DESC