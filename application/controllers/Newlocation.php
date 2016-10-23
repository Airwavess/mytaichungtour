<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newlocation extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Newlocation_model');
        }
        
        public function index()
        {
        $data = $this->Newlocation_model->get_location();
        $title = '景點管理';
        $this->load->view('back/header');
        $this->load->view('newlocation/index', array('data' => $data));
        $this->load->view('back/footer');
        }

        public function view($data = NULL)
        {
        $data['news_item'] = $this->Newlocation_model->get_location($slug);

        if (empty($data['news_item']))
        {
                show_404();
        }

        $data['title'] = $data['news_item']['title'];

        $this->load->view('newlocation/header');
        $this->load->view('newlocation/view', $data);
        $this->load->view('newlocation/footer');
        }
        
        public function create()
        {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = '新增景點';
     
        $this->form_validation->set_rules('lc_name', 'lc_name', 'required');
        $this->form_validation->set_rules('img_path', 'img_path', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('lat', 'lat', 'required');
        $this->form_validation->set_rules('lng', 'lng', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('back/header.php', $data);
            $this->load->view('newlocation/create.php');
            $this->load->view('back/footer.php');

        }
        else
        {
            $this->Newlocation_model->set_news();
            $this->load->view('newlocation/success');
            redirect(site_url("newlocation/index"));
        }
        }
}