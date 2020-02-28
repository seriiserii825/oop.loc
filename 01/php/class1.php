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
$student->firstName = 'Vasya';

$student2 = $student;

$student2 = 10;

var_dump($student);
var_dump($student2);

//$student = new Student();
//$student->firstName = 'Vasya';
//$student1->lastName = 'Pupkin';
//
//$student2 = $student1;
//
//$student2->firstName = 'Petya';

//echo $student1->getFullName().PHP_EOL;
//echo $student2->getFullName().PHP_EOL;


//$array = [7, 9, 2];
//
//shuffle($array);
//
//var_dump($array);
