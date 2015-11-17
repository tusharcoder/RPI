<?php
/**
 * Created by PhpStorm.
 * User: tushar
 * Date: 16/11/15
 * Time: 5:35 PM
 */

class Research_paper extends MX_Controller{
    function __construct()
    {
        $this->load->Model('Mdl_research_paper');
    }
    public function index(){
        $id=$this->input->get(RECORD_ID);
        is_null($id)?$this->create():$this->create($id);
        $this->load->view('index',['records'=>$this->getAllRecords()]);
    }

    public function create($record_id=null){
        if(is_null($record_id)&&isset($_SESSION[RECORD_ID])){
            unset($_SESSION[RECORD_ID]);
        }
        $data=array('text'=>$this->Mdl_research_paper->getText($record_id));
        $this->load->view('updateResearchPaper',$data);
    }
    public function store(){
        try{
        $insert =function(){
            $this->Mdl_research_paper->setData(null,$this->input->post('research_papers_text'));
            return $this->Mdl_research_paper->insert();
        };
        $update =function($record_id){
            $this->Mdl_research_paper->setData($record_id,$this->input->post('research_papers_text'));
            return $this->Mdl_research_paper->update();
        };
        $record_id=$this->session->userdata(RECORD_ID);
        $success=is_null($record_id)?$insert():$update($record_id);
        echo $success?'done':'error';
        }catch (Exception $e){
            echo "Sorry! Some unexpected error occurred";
        }
    }
    public function getAllRecords(){
       return $this->Mdl_research_paper->getAllRecords();
    }
    public function delete(){
    $record_id=$this->input->get(RECORD_ID);
        $this->Mdl_research_paper->setID($record_id);
        if($this->Mdl_research_paper->delete()){
            redirect(base_url()."research_paper");
        }else{
            echo 'Some unknown error occcurred';
        };
    }
}