<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_Model extends CI_Model {

	public function inst()
	{
		$member_data=array(
	        'name' => $this->input->post('name'),
	        'cellphone' => $this->input->post('cellphone'),
	        'account' => $this->input->post('account'),
	        'password' => $this->input->post('password')
	            
			);
		$this->db->insert('test', $member_data);
	}

}