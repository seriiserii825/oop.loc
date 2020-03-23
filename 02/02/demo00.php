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

	class StudentRepository {
		public function findAll($file){
			$rows = file($file);
			foreach ($rows as $row) {
				$values = array_map('trim', explode(';', $row));
				$student = new Student($values[0], $values[1], $values[2]);

				$students[] = $student;
			}
			return $students;
		}

		public function saveAll(array $students, $file){
			$rows = [];
			foreach ($students as $student) {
				$rows[] = implode(';', [
					$student->lastName,
					$student->firstName,
					$student->birthDate
				]);
			}
			file_put_contents($file, implode(PHP_EOL, $rows));
		}

	}



	$file = __DIR__ . '/list.txt';
	$studentRepository = new StudentRepository();

	$students = $studentRepository->findAll($file);
	foreach ($students as $student) {
		echo $student->getFullName() . ' ' . $student->birthDate.PHP_EOL;
	}
	$studentRepository->saveAll($students, $file);

