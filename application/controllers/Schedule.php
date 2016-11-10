<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Newlocation_model');
	}

	public function index()
	{
		$this->load->view('Schedule/header');
		$this->load->view('Schedule/map');
		$this->load->view('Schedule/footer');
	}

	public function query(){
		$q = $this->input->get('q');
		if($q = 'location'){
			$data = $this->Newlocation_model->get_location()->result_array();
			echo json_encode($data, JSON_UNESCAPED_UNICODE);
		}else{
			echo json_encode('[]', JSON_UNESCAPED_UNICODE);
		}
	}
}
