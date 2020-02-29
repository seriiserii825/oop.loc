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
		return $this->lastName . ' ' . $this->firstName;
	}

}

class TxtStudentReposytory
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

	public function saveAll(array $students)
	{
		$rows = [];
		foreach ($students as $student) {
			$rows[] = implode(';', [
				$student->lastName,
				$student->firstName,
				$student->birthDate
			]);
		}
		file_put_contents($this->file, implode(PHP_EOL, $rows));
	}
}

class CsvStudentRepository {
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
			$values = array_map('trim', explode(',', $row));
			$students[] = new Student($values[0], $values[1], $values[2]);
		}
		return $students;
	}
}


//#########################A
$type = 'txt';
$file = __DIR__.'/list.txt';
//$file = __DIR__.'/students.csv';

switch ($type){
	case "txt":
		$studentRepository = new TxtStudentReposytory($file);
		break;

	case "csv":
		$studentRepository = new CsvStudentRepository($file);
		break;
}
//#########################A

$students = $studentRepository->findAll();

foreach ($students as $student) {
	echo $student->getFullName() . ' ' . $student->birthDate . PHP_EOL;
}

