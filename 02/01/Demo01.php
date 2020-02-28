<?php


class Demo01
{

	var $firstName;
	var $lastName;
	var $birthDay;

	function getFullName($lastName, $firstName)
	{
		return $lastName . ' ' . $firstName;
	}

}

$student = new Student();

$student = [
	'firstName' => 'Vasya',
	'lastName' => 'Pupkin',
	'birthDay' => '1220-12-29'
];

$student['firstName'] = 'Petya';

echo getFullName($student['lastName'], $student['firstName']);
