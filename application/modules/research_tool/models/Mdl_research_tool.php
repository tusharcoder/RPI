<?php
/**
 * Created by PhpStorm.
 * User: tushar
 * Date: 16/11/15
 * Time: 4:45 PM
 */

class Mdl_research_tool extends CI_Model{
    const ID = 'research_tools_id';
    const DESCRIPTION='research_tools_description';
    const IMAGE='research_tools_image';
    const TITLE='research_tools_title';
    const TABLE='research_tools';
    var $id;
    var $description;
    var $image;
    var $title;

    /**
     * @return mixed
     */
    public function getImage($record_id=null)
    {
        if(is_null($record_id)){return $this->image;
        }else{
            return $this->db->where(DB_PREFIX.self::ID,$record_id)->select([DB_PREFIX.self::IMAGE])->get(self::TABLE)->result_array()[0][DB_PREFIX.self::IMAGE];
        }

    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    function __construct(){
            $this->id=NULL;
            $this->description=NULL;
    }
    function setData($id=null, $image=null,$title=null,$description=null)
    {
            $this->setId($id);
            $this->setDescription($this->security->xss_clean($description));
            $this->setImage($this->security->xss_clean($image));
            $this->setTitle($this->security->xss_clean($title));
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
    public function getDescription($record_id=null)
    {
        $getRecordIdText =function($record_id){
            $this->setDescription($this->db->where(DB_PREFIX.self::ID,$record_id)->select([DB_PREFIX.self::DESCRIPTION])->get(self::TABLE)->result_array()[0][DB_PREFIX.self::DESCRIPTION]);
            /*$this->setId($record_id);*/
            //set record id in session to use in update function
            $this->session->set_userdata(RECORD_ID,$record_id);
            return $this->description;
        };
        return is_null($record_id)?$this->description:$getRecordIdText($record_id);
    }
    public function getData($record_id=null){
        $getRecord =function($record_id){
            $record=$this->db->where(DB_PREFIX.self::ID,$record_id)->select([DB_PREFIX.self::DESCRIPTION,DB_PREFIX.self::TITLE,DB_PREFIX.self::IMAGE])->get(self::TABLE)->result_array()[0];
            $this->setDescription($record[DB_PREFIX.self::DESCRIPTION]);
            $this->setTitle($record[DB_PREFIX.self::TITLE]);
            $this->setImage($record[DB_PREFIX.self::IMAGE]);
            unset($record);
            //set record id in session to use in update function
            $this->session->set_userdata(RECORD_ID,$record_id);
            return $this->toArray();
        };
        return is_null($record_id)?null:$getRecord($record_id);
    }
    public  function toArray(){
        return[
          'description'=>$this->description,
            'image'=>$this->image,
            'title'=>$this->title
        ];
    }
    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function update(){
        /*$this->db->set([
            DB_PREFIX.self::DESCRIPTION=>$this->description,
            DB_PREFIX.self::IMAGE=>$this->image,
            DB_PREFIX.self::TITLE=>$this->title
        ])->where(DB_PREFIX.self::ID, $this->id)->update(DB_PREFIX.self::TABLE);*/
        $result=$this->db->query("UPDATE ".DB_PREFIX.self::TABLE."
SET ".DB_PREFIX.self::DESCRIPTION." = '".$this->description."' , ".
            DB_PREFIX.self::IMAGE." = '".$this->image."' , ".
            DB_PREFIX.self::TITLE." = '".$this->title."'".
" WHERE ".DB_PREFIX.self::ID." = ".$this->id);
        if(/*$this->db->affected_rows()>0*/$result){
            unset($_SESSION[RECORD_ID]);
            return true;
        }
        unset($_SESSION[RECORD_ID]);
        return false;
    }
    public function insert(){
    $this->db->insert('research_tools',[
        DB_PREFIX.self::ID=>$this->id,
       DB_PREFIX.self::DESCRIPTION=>$this->description,
        DB_PREFIX.self::IMAGE=>$this->image,
        DB_PREFIX.self::TITLE=>$this->title
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