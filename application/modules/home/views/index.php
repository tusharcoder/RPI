<?php
/**
 * Created by PhpStorm.
 * User: tushar
 * Date: 16/11/15
 * Time: 5:40 PM
 */
?>
<div>
   <?php echo form_open('home\store');  ?>
    <input type="text" name="home_text" id="home_text" placeholder="Enter the data for home" value="<?php echo $text;?>"/>
    <input type="submit" value="submit"/>
    <?php echo form_close();?>
</div>