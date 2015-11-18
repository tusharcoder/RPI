<?php
/**
 * Created by PhpStorm.
 * User: tushar
 * Date: 16/11/15
 * Time: 5:40 PM
 */
?>
<div>
   <table>
       <thead>
       <td>id</td><td>image</td><td>title</td><td>description</td>
       </thead>
       <?php foreach($records as $record){?>
        <tr>
            <td><?=$record[DB_PREFIX.Mdl_service::ID]?></td>
            <td><img src="<?=base_url()?>uploads/<?=$record[DB_PREFIX.Mdl_service::IMAGE]?>" height="320" width="320"/></td>
            <td><?=$record[DB_PREFIX.Mdl_service::TITLE]?></td>
            <td><?=$record[DB_PREFIX.Mdl_service::DESCRIPTION]?></td>
            <td><a href="<?=base_url()?>service?record_id=<?=$record[DB_PREFIX.Mdl_service::ID] ?>">Update</a></td>
            <td><a href="<?=base_url()?>service/delete?record_id=<?=$record[DB_PREFIX.Mdl_service::ID] ?>">Delete</a></td>
        </tr>
       <?php }?>
   </table>
</div>