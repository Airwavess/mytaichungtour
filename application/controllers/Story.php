<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Story extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Story_Model');
        $this->load->model('Newlocation_model');
    }
    public function index()
    {
        $data = $this->Newlocation_model->get_location();
        $this->load->view('Story/header');
        $this->load->view('Story/index', array('data' => $data));
        $this->load->view('Story/footer');

    }
    public function userStory()
    {
        $name = $this->input->get('name');
        $this->load->view('Story/header');
        $this->load->view('Story/my_story',array('name'=>$name ));
        $this->load->view('Story/footer');
    }
    public function my_story()
    {
        $user_name=$_GET['user_name'];
        $sequence_of_story=array('267','2367','23567','234567','1234567','12345678');
        $story_location=array();
        $story=array();
        for($i=0;$i<strlen($_GET['user_name']);$i++)
        {
            $location=$this->Story_Model->sel_location($user_name[$i]);
            array_push($story_location,$location['stl_location']);
        }
        for($i=0;$i<strlen($user_name);$i++)
        {
            $specific_story=$this->Story_Model->sel_story($sequence_of_story[strlen($user_name)-3][$i]);
            array_push($story,$specific_story);
        }
        $story_data=array(
        'story_user_name'=>$user_name,
        'story_location'=>$story_location,
        'story'=>$story
        );
        echo json_encode($story_data, JSON_UNESCAPED_UNICODE);
    }
    
    public function upt_story()
    {
        $this->load->view('back/header');
        $this->load->view('Story/upt_story');
        $this->load->view('back/footer');
    }
    
    public function upt_db_story()
    {
        $this->Story_Model->upt_story($_POST);
        redirect('Story/upt_story','refresh');
    }
    
    public function upt_fixed_story()
    {
        $this->load->view('back/header');
        $this->load->view('Story/upt_fixed_story');
        $this->load->view('back/footer');
    }

    public function sel_fixed_story()
    {
        $query=$this->Story_Model->sel_fixed_story();
        echo json_encode($query);
    }

    public function sel_story()
    {
        $ch=$this->input->POST('story_ch');
        $query=$this->Story_Model->sel_story($ch);
        echo json_encode($query);
    }

    public function upt_db_fixed_story()
    {
        $this->Story_Model->upt_fixed_story($_POST);
        redirect('Story/upt_fixed_story','refresh');
    }

    public function upt_location()
    {
        $this->load->view('back/header');
        $this->load->view('Story/upt_location');
        $this->load->view('back/footer');
    }
}

/* End of file Story.php */
/* Location: ./application/controllers/Story.php */