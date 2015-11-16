<?php
/**
 * Created by PhpStorm.
 * User: tushar
 * Date: 16/11/15
 * Time: 5:35 PM
 */

class Home extends MX_Controller{
    function __construct()
    {
        $this->load->Model('Mdl_home');
    }
    public function index(){
        $this->create();
    }

    public function create(){
        $data=array('text'=>$this->Mdl_home->getText());
        $this->load->view('index',$data);
    }

    public function store(){
        $this->Mdl_home->setData(null,$this->input->post('home_text'));
        $success= $this->Mdl_home->setDatabase();
        if($success){
            echo 'done';
        }else{
            echo 'error';
        }
    }
}