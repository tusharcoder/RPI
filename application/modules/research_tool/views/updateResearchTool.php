<?php
/**
 * Created by PhpStorm.
 * User: tushar
 * Date: 16/11/15
 * Time: 5:40 PM
 */

!isset($image)?$image=null:'';
!isset($image)?$title=null:'';
!isset($image)?$description=null:'';
?>
<div>
    <?php /*echo form_open('research_tool\store');  */echo form_open_multipart('research_tool\store');?>
    <input type="file" name="userfile" size="20" />
    <?php if(!is_null($image)){?>
        <h3>current image</h3>
        <img src="<?=base_url()?>uploads/<?=$image?>" height="320" width="320"/>
    <?php }?>
    <input type="text" name="research_tools_title" id="research_tools_title" placeholder="Enter the data for research_tool title" value="<?php echo $title;?>"/>
    <input type="text" name="research_tools_description" id="research_tools_description" placeholder="Enter the data for research_tool description" value="<?php echo $description;?>"/>
    <input type="submit" value="submit"/>
    <?php echo form_close();?>
</div>