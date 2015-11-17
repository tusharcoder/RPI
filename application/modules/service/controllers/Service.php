<?php
/**
 * Created by PhpStorm.
 * User: tushar
 * Date: 16/11/15
 * Time: 5:35 PM
 */

class Service extends MX_Controller{
    function __construct()
    {
        $this->load->Model('Mdl_service');
    }
    public function index(){
        $record_id=$this->input->get(RECORD_ID);
        is_null($record_id)?$this->create():$this->create($record_id);
        $this->load->view('index',['records'=>$this->getAllRecords()]);
    }

    public function create($record_id=null){
        if(is_null($record_id)&&isset($_SESSION[RECORD_ID])){
            unset($_SESSION[RECORD_ID]);
        }
        $data=$this->Mdl_service->getData($record_id);
        $this->load->view('updateService',$data);
    }
    public function store(){
        try{
        $insert =function(){
            $this->Mdl_service->setData(null,$this->input->post(Mdl_service::IMAGE),$this->input->post(Mdl_service::TITLE),$this->input->post(Mdl_service::DESCRIPTION));
            return $this->Mdl_service->insert();
        };
        $update =function($record_id){
            $this->Mdl_service->setData($record_id,$this->input->post(Mdl_service::IMAGE),$this->input->post(Mdl_service::TITLE),$this->input->post(Mdl_service::DESCRIPTION));
            return $this->Mdl_service->update();
        };
        $record_id=$this->session->userdata(RECORD_ID);
        $success=is_null($record_id)?$insert():$update($record_id);
        echo $success?'done':'error';
        }catch (Exception $e){
            echo "Sorry! Some unexpected error occurred";
        }
    }
    public function getAllRecords(){
       return $this->Mdl_service->getAllRecords();
    }
    public function delete(){
    $record_id=$this->input->get(RECORD_ID);
        $this->Mdl_service->setID($record_id);
        if($this->Mdl_service->delete()){
            redirect(base_url()."service");
        }else{
            echo 'Some unknown error occcurred';
        };
    }
}