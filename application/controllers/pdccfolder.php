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
            $this->db->join('album_master','album_master.a_album_main = main_album_master.aa_id');
            $aData['mainAlbum'] = $this->master_model->getRecords('main_album_master','','main_album_master.aa_id, main_album_master.aa_title,main_album_master.aa_image',array('main_album_master.aa_id'=>'DESC'));
            $aData['middle_content'] = 'mainAlbum';
            $this->load->view('common_view',$aData);
        }

	public function album($aalbumID = 0)
	{	
		$aData = array();
		$where = array('album_master.a_album_main' => $aalbumID);
		$this->db->join('main_album_master','main_album_master.aa_id = album_master.a_album_main');
        $aData['aAlbum'] = $this->master_model->getRecords('album_master',$where,'',array('album_master.insert_date'=>'DESC'));  
		$aData['middle_content'] = 'album_view';
		$this->load->view('common_view',$aData);
	}
	
	
	public function gallery($albumID = 0)
	{	
		$aData = array();
		$where = array('photo_album'=>$albumID,'status'=>'Published');
		$this->db->join('album_master','album_master.a_id = photo_master.photo_album');
		$aData['aPhoto'] = $this->master_model->getRecords('photo_master',$where,'',array('photo_master.insert_date'=>'DESC'));
		$aData['middle_content'] = 'photo_view';
		$this->load->view('common_view',$aData);
	}
}