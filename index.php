<?php
$test = [1, 2, 'word', true];
var_dump($test);
var_dump($test[2]); ## kirjutab ainult 2. kohal oleva

$test[2] = 'nigga'; ## saab muuta array's asju

$test[4] = 'new value'; ## lisab uue asja array'sse

$test[] = 'another value'; # lisab loppu juurde
var_dump($test);
array_push($test, 'pushed value'); ## saab samoodi lõppu lisada
var_dump($test);

$test = ['name' => 'Frederik', 'age' => 19]; ## array saab ka nii teha

# voib treppida seda kui array laheb pikaks.
$test = [
            'name' => 'Frederik', 
            'age' => 19,
            1,
            3,
            'black men',
            100 => 'new value',
            5, # vaatab mis on viimane numbriline voti, hetkel on jargmine 101
        ];

var_dump($test['name']);
var_dump($test);

$test = [
    [1, 2, 3], # kahemootmeline array
    [4, 5, 6],
    [7, 8, 9],
];

var_dump($test[1][2])
?>