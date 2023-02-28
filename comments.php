<!DOCTYPE html>
<html>
    <ul>
        <?php foreach($comments as $comment){?>
            <li><strong><?php echo $comment["author"] ." ";?></strong>
                <?php echo $comment["text"];?></li><hr>
        </br>
    </ul>
<?php } ?>