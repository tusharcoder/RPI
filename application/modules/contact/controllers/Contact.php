<?php
/**
 * Created by PhpStorm.
 * User: tushar
 * Date: 17/11/15
 * Time: 1:46 PM
 */

class Contact extends MX_Controller{
    function __construct()
    {
        $this->load->Model('Mdl_contact');
    }
    public function index(){
        $this->create();
    }

    public function create(){
        $data=array('address'=>$this->Mdl_contact->getAddress(),
                    'person'=>$this->Mdl_contact->getPerson(),
                    'mobile'=>$this->Mdl_contact->getMobile(),
                    'email_id'=>$this->Mdl_contact->getEmailId()
                    );
        $this->load->view('index',$data);
    }

    public function store(){
        $this->Mdl_contact->setData($this->input->post('contact_email_id'),$this->input->post('contact_address'),$this->input->post('contact_mobile'),$this->input->post('contact_person'));
        $success= $this->Mdl_contact->setDatabase();
        if($success){
            echo 'done';
        }else{
            echo 'error';
        }
    }
}