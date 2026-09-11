<?php
$name = 'Kaspar';
$coinFlip = rand(0,1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello <?=$name?>!</h1>
    <?php if($coinFlip): ?>
        <h1>Kull</h1>
    <?php else: ?>
        <h1>Kiri</h1>
    <?php endif ?>
    
    <ul>
        <?php for($i=0;$i<10;$i++): ?>
            <li><?=$i?></li>
        <?php endfor ?>
    </ul>
</body>
</html>