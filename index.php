<?php

class Box {

    public function __construct(private $w, private $h, private $l) {
        var_dump('Box created');
    }

    public function volume() {
        return $this->w * $this->h * $this->l;
    }

    public function __set($name, $value) {
        $this->$name = $value;
        var_dump($name, $value);
    }

    public function __toString() {
        return "Box: {$this->w} x {$this->h} x {$this->l}";
    }

    public function __destruct() {
        var_dump('Box destroyed');
    }
}

$box1 = new Box(1, 2, 3);
$box1->color = 'red';
$box1 == 1;
$box2 = new Box(4, 5, 6);
var_dump($box1, $box2);
$box3 = clone $box2;
echo $box1;