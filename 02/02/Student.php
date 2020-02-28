<?php


class Student
{
	public $firstName;
	public $lastName;
	public $birthDate;

	public function __construct($lastName, $firstName, $birthDate)
	{
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->birthDate = $birthDate;
	}

	public function getFullName()
	{
		return $this->lastName . ' ' .$this->firstName;
	}
}

function loadStudentsFromTxt($file)
{
	$rows = file($file);
	$students = [];

	foreach ($rows as $row) {
		$values = array_map('trim', explode(';', $row));
		$students[] = new Student($values[0], $values[1], $values[2]);
	}

	return $students;
}

$file = __DIR__ . '/list.txt';

$students = loadStudentsFromTxt($file);

foreach ($students as $student) {
	echo $student->getFullName() . ' ' . $student->birthDate . PHP_EOL;
}


