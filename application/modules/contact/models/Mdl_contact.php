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


}