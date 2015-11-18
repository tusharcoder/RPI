<?php
/**
 * Created by PhpStorm.
 * User: tushar
 * Date: 18/11/15
 * Time: 12:30 PM
 */
?>
<div>
    <?php echo $error;?>

    <?php echo form_open_multipart('upload/do_upload');?>

    <input type="file" name="userfile" size="20" />

    <br /><br />

    <input type="submit" value="upload" />

    <?php echo form_close();?>
</div>
