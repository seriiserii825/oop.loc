<?php


class Demo03
{

	public $firstName;
	public $lastName;
	public $birthDay;

	public function getFullName()
	{
		return $this->lastName . ' ' . $this->firstName;
	}

}

$student1 = new Demo02();
$student2 = new Demo02();
$student3 = new Demo02();
$student4 = new Demo02();
$student5 = new Demo02();

echo $student1->getFullName();
echo $student2->getFullName();
echo $student3->getFullName();
echo $student4->getFullName();
echo $student5->getFullName();

