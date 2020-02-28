<?php


class Demo04
{

	private $firstName;
	private $lastName;
	private $birthDate;

	public function __construct($firstName, $lastName, $birthDate = null)
	{
		if(empty($firstName) || empty($lastName)){
			throw new \http\Exception\InvalidArgumentException('Enter data');
		}
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->birthDate = $birthDate;
	}

	public function renameStudent(string $firstName, $lastName){
		if(empty($firstName) || empty($lastName)){
			throw new \http\Exception\InvalidArgumentException('Введите имя и фамилию');
		}

		$this->firstName = $firstName;
		$this->lastName = $lastName;
	}

	public function getFirstName(){return $this->firstName;}
	public function getLastName(){return $this->lastName;}
	public function getFullName(){return $this->lastName . ' ' . $this->firstName;}
	public function getBirthDate(){return $this->birthDate;}

}

$student = new Demo04('Starikov', 'Nicolai', '1981-03-20');

echo $student->getFirstName().PHP_EOL;
echo $student->getLastName().PHP_EOL;
echo $student->getFullName().PHP_EOL;
echo $student->getBirthDate().PHP_EOL;

echo '============================='.PHP_EOL;

$student->renameStudent('Piotr', 'Ciaicovschii');

echo $student->getFirstName().PHP_EOL;
echo $student->getLastName().PHP_EOL;
echo $student->getFullName().PHP_EOL;
echo $student->getBirthDate().PHP_EOL;


//$student5 = null;
//unset($student5);



