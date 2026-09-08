<?php
$num = 10;
if($num > 5) {
    var_dump('Bigger');
}

if($num > 5) {
    var_dump('Bigger');
} else {
    var_dump('Smaller');
}


if($num > 5) {
    var_dump('Bigger');
} else if($num < 5) {
    var_dump('Smaller');
} else {
    var_dump('Equal');
}


$i = 1;
switch($i) {
    case 1:
        var_dump('yx');
        break;
    case 2:
        var_dump('Kaks');
        break;
    case 3:
    case 4:
        var_dump('kolm neli');
        break;
    case 5:
        var_dump('viis');
    case 6:
        var_dump('kuus');
        break;
    default:
        var_dump('dunno');
    
}
?>