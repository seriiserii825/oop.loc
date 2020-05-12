<?php

interface Point {
	public function getCoordinates();
}

class Canvas {
	public function paint( Point $point ) {
		list( $x, $y, $z ) = $point->getCoordinates();
		return "[x = $x, y = $y, z = $z]\n";
	}
}


class DecartPoint implements Point {
	private $x;
	private $y;
	private $z;
	public function __construct($x, $y, $z) {
		$this->x = $x;
		$this->y = $y;
		$this->z = $z;
	}
	public function getCoordinates() {
		return [ $this->x, $this->y, $this->z ];
	}
}

class CilindricalPoint implements Point {
	public $f;
	public $r;
	public $h;
	public function __construct( $f, $r, $h ) {
		$this->f = $f;
		$this->r = $r;
		$this->h = $h;
	}
	public function getCoordinates() {
		return [ $this->r * cos( $this->f ), $this->r * sin( $this->f ), $this->h ];
	}
}

$canvas   = new Canvas();
$point    = new DecartPoint(10, 8, 16);
echo $canvas->paint( $point ) . PHP_EOL;

$point    = new CilindricalPoint(10, 8, 2);
echo $canvas->paint( $point ) . PHP_EOL;
