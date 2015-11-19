<?php
/**
 * Created by PhpStorm.
 * User: tushar
 * Date: 16/11/15
 * Time: 5:35 PM
 */

class Ocar extends MX_Controller{
    function __construct()
    {
        $this->load->Model('Mdl_ocar');
    }
    public function index(){
        $this->create();
    }

    public function create(){
        $data=array('text1'=>$this->Mdl_ocar->getText1(),
            'text2'=>$this->Mdl_ocar->getText2());
        $this->load->view('index',$data);
    }

    public function store(){
        $this->Mdl_ocar->setData(null,$this->input->post('ocar_text1'),$this->input->post('ocar_text2'));
        $success= $this->Mdl_ocar->setDatabase();
        if($success){
            echo 'done';
        }else{
            echo 'error';
        }
    }
}