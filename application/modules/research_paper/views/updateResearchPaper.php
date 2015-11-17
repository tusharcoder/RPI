<?php
/**
 * Created by PhpStorm.
 * User: tushar
 * Date: 16/11/15
 * Time: 5:40 PM
 */
?>
<div>
    <?php echo form_open('research_paper\store');  ?>
    <input type="text" name="research_papers_text" id="research_papers_text" placeholder="Enter the data for research paper text" value="<?php echo $text;?>"/>
    <input type="submit" value="submit"/>
    <?php echo form_close();?>
</div>