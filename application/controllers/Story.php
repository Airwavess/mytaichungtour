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
		
	}

	public function inst_story() 
	{
		$this->load->view('Story/inst_story');
	}

	public function inst_db_story() 
	{
		$this->Story_Model->inst_story($_POST);
	}
}

/* End of file Story.php */
/* Location: ./application/controllers/Story.php */