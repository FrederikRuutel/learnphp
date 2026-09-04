<?php
$test = 'hello';
$test = 'hello' . ' world';
var_dump($test);

$test .= '!';
var_dump($test);

$name = "Frederik";
$age = 19;
$test = $name . ' is ' . $age . ' years old.';
var_dump($test);

$test = 'hello\n\nworld'; // Topelt jutumarkides tootavad variableid
$test = "hello\n\nworld";
var_dump($test);

$letter = 'a';
$letter++;
var_dump($letter);

?>
