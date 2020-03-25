<?php

class Discount {
	public $limit;
	public $percent;

	public function __construct($limit, $percent) {
		$this->limit = $limit;
		$this->percent = $percent;
	}

	public function calcCost($cost){

		if($cost >= $this->limit){
			return $cost * (1 - $this->percent / 100);
		}else {
			return $cost;
		}
	}
}

$discount1 = new Discount(1000, 10);
$discount2 = new Discount(1000, 20);

echo $discount1->calcCost(1000).PHP_EOL;
echo $discount2->calcCost(1000).PHP_EOL;

$cost1 = $discount1->calcCost(1000);
echo $discount2->calcCost($cost1).PHP_EOL;

