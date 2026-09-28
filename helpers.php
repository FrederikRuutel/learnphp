<?php

function dump(...$vars) {
    echo '<pre>';
    var_dump(...$vars);
    echo '</pre>';
}

function view($viewName, $variables=[]){
    extract($variables);
    include __DIR__ . "/views/$viewName.php";
}