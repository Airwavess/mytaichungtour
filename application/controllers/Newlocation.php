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

        public function view()
        {
          $lc_id=$this->input->get('lc_id');
          $data = $this->Newlocation_model->getLocationById($lc_id);
          $this->load->view('LocationView/header');
          $this->load->view('LocationView/location_view', array('data' => $data));
          $this->load->view('LocationView/footer');

          
        }


        public function create()
        {
          $this->load->helper('form');
          $this->load->library('form_validation');
          
          $this->form_validation->set_rules('lc_name', '<strong>景點名稱</strong>', 'required');
          if (empty($_FILES['imgFile']['name']))       
          {
            $this->form_validation->set_rules('imgFile', '<strong>圖片上傳</strong>', 'required');       
          }
          $this->form_validation->set_rules('description', '<strong>景點敘述</strong>', 'required');
          $this->form_validation->set_rules('address', '<strong>景點地址</strong>', 'required');
          $this->form_validation->set_rules('lat', '<strong>經度</strong>', 'required');
          $this->form_validation->set_rules('lng', '<strong>緯度</strong>', 'required');
          $this->form_validation->set_message('required', '%s 此欄位必填');


          $config['upload_path'] = './assets/uploads/location/';
          $config['allowed_types'] = 'png|jpg|jpeg';
          $config['encrypt_name']=TRUE;
          // 載入上傳函式庫
          $this->load->library('upload',$config); 
          $this->upload->initialize($config);


          if ($this->form_validation->run() === FALSE)
          {
              $this->load->view('back/header.php');
              $this->load->view('newlocation/create.php');
              $this->load->view('back/footer.php');
          }
          else
          {
              if(!$this->upload->do_upload("imgFile")){
                echo $this->upload->display_errors();
              }else{
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];
                $img_path = $file_name;

                $data = array(
                  'lc_name' => $this->input->post('lc_name'),
                  'img_path' => $img_path,
                  'description' => $this->input->post('description'),
                  'address' => $this->input->post('address'),
                  'lat' => $this->input->post('lat'),
                  'lng' => $this->input->post('lng')
                );

                $this->Newlocation_model->add_location($data);
                redirect(site_url("newlocation/index"));
              }
          }
        }
        public function modify()
        {
          $this->load->helper('form');
          $this->load->library('form_validation');
          
          $this->form_validation->set_rules('lc_name', '<strong>景點名稱</strong>', 'required');
          $this->form_validation->set_rules('description', '<strong>景點敘述</strong>', 'required');
          $this->form_validation->set_rules('address', '<strong>景點地址</strong>', 'required');
          $this->form_validation->set_rules('lat', '<strong>經度</strong>', 'required');
          $this->form_validation->set_rules('lng', '<strong>緯度</strong>', 'required');
          $this->form_validation->set_message('required', '%s 此欄位必填');


          $config['upload_path'] = './assets/uploads/location/';
          $config['allowed_types'] = 'png|jpg|jpeg';
          $config['encrypt_name']=TRUE;
          // 載入上傳函式庫
          $this->load->library('upload',$config); 
          $this->upload->initialize($config);
          if(null !== $this->input->get('lc_id')){
            $lc_id = $this->input->get('lc_id'); 
           }else if(null !==$this->input->post('lc_id')){
            $lc_id = $this->input->post('lc_id'); 
          }else{
            return "Errrrrrrrrrrrrr";
          }

          if ($this->form_validation->run() === FALSE)
          {
            $data = $this->Newlocation_model->getLocationById($lc_id);   
            $this->load->view('back/header');
            $this->load->view('newlocation/modify', array('data' => $data));
            $this->load->view('back/footer');
          }
          else
          {
            if (!empty($_FILES['imgFile']['name']))       
            {
              if(!$this->upload->do_upload("imgFile")){
                echo $this->upload->display_errors();
              }else{
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];
                $img_path = $file_name;
              }
            }else{
              $data = $this->Newlocation_model->getLocationById($lc_id)->row();
              $img_path = $data->img_path;
            }
            
            $data = array(
              'lc_name' => $this->input->post('lc_name'),
              'img_path' => $img_path,
              'description' => $this->input->post('description'),
              'address' => $this->input->post('address'),
              'lat' => $this->input->post('lat'),
              'lng' => $this->input->post('lng')
            );

            $lc_id = $this->input->post('lc_id');    
            $this->Newlocation_model->modify($lc_id,$data);
            redirect(site_url("newlocation/index"));
          }       
        }

        public function delete()
        {
          $lc_id=$this->input->get('lc_id');
          $this->Newlocation_model->delete_location($lc_id);
                redirect(site_url("newlocation/index"));

        }
        //Api        
        public function query(){          
          $q = $this->input->get('q');          
          $data = $this->Newlocation_model->get_location()->result_array();          
          echo json_encode($data, JSON_UNESCAPED_UNICODE);        
        }
}