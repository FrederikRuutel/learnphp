<?php
$test = 10; // integer
$test = 3.1; // float
$test = "Hello World"; // string
$test = true; // boolean, bool. Tõeväärtus true/false\
$test = null; // väärtus mis näitab väärtuse puudumist
var_dump($test);

$test = [1, 2, "three", true];
var_dump($test);

$test = new stdClass();
$test->name = "Frederik";
var_dump($test);

$num1 = 10;
$num2 = "10";
var_dump($num1 === $num2);
?>
