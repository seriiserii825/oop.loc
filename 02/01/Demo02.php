<?php


class Demo02
{

	public $firstName;
	public $lastName;
	public $birthDay;

	public function getFullName()
	{
		return $this->lastName . ' ' . $this->firstName;
	}

}

$student = new Demo02();

$student->firstName =  'Petya';

echo $student->getFullName();
