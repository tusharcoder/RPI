<?php
/**
 * Created by PhpStorm.
 * User: tushar
 * Date: 18/11/15
 * Time: 12:31 PM
 */
?>
<div>
    <h3>Your file was successfully uploaded!</h3>

    <ul>
        <?php foreach ($upload_data as $item => $value):?>
            <li><?php echo $item;?>: <?php echo $value;?></li>
        <?php endforeach; ?>
    </ul>

    <p><?php echo anchor('upload', 'Upload Another File!'); ?></p>
</div>
