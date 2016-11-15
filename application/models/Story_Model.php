<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Story_Model extends CI_Model {
    
    public function upt_story($data)
    {
        $story_data=array(
            $data['story_name']=>$data['story_content']
        );
        $this->db->where('st_ch', $data['story_ch']);
        $this->db->update('story', $story_data);
    }
    
    public function sel_story($ch)
    {
        $this->db->where('st_ch', $ch);
        $query=$this->db->get('story');
        return $query->row_array();
    }

    public function sel_fixed_story()
    {
        $this->db->where('stf_id', 1);
        $query=$this->db->get('story_fixed');
        return $query->row_array();
    }

    public function upt_fixed_story($data)
    {
        $story_data=array(
            $data['story_name']=>$data['story_content']
        );
        $this->db->where('stf_id', 1);
        $this->db->update('story_fixed', $story_data);
    }

    public function sel_location($story_character)
    {
        $this->db->where('stl_character', $story_character);
        $query=$this->db->get('story_location');
        return $query->row_array();
    }
}

/* End of file Story_Model.php */
/* Location: ./application/models/Story_Model.php */