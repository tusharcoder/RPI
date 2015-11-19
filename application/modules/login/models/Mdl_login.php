<?php

/**
 * Created by PhpStorm.
 * User: tushar
 * Date: 19/11/15
 * Time: 11:05 AM
 */
class Mdl_login extends CI_Model
{
    /**
     * @var
     * data
     */
    var $email;
    var $password;

    /**
     * model constants
     */
    const EMAIL="admin_login_email";
    const PASSWORD="admin_login_password";
    const TABLE="admin_login";

    /**
     * Mdl_login constructor.
     * @internal param $email
     * @internal param $password
     */
    public function __construct()
    {
        $this->email = null;
        $this->password = null;
    }

    public function setData($email,$password){
     $this->setEmail($this->security->xss_clean($email));
        $this->setPassword($this->security->xss_clean($password));
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function checkCredentials(){
        return $this->db->where(DB_PREFIX.self::EMAIL,$this->email)->where(DB_PREFIX.self::PASSWORD,$this->password)->count_all_results(self::TABLE)==1?true:false;
    }
}