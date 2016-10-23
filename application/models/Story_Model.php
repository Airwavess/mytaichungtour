<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Story_Model extends CI_Model {

	public function upt_story($data)
	{
		$story_data=array(
			'st_name'=>$data['story_name'],
			'st_content'=>$data['story_content']
			);
		$this->db->where('st_id', $data['story_id']);
		$this->db->update('Story', $story_data);
	}

	public function sel_story($id)
	{
		$this->db->where('st_id', $id);
		$query=$this->db->get('Story');
		return $query->row_array();
	}
}

/* End of file Story_Model.php */
/* Location: ./application/models/Story_Model.php */