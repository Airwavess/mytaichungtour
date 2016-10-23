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
		$this->db->update('story', $story_data);
	}

	public function sel_story($id)
	{
		$this->db->where('st_id', $id);
		$query=$this->db->get('story');
		return $query->row_array();
	}

	public function sel_location($story_character)
	{
		$this->db->where('stl_character', $story_character);
		$query=$this->db->get('story_location');
		return $query->row_array();
	}

	public function test_inst($data)
	{
		$inst_data=array(
				'test_name'=>$data['name']
			);
		$this->db->insert('table_name', $inst_data); 
	}
}

/* End of file Story_Model.php */
/* Location: ./application/models/Story_Model.php */