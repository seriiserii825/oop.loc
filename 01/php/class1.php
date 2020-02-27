<?php


class Student
{
	var $firstName;
	var $lastName;
	var $birthDate;

	function getFullName(){
		return $this->firstName . ' ' . $this->lastName;
	}
}

$student = new Student();

$student->lastName = 'Vasya';
$student->firstName = 'Pupkin';

echo $student->getFullName();
