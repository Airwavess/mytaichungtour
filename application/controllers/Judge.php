<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Judge extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Judge_Model','JM');	
	}

	public function index()
	{
		$data=$this->JM->selt();
		$content=array(
			'content'=>$data
			);
		$this->load->view('Judge/Judge', $content);
	}

	public function inst_cont() 
	{
		$this->JM->inst($_POST);
		redirect('Judge/index','refresh');		
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */