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


}