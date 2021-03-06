<?php
/**
 * Created by PhpStorm.
 * User: tushar
 * Date: 16/11/15
 * Time: 5:35 PM
 */

class Research_tool extends MX_Controller{
    function __construct()
    {
        $this->load->Model('Mdl_research_tool');
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
        $data=$this->Mdl_research_tool->getData($record_id);
        $this->load->view('updateResearchTool',$data);
    }
    public function store(){
        try{
        $insert =function(){
            $file_name=do_upload();
            if(is_null($file_name)){
                echo "error occurred in uploading file";
                exit(520);
            }
            $this->Mdl_research_tool->setData(null,$file_name,$this->input->post(Mdl_research_tool::TITLE),$this->input->post(Mdl_research_tool::DESCRIPTION));
            return $this->Mdl_research_tool->insert();
        };
        $update =function($record_id){
            $file_name=$this->Mdl_research_tool->getImage($record_id);
            /*print_r($file_name);
            die;*/
            if(!empty($_FILES['userfile']['name'])){
                $file_name=do_upload();
            }
            if(is_null($file_name)){
                echo "error occurred in uploading file";
                exit(520);
            }
            $this->Mdl_research_tool->setData($record_id,$file_name,$this->input->post(Mdl_research_tool::TITLE),$this->input->post(Mdl_research_tool::DESCRIPTION));
           // unlink("uploads/".$group_picture);
            return $this->Mdl_research_tool->update();
        };
        $record_id=$this->session->userdata(RECORD_ID);
        $success=is_null($record_id)?$insert():$update($record_id);
        echo $success?'done':'error';
        }catch (Exception $e){
            echo "Sorry! Some unexpected error occurred";
        }
    }
    public function getAllRecords(){
       return $this->Mdl_research_tool->getAllRecords();
    }
    public function delete(){
    $record_id=$this->input->get(RECORD_ID);
        $this->Mdl_research_tool->setID($record_id);
        if($this->Mdl_research_tool->delete()){
            redirect(base_url()."service");
        }else{
            echo 'Some unknown error occcurred';
        };
    }
}