<?php
/**
 * Created by PhpStorm.
 * User: tushar
 * Date: 16/11/15
 * Time: 5:40 PM
 */
?>
<div>
   <?php echo form_open('about_us/store');  ?>
    <input type="text" name="about_us_text" id="about_us_text" placeholder="Enter the data for about_us text" value="<?php echo $text;?>"/>
    <input type="submit" value="submit"/>
    <?php echo form_close();?>
</div>