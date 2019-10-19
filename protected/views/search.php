<div>Результаты поиска:</div>
<?php foreach($dogs as $dog): ?>
<div>
    <div><?php echo $dog['name']?></div>
    <div><?php echo $dog['owner']?></div>
    ...
</div>
<?endforeach?>