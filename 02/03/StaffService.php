<?php

class Name
{
	private $first;
	private $last;

	public function __construct($first, $last)
	{
		$this->first = $first;
		$this->last = $last;
	}

	public function getFirst()
	{
		return $this->first;
	}

	public function getLast()
	{
		return $this->last;
	}

	public function getFullName()
	{
		return $this->first . ' ' . $this->last;
	}

	/**
	 * @param mixed $first
	 */
	public function setFirst($first)
	{
		$this->first = $first;
	}

	/**
	 * @param mixed $last
	 */
	public function setLast($last)
	{
		$this->last = $last;
	}
}


class Phone
{
	private $code;
	private $number;

	public function __construct($code, $number)
	{
		$this->code = $code;
		$this->number = $number;
	}

	public function is_equal($phone)
	{
		return $this->code == $phone->code && $phone->number === $this->number;
	}

	/**
	 * @return mixed
	 */
	public function getCode()
	{
		return $this->code;
	}

	/**
	 * @return mixed
	 */
	public function getNumber()
	{
		return $this->number;
	}

	/**
	 * @param mixed $code
	 */
	public function setCode(Phone $code)
	{
		$this->code = $code;
	}

	/**
	 * @param mixed $number
	 */
	public function setNumber(Phone $number)
	{
		$this->number = $number;
	}
}

class Address
{
	private $country;
	private $city;
	private $street;

	public function __construct($country, $city, $street)
	{
		$this->country = $country;
		$this->city = $city;
		$this->street = $street;
	}

	/**
	 * @return mixed
	 */
	public function getCity()
	{
		return $this->city;
	}

	/**
	 * @return mixed
	 */
	public function getStreet()
	{
		return $this->street;
	}

	/**
	 * @return mixed
	 */
	public function getCountry()
	{
		return $this->country;
	}
}

class Employee
{
	public $id;
	public $name;
	public $phones = [];
	public $address;

	public function __construct($id, Name $name, array $phones, Address $address)
	{
		$this->id = $id;
		$this->name = $name;
		$this->phone = $phones;
		$this->address = $address;
	}

	public function getId()
	{
		return $this->id;
	}
	public function getName()
	{
		return $this->name->getFullName();
	}
	public function getPhone()
	{
		return $this->phones;
	}
	public function getAddress()
	{
		return $this->address;
	}

	/**
	 * @param Name $name
	 */
	public function rename($firstName, $lastName)
	{
		$this->name->setFirst($firstName);
		$this->name->setLast($lastName);
	}

	/**
	 * @param Phone $phone
	 */
	public function addPhone(Phone $phone)
	{
		foreach ($this->phones as $item) {
			if ($item->is_equal($phone)) {
				throw new \Exception('Phone already exist');
			}
		}
		$this->phones[] = $phone;
	}
	public function deletePhone(Phone $phone)
	{
		foreach($this->phones as $i => $item){
			if($item->is_equal($phone)){
				unset($this->phones[$i]);
				return;
			}
		}
		throw new \Exception('Phone not found.');
	}

	/**
	 * @param Address $address
	 */
	public function changeAddress($address)
	{
		$this->address = $address;
	}
}

class StaffService
{
	public function recruiteEmployee(Name $name, Phone $phone, Address $address)
	{
		$employee = new Employee($this->generateId(), $name, [$phone], $address);
		$this->save($employee);
		return $employee;
	}

	public function generateId()
	{
		return rand(1000, 9999);
	}

	public function save($employee)
	{
		$file = __DIR__ . '/data/employee_' . $employee->address->getCountry() . '.php';
		$data = var_export($employee, true);
		file_put_contents($file, $data);
	}
}

$service = new StaffService();
$employee = $service->recruiteEmployee(new Name('Vasya', 'Pupkin'), new Phone('373', '444444'), new Address('Molova', 'Cahul', 'Miroshnichenko 14'));

$employee->addPhone(new Phone('7', '220798'));
$employee->addPhone(new Phone('373', '060562168'));

foreach($employee->getPhone() as $item){
	var_dump($item);
}
echo "After".PHP_EOL;

$employee->deletePhone(new Phone('7', '220798'));

foreach($employee->getPhone() as $item){
	var_dump($item);
}
// echo $employee->getName() . PHP_EOL;
// $employee->rename('Vova', 'Putin');
// echo $employee->getName() . PHP_EOL;
