<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Story extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Story_Model');
	}
	public function index()
	{
		$this->load->view('back/header');
		$this->load->view('back/navsidebar');
		$this->load->view('back/footer');
	}

	public function upt_story() 
	{
		$this->load->view('back/header');
		$this->load->view('Story/upt_story');
		$this->load->view('back/footer');
	}

	public function upt_db_story() 
	{
		$this->Story_Model->upt_story($_POST);
		redirect('Story/upt_story','refresh');
	}

	public function sel_story()
	{
		$var=$this->input->POST('story_id');
		$query=$this->Story_Model->sel_story($var);
		echo json_encode($query);
	}
	public function user(){
		$this->load->view('index.php');
	}
}

/* End of file Story.php */
/* Location: ./application/controllers/Story.php */