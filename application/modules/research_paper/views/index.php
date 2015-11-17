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
       <td>id</td><td>text</td>
       </thead>
       <?php foreach($records as $record){?>
        <tr>
            <td><?=$record[DB_PREFIX.Mdl_research_paper::ID]?></td>
            <td><?=$record[DB_PREFIX.Mdl_research_paper::TEXT]?></td>
            <td><a href="<?=base_url()?>research_paper?record_id=<?=$record[DB_PREFIX.Mdl_research_paper::ID] ?>">Update</a></td>
        </tr>
       <?php }?>
   </table>
</div>