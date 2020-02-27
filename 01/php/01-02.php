<?php

function getFullName($lastName, $firstName){
	return $lastName . ' ' .$firstName;
}

$student = [
	'firstName' => 'Vasya',
	'lastName' => 'Pupkin',
	'birthDay' => '1220-12-29'
];

$student['firstName'] = 'Petya';

echo getFullName($student['lastName'],  $student['firstName']);
