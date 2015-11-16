<?php
/**
 * Created by PhpStorm.
 * User: tushar
 * Date: 16/11/15
 * Time: 4:45 PM
 */

class Mdl_home extends CI_Model{
    const ID = 'home_id';
    const TEXT='home_text';
    const TABLE='home';
    var $id;
    var $text;

    function __construct(){
        $this->load->database();
        $data=$this->db->select([DB_PREFIX.self::ID,DB_PREFIX.self::TEXT])->limit(1)->get(DB_PREFIX.self::TABLE)->result_array();
        if(isset($data[0])){
            $this->id=$data[0][DB_PREFIX.self::ID];
            $this->text=$data[0][DB_PREFIX.self::TEXT];
        }else{
            $this->id=NULL;
            $this->text=NULL;
        }
        unset($data);
    }

    function setData($id=null, $text=null)
    {
            $this->setId(1);
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
    public function getText()
    {
        return $this->text;
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
            return true;
        }
        return false;
    }
    public function insert(){
    $this->db->insert('home',[
        DB_PREFIX.self::ID=>$this->id,
       DB_PREFIX.self::TEXT=>$this->text
        ]);
        if($this->db->affected_rows()>0){
            return true;
        }
        return false;
    }

    public function setDatabase(){
        $rows=$this->db->count_all_results(DB_PREFIX.self::TABLE);
        if($rows==0){
            return $this->insert();
        }else{
            return $this->update();
        }
    }
}