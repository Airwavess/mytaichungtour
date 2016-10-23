<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainPage extends CI_Controller {

	public function index()
	{
		$this->load->view('Index/index.php');
	}

}

/* End of file Index.php */
/* Location: ./application/controllers/Index.php */