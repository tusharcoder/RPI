<?php
/**
 * Created by PhpStorm.
 * User: tushar
 * Date: 16/11/15
 * Time: 6:58 PM
 */

class Mdl_contact extends CI_Model{
    /**
    * Model data
    */
    private $id;
    private $address;
    private $person;
    private $mobile;
    private $email_id;

    /**
     * constants
     */
    const TABLE="contact";
    const ID="contact_id";
    const PERSON="contact_person";
    const ADDRESS="contact_address";
    const MOBILE="contact_mobile";
    const EMAIL_ID="contact_email_id";

    function __construct()
    {
        $data=$this->db->select([
            DB_PREFIX.self::ID,
            DB_PREFIX.self::PERSON,
            DB_PREFIX.self::ADDRESS,
            DB_PREFIX.self::MOBILE,
            DB_PREFIX.self::EMAIL_ID])->limit(1)->get(DB_PREFIX.self::TABLE)->result_array();
        if(isset($data[0])){
            $this->id=$data[0][DB_PREFIX.self::ID];
            $this->address=$data[0][DB_PREFIX.self::ADDRESS];
            $this->person=$data[0][DB_PREFIX.self::PERSON];
            $this->mobile=$data[0][DB_PREFIX.self::MOBILE];
            $this->email_id=$data[0][DB_PREFIX.self::EMAIL_ID];
        }else{
            $this->id=NULL;
            $this->address=NULL;
            $this->person=NULL;
            $this->mobile=NULL;
            $this->email_id=NULL;
        }
        unset($data);
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
     * @return null
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param null $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return null
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param null $person
     */
    public function setPerson($person)
    {
        $this->person = $person;
    }

    /**
     * @return null
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param null $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * @return null
     */
    public function getEmailId()
    {
        return $this->email_id;
    }

    /**
     * @param null $email_id
     */
    public function setEmailId($email_id)
    {
        $this->email_id = $email_id;
    }

    public function setData($email_id=null,$address=null,$mobile=null,$person=null)
    {
        $this->setId(1);
        $this->email_id=$email_id;
        $this->address=$address;
        $this->mobile=$mobile;
        $this->person=$person;
    }

    public function insert(){
            $this->db->insert('contact',[
            DB_PREFIX.self::ID=>$this->id,
            DB_PREFIX.self::ADDRESS=>$this->address,
            DB_PREFIX.self::PERSON=>$this->person,
            DB_PREFIX.self::MOBILE=>$this->mobile,
            DB_PREFIX.self::EMAIL_ID=>$this->email_id,
        ]);
        if($this->db->affected_rows()>0){
            return true;
        }
        return false;
    }
    public function update(){
            $this->db->set([ DB_PREFIX.self::ADDRESS=>$this->address,
            DB_PREFIX.self::PERSON=>$this->person,
            DB_PREFIX.self::MOBILE=>$this->mobile,
            DB_PREFIX.self::EMAIL_ID=>$this->email_id])->where(DB_PREFIX.self::ID, $this->id)->update(DB_PREFIX.self::TABLE);
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