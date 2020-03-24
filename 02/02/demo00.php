<?php

	class Student {
		public $firstName;
		public $lastName;
		public $birthDate;
		public function __construct($lastName, $firstName, $birthDate) {
			$this->lastName = $lastName;
			$this->firstName = $firstName;
			$this->birthDate = $birthDate;
		}
		public function getFullName(){
			return $this->firstName . ' ' . $this->lastName;
		}
	}

	class TxtStudentRepository {
		private $file;
		public function __construct($file) {
			$this->file = $file;
		}

		public function findAll(){
			$rows = file($this->file);
			foreach ($rows as $row) {
				$values = array_map('trim', explode(';', $row));
				$student = new Student($values[0], $values[1], $values[2]);

				$students[] = $student;
			}
			return $students;
		}

		public function saveAll(array $students){
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

	class XmlStudentRepository {
		private $file;
		public function __construct($file) {
			$this->file = $file;
		}

		public function findAll(){
			$rows = simplexml_load_file($this->file);
			$students = [];
			foreach ($rows as $row) {
				$students[] = new Student($row->lastName, $row->firstName, $row->birthDate);
			}
			return $students;
		}
		public function saveAll(){
			return false;
		}
	}

//	$type = 'txt';
	$type = 'xml';

	switch ($type) {
		case 'txt':
			$studentRepository = new TxtStudentRepository(__DIR__ . '/list.txt');
			break;
		case 'xml':
			$studentRepository = new XmlStudentRepository(__DIR__ . '/list.xml');
			break;
		default:
			die('Incorrect type '.$type);
	}

	$students = $studentRepository->findAll();
	foreach ($students as $student) {
		echo $student->getFullName() . ' ' . $student->birthDate.PHP_EOL;
	}
	$studentRepository->saveAll($students);

