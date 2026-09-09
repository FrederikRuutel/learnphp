<?php

function hello() {
    var_dump('Hello World!');
}

hello();
hello();
hello();

function helloName($name) {
    var_dump("Hello, $name!");
}

helloName('Frederik');

function helloNameAndAge($name, $age) {
    var_dump("Hello, $name, who is $age yo.");
}

helloNameAndAge('Frederik', '19');
helloNameAndAge('karl', 18);

$test = function() {
    echo("Tere!");
};

var_dump($test);

$numbers = [1,2,3,4,5];
$squares = array_map(function ($n) {
    return $n * $n;
}, $numbers);
var_dump($squares);

function cube($a) {
    return $a * $a * $a;
};
var_dump(cube(4));

$answer = cube(5);

$text = "Cubes of 5 is $answer";
echo $text;