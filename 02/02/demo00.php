<?php

class Student
{
	public $firstName;
	public $lastName;
	public $birthDate;

	public function __construct($lastName, $firstName, $birthDate) {
		$this->lastName = $lastName;
		$this->firstName = $firstName;
		$this->birthDate = $birthDate;
	}

	public function getFullName() {
		return $this->firstName . ' ' . $this->lastName;
	}
}

class TxtStudentRepository
{
	private $file;
	public function __construct($file) {
		$this->file = $file;
	}

	public function findAll() {
		$rows = file($this->file);
		foreach ($rows as $row) {
			$values = array_map('trim', explode(';', $row));
			$student = new Student($values[0], $values[1], $values[2]);

			$students[] = $student;
		}
		return $students;
	}

	public function findByBirthDate($birthDate) {
		$rows = file($this->file);
		$students = [];
		foreach ($rows as $row) {
			$values = array_map('trim', explode(';', $row));
			if ($values[2] === $birthDate) {
				$student = new Student($values[0], $values[1], $values[2]);
				$students[] = $student;
			}
		}
		return $students;
	}

	public function saveAll(array $students) {
		$rows = [];
		foreach ($students as $student) {
			$rows[] = implode(';', [$student->lastName, $student->firstName, $student->birthDate]);
		}
		file_put_contents($this->file, implode(PHP_EOL, $rows));
	}
}

class XmlStudentRepository
{
	private $file;

	public function __construct($file) {
		$this->file = $file;
	}

	public function findAll() {
		$rows = simplexml_load_file($this->file);
		$students = [];
		foreach ($rows as $row) {
			$students[] = new Student($row->lastName, $row->firstName, $row->birthDate);
		}
		return $students;
	}

	public function saveAll() {
		return false;
	}
}

$type = 'txt';
//	$type = 'xml';

class RepositoryFactory {
	public static function create($type, $file){
		switch ($type) {
			case 'txt':
				$studentRepository = new TxtStudentRepository($file);
				break;
			case 'xml':
				$studentRepository = new XmlStudentRepository($file);
				break;
			default:
				die('Incorrect type ' . $type);
		}
		return $studentRepository;
	}
}
$file = __DIR__."/list.txt";
$studentRepository = RepositoryFactory::create($type, $file);

$students = $studentRepository->findAll();
$studentsByBirthDate = $studentRepository->findByBirthDate('14-3-36');

foreach ($students as $student) {
	echo $student->getFullName() . ' ' . $student->birthDate . PHP_EOL;
}
$studentRepository->saveAll($students);



