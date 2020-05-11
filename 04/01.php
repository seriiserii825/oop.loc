<?php

interface Measurable {
	public function getWidth();
	public function getHeight();
}

interface Movable{
	public function move($x, $y);
}

interface Visible{
	public function getColor();
}

class Physics {
	public function move(Movable $obj, $x, $y){
		$obj->move($x, $y);
	}
}

class Measurer {
	public function maxSize( Measurable $obj ) {
		return max( $obj->getWidth( $obj ), $obj->getHeight( $obj ) );
	}
}

class Table implements Measurable, Visible {
	public function getWidth() { return 95; }
	public function getHeight() { return 45; }
	public function getColor() { return 0xff0000; }
	public function getMaterial() { return 'wood'; }
}

class Kettle implements Measurable, Visible, Movable {
	public function move($x, $y ) { }
	public function getWidth() { return 35; }
	public function getHeight() { return 55; }
	public function getColor() { return 0xff0000; }
}

class Border {
	public function getWidth() { return 9; }
	public function getHeight() { return 4; }
}

class Lamp {
	public function move( $x, $y ) { }
	public function getColor() { return 0xff0000; }
}

$measurer = new Measurer();
$kettle = new Kettle();
echo $measurer->maxSize($kettle).PHP_EOL;
$table    = new Table();
echo $measurer->maxSize( $table ) . PHP_EOL;
