<?php
/**
 * Created by PhpStorm.
 * User: tushar
 * Date: 16/11/15
 * Time: 5:40 PM
 */
?>
<div>
   <?php echo form_open('ocar\store');  ?>
    <input type="text" name="ocar_text1" id="ocar_text1" placeholder="Enter the data for ocar text 1" value="<?php echo $text1;?>"/>
    <input type="text" name="ocar_text2" id="ocar_text2" placeholder="Enter the data for ocar text 2" value="<?php echo $text2;?>"/>
    <input type="submit" value="submit"/>
    <?php echo form_close();?>
</div>