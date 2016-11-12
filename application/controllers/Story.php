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
        $this->load->view('Story/header');
        $this->load->view('Story/index');
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
        $sequence_of_story=array(
                '3'=>array('call','crisis','treasure'),
                '4'=>array('call','assist','crisis','treasure'),
                '5'=>array('call','assist','test','crisis','treasure'),
                '6'=>array('call','assist','leave','test','crisis','treasure'),
                '7'=>array('begin','call','assist','leave','test','crisis','treasure'),
                '8'=>array('begin','call','assist','leave','test','crisis','treasure','end')
            );
        $story_location=array();
        $story=array();
        $squence=$sequence_of_story[strlen($user_name)];

        for($i=0;$i<strlen($user_name);$i++) 
        {
            $query_data=$this->Story_Model->sel_story(strtoupper($user_name[$i]));
            $story[$i]=$query_data["st_".$squence[$i]];
            $story_location[$i]=$this->Newlocation_model->getLocationById($i+1)->row_array();
        }
        $data=array(
                'username'=>$user_name,
                'story'=>$story,
                'story_location'=>$story_location
            );
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
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