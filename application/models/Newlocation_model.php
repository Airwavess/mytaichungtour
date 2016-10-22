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

        public function set_news()
        {
            $this->load->helper('url');

            

            $data = array(
                'lc_name' => $this->input->post('lc_name'),
	            'img_path' => $this->input->post('img_path'),
	            'description' => $this->input->post('description'),
	            'address' => $this->input->post('address'),
	            'lat' => $this->input->post('lat'),
	            'lng' => $this->input->post('lng')
            );

            return $this->db->insert('location', $data);
        }
}