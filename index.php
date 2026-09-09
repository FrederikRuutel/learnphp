<?php

class Cat {
    use makesSound;
}

class Dog {
    use HasSmell, makesSound;
}

trait hasSmell {
    public $smell;
    public function sniff() {
        return 'Smells like ' . $this->smell;
    }
}

trait makesSound {
    public $sound;
    public function noise() {
        return $this->sound;
    }
}