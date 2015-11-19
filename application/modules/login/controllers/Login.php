<?php

/**
 * Created by PhpStorm.
 * User: tushar
 * Date: 19/11/15
 * Time: 11:04 AM
 */
class Login extends MX_Controller
{

    /**
     * Login constructor.
     */
    public function __construct()
    {
        $this->load->Model('Mdl_login');
    }

    /**
     * loading the login view
     */
    public function index(){
        if(!(isset($_SESSION['authorize'])&&$_SESSION['authorize']==1)){
            $this->session->sess_destroy();
        }
    $this->load->view('index');
    }

    /**
     * check credentials and logging in
     */
    public function doLogin(){
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $this->Mdl_login->setData($email,$password);
        if($this->Mdl_login->checkCredentials($email,$password)){
            $this->session->set_userdata('authorize',1);
        }else{
            redirect(base_url('login'));
        }
    }
}