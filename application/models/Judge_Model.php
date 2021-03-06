<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Judge_Model extends CI_Model {

	public function inst($judge_data)
	{
		$data=array(
			'JU_NUMOFSTAR'=>$judge_data['star_value'],
			'JU_CONTENT'=>$judge_data['judge_content']
			);
		$this->db->insert('Judge', $data);
	}

	public function selt()
	{
		$query = $this->db->get('Judge');
		return $query->result_array();
	}
}

/* End of file Judge_Model.php */
/* Location: ./application/models/Judge_Model.php */