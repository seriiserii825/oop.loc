<?php

class Name
{
	private $first;
	private $last;

	public function __construct($first, $last) {
		$this->first = $first;
		$this->last = $last;
	}

	public function getFirst() {
		return $this->first;
	}

	public function getLast() {
		return $this->last;
	}

	/**
	 * @param mixed $first
	 */
	public function setFirst(Name $first) {
		$this->first = $first;
	}

	/**
	 * @param mixed $last
	 */
	public function setLast(Name $last) {
		$this->last = $last;
	}

}


class Phone
{
	private $code;
	private $number;

	public function __construct($code, $number) {
		$this->code = $code;
		$this->number = $number;
	}

	/**
	 * @return mixed
	 */
	public function getCode() {
		return $this->code;
	}

	/**
	 * @return mixed
	 */
	public function getNumber() {
		return $this->number;
	}

	/**
	 * @param mixed $code
	 */
	public function setCode(Phone $code) {
		$this->code = $code;
	}

	/**
	 * @param mixed $number
	 */
	public function setNumber(Phone $number) {
		$this->number = $number;
	}
}

class Address
{
	private $country;
	private $city;
	private $street;

	public function __construct($country, $city, $street) {
		$this->country = $country;
		$this->city = $city;
		$this->street = $street;
	}

	/**
	 * @return mixed
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * @return mixed
	 */
	public function getStreet() {
		return $this->street;
	}

	/**
	 * @return mixed
	 */
	public function getCountry() { return $this->country; }
}

class Employee
{
	public $id;
	public $name;
	public $phone;
	public $address;

	public function __construct($id, Name $name, Phone $phone, Address $address) {
		$this->id = $id;
		$this->name = $name;
		$this->phone = $phone;
		$this->address = $address;
	}

	public function getId() { return $this->id; }
	public function getName() { return $this->name; }
	public function getPhone() { return $this->phone; }
	public function getAddress() { return $this->address; }

	/**
	 * @param Name $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @param Phone $phone
	 */
	public function setPhone($phone) {
		$this->phone = $phone;
	}

	/**
	 * @param Address $address
	 */
	public function setAddress($address) {
		$this->address = $address;
	}
}

class StaffService
{
	public function recruiteEmployee(Name $name, Phone $phone, Address $address) {
		$employee = new Employee($this->generateId());

		$this->save($employee);
		return $employee;
	}

	public function generateId() { return rand(1000, 9999); }

	public function save($employee) {
		$file = __DIR__ . '/data/employee_' . $employee->address->getCountry() . '_' . $employee->phone->getNumber() . '.php';
		$data = var_export($employee, true);
		file_put_contents($file, $data);
	}
}

$service = new StaffService();
$employee = $service->recruiteEmployee(new Name('Vasya', 'Pupkin'), new Phone('373', '444444'), new Address('Molova', 'Cahul', 'Miroshnichenko 14'));


echo $employee->phone->getNumber() . PHP_EOL;


