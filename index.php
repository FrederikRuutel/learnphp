<?php

class Box {
    public $width;
    public $height;
    public $length;
    public $isOpen = false;
    public $hasBeenOpened = false;
    
    public function open() {
        $this->isOpen = true;
        $this->hasBeenOpened = true;
    }

    public function close() {
        $this->isOpen = false;
    }

    public function volume() {
        return $this->height * $this->length * $this->width;
    }
}

$num1 = 1;
$num2 = $num1;
$num1 = 2;
var_dump($num1, $num2);

$box1 = new Box();
$box1->width = 1;
$box2 = clone $box1;
$box2->width = 2;
var_dump($box1, $box2);
var_dump($box1->width, $box2->width);


class MetalBox extends Box {
    public $weight;
    public function mass(){
        return $this->volume() * $this->weight;
    }
}

$metal1 = new MetalBox();
var_dump($metal1);