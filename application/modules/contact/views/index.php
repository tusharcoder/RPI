<?php
/**
 * Created by PhpStorm.
 * User: tushar
 * Date: 16/11/15
 * Time: 5:40 PM
 */
?>
<div>
   <?php echo form_open('contact\store');?>
    <input type="text" name="contact_email_id" id="contact_email_id" placeholder="email id" value="<?php echo $email_id;?>"/>
    <input type="text" name="contact_address" id="contact_address" placeholder="address" value="<?php echo $address;?>"/>
    <input type="text" name="contact_mobile" id="contact_mobile" placeholder="mobile" value="<?php echo $mobile;?>"/>
    <input type="text" name="contact_person" id="contact_person" placeholder="person" value="<?php echo $person;?>"/>
    <input type="submit" value="submit"/>
    <?php echo form_close();?>
</div>