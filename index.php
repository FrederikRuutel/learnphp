<?php
$test = true;
$test = false;
$test = true && false;
var_dump($test);

$test = true && true; // kui koik bool'id on true, siis and and on true. Kui on false sees siis on false.
var_dump($test);

$test = true || false; // true or false, kui vahemalt 1 osapooltest on toene
var_dump($test);

$test = !false; // not false
var_dump($test);

$test = 10 > 5; // kui on suurem kui, siis on true, ehk kui 10 on suurem kui 5 siis on true, kui on vaiksem siis false
var_dump($test);

$test = 10 < 5;
var_dump($test);

$test = 10 > 10;
$test = 10 == 10;
$test = 10 === 10;
$test = 10 >= 10;
$test = 10 <= 10;
$test = 10 != 5;
$test = 10 !== 5;
$test = 10 == '10'; # kontrollib lihtsalt. Tuleb true
$test = 10 === '10'; # range kontroll. Tuleb false
var_dump($test);

$test = true && false || (true && !true);
var_dump($test);
?>