<?php
/**
 * Created by PhpStorm.
 * User: tushar
 * Date: 19/11/15
 * Time: 11:05 AM
 */?>
<div>
    <?php
    echo form_open('login/doLogin');?>
    <input type="text" name="email" id="email" placeholder="Enter Email" />
    <input type="password" name="password" id="password" placeholder="Enter Email" />
    <input type="submit" value="Submit" />
    <?php
    echo form_close();
?>
</div>
