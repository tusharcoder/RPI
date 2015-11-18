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
            <td><?=$record[DB_PREFIX.Mdl_research_tool::ID]?></td>
            <td><img src="<?=base_url()?>uploads/<?=$record[DB_PREFIX.Mdl_research_tool::IMAGE]?>" height="320" width="320"/></td>
            <td><?=$record[DB_PREFIX.Mdl_research_tool::TITLE]?></td>
            <td><?=$record[DB_PREFIX.Mdl_research_tool::DESCRIPTION]?></td>
            <td><a href="<?=base_url()?>research_tool?record_id=<?=$record[DB_PREFIX.Mdl_research_tool::ID] ?>">Update</a></td>
            <td><a href="<?=base_url()?>research_tool/delete?record_id=<?=$record[DB_PREFIX.Mdl_research_tool::ID] ?>">Delete</a></td>
        </tr>
       <?php }?>
   </table>
</div>