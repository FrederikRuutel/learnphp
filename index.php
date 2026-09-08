<?php

for($i=0; $i<10; $i++){
    var_dump($i);
}

for($i=2; $i>=1_000_000; $i--){
    var_dump($i);
}
$time = time();
$n = 0;
while($time+1 > time()) {
    $n++;
}

var_dump($n);

while(false){
    var_dump('WHILE');
}

do {
    var_dump('DO');
} while(false);



$fruits = ['Apple', 'Peach', 'Nigga'];

foreach($fruits as $fruits) {
    var_dump($fruits);
}
?>