<?php
/**
 * Created by PhpStorm.
 * User: tushar
 * Date: 16/11/15
 * Time: 4:45 PM
 */

class Mdl_research_paper extends CI_Model{
    const ID = 'research_papers_id';
    const TEXT='research_papers_text';
    const TABLE='research_papers';
    var $id;
    var $text;

    function __construct(){
            $this->id=NULL;
            $this->text=NULL;
    }
    function setData($id=null, $text=null)
    {
            $this->setId($id);
            $this->setText($this->security->xss_clean($text));
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getText($record_id=null)
    {

        $getRecordIdText =function($record_id){
            $this->setText($this->db->where(DB_PREFIX.self::ID,$record_id)->select([DB_PREFIX.self::TEXT])->get(self::TABLE)->result_array()[0][DB_PREFIX.self::TEXT]);
            /*$this->setId($record_id);*/
            //set record id in session to use in update function
            $this->session->set_userdata(RECORD_ID,$record_id);
            return $this->text;
        };
        return is_null($record_id)?$this->text:$getRecordIdText($record_id);
    }
    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }
    public function update(){
        $this->db->set(DB_PREFIX.self::TEXT,$this->text)->where(DB_PREFIX.self::ID, $this->id)->update(DB_PREFIX.self::TABLE);
        if($this->db->affected_rows()>0){
            unset($_SESSION[RECORD_ID]);
            return true;
        }
        unset($_SESSION[RECORD_ID]);
        return false;
    }
    public function insert(){
    $this->db->insert('research_papers',[
        DB_PREFIX.self::ID=>$this->id,
       DB_PREFIX.self::TEXT=>$this->text
        ]);
        if($this->db->affected_rows()>0){
            return true;
        }
        return false;
    }
    public function getAllRecords(){
        return $this->db->get(self::TABLE)->result_array();
    }
    public function delete(){
        $this->db->where(DB_PREFIX.self::ID,$this->id)->delete(self::TABLE);
        if($this->db->affected_rows()>0){
            return true;
        }
        return false;
    }
}