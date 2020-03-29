<?php

class Base {
    public $name = "Vasya";
    public function first(){
        return 'first';
    }
}

class Sub extends Base {
	public $name = "Vasya";

	public function first() {
		return 'second';
	}

	public function second() {
		return 'second';
	}
}

class Third extends Sub {

	public function thirds(){
		return "third";
	}
}

$base = new Base();
echo $base->first().PHP_EOL;

$sub = new Sub();
echo $sub->first().PHP_EOL;
echo $sub->second().PHP_EOL;

$third = new Third();
echo $third->first().PHP_EOL;
echo $third->second().PHP_EOL;
echo $third->thirds().PHP_EOL;
