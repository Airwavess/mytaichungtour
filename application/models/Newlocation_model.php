<?php
class Newlocation_model extends CI_Model {
    
    public function get_location($lc_id = FALSE)
    {
        if ($lc_id === FALSE)
        {
            $query = $this->db->get('location');
            return $query;
        }
        $query = $this->db->get_where('location', array('lc_id' => $lc_id));
        return $query;
    }
    
    public function add_location($data)
    {
        return $this->db->insert('location', $data);
    }
    public function getLocationById($lc_id)
    {
        $this->db->where('lc_id', $lc_id);
        $query = $this->db->get('location');
        return $query;
    }
    
    public function modify($lc_id,$data)
    {
        $this->db->where('lc_id', $lc_id);
        return $this->db->update('location',$data);
    }
    
    public function delete_location($lc_id)
    {
        $this->db->where('lc_id', $lc_id);
        $this->db->delete('location');
    }
}