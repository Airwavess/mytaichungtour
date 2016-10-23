<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Member_Model');
	}
	public function index()
	{
		$this->load->view('Member/memberlist');
		
		$this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('cellphone', 'cellphone', 'required');
        $this->form_validation->set_rules('account', 'account', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
     
	}

	public function inst_member() {
		$this->load->view('Member/membercheck');

	}
	public function insert()
	{
		$this->Member_Model->inst();
	}

}