<?php


class Student
{
	private $firstName;
	private $lastName;
	private $birthDate;

	public function __construct($lastName, $firstName, $birthDate)
	{
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->birthDate = $birthDate;
	}

	public function getFullName()
	{
		return $this->lastName . ' ' . $this->firstName;
	}


}

class TxtStudentRepository
{

	private $file;

	public function __construct($file)
	{
		$this->file = $file;
	}

	public function findAll()
	{
		$rows = file($this->file);

		$students = [];

		foreach ($rows as $row) {
			$values = array_map('trim', explode(';', $row));
			$students[] = new Student($values[0], $values[1], $values[2]);
		}
		return $students;
	}
}

$studentsRepository = new TxtStudentRepository(__DIR__ . '/list.txt');

$students = $studentsRepository->findAll();
foreach ($students as $student) {
	echo $student->getFullName() . PHP_EOL;
}
