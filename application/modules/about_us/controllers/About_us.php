<?php
/**
 * Created by PhpStorm.
 * User: tushar
 * Date: 16/11/15
 * Time: 5:35 PM
 */

class About_us extends MX_Controller{
    function __construct()
    {
        $this->load->Model('Mdl_about_us');
    }
    public function index(){
        $this->create();
    }

    public function create(){
        $data=array('text'=>$this->Mdl_about_us->getText());
        $this->load->view('index',$data);
    }

    public function store(){
        $this->Mdl_about_us->setData(null,$this->input->post('about_us_text'));
        $success= $this->Mdl_about_us->setDatabase();
        if($success){
            echo 'done';
        }else{
            echo 'error';
        }
    }
}