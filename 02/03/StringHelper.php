<?php

class StringHelper
{
	public static function toUpperCase($string) {
		return mb_strtoupper($string, 'utf-8');
	}

	public static function toLowerCase($string) {
		return mb_strtolower($string, 'utf-8');
	}
}


echo StringHelper::toLowerCase('Vasya') . PHP_EOL;
echo StringHelper::toUpperCase('Vasya') . PHP_EOL;
