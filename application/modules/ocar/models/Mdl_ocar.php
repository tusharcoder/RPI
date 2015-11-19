<?php
/**
 * Created by PhpStorm.
 * User: tushar
 * Date: 16/11/15
 * Time: 4:45 PM
 */

class Mdl_ocar extends CI_Model{
    const ID = 'ocar_id';
    const TEXT1='ocar_text1';
    const TEXT2='ocar_text2';
    const TABLE='ocar';
    var $id;
    var $text1;
    var $text2;

    /**
     * @return mixed
     */
    public function getText2()
    {
        return $this->text2;
    }

    /**
     * @param mixed $text2
     */
    public function setText2($text2)
    {
        $this->text2 = $text2;
    }

    function __construct(){
        $data=$this->db->select([DB_PREFIX.self::ID,DB_PREFIX.self::TEXT1,DB_PREFIX.self::TEXT2])->limit(1)->get(DB_PREFIX.self::TABLE)->result_array();
        if(isset($data[0])){
            $this->id=$data[0][DB_PREFIX.self::ID];
            $this->text1=$data[0][DB_PREFIX.self::TEXT1];
            $this->text2=$data[0][DB_PREFIX.self::TEXT2];
        }else{
            $this->id=NULL;
            $this->text1=NULL;
            $this->text2=NULL;
        }
        unset($data);
    }

    function setData($id=null, $text1=null, $text2=null)
    {
            $this->setId(1);
            $this->setText1($this->security->xss_clean($text1));
            $this->setText2($this->security->xss_clean($text2));

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
    public function getText1()
    {
        return $this->text1;
    }

    /**
     * @param mixed $text1
     */
    public function setText1($text1)
    {
        $this->text1 = $text1;
    }

    public function update(){
        $this->db->set([
            DB_PREFIX.self::TEXT1=>$this->text1,
            DB_PREFIX.self::TEXT2=>$this->text2,
        ])->where(DB_PREFIX.self::ID, $this->id)->update(DB_PREFIX.self::TABLE);
        if($this->db->affected_rows()>0){
            return true;
        }
        return false;
    }
    public function insert(){
    $this->db->insert('ocar',[
        DB_PREFIX.self::ID=>$this->id,
       DB_PREFIX.self::TEXT1=>$this->text1,
        DB_PREFIX.self::TEXT2=>$this->text2
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