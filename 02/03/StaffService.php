<?php

class StaffService {
	public function recruiteEmployee($name, $phone, $address){
		$employee = [
			'id' => rand(1000, 999),
			'name' => $name,
			'phone' => $phone,
			'address' => $address,
		];

		$this->save($employee);
		return $employee;
	}

	public function save($employee) {
		$file = __DIR__.'/data/employee_'.$employee['id'].'.php';
		$data = var_export($employee, true);
		var_dump($data);
//		file_put_contents($file, $employee);
	}
}

$service = new StaffService();
$name = [
	'firstName' => 'Serii',
	'lastName' => 'Burduja'
];

$phone = [
	'phone' => '060562168'
];

$address = [
	'country' => 'Moldova',
	'city' => 'Chishinau'
];

$service->recruiteEmployee($name, $phone, $address);

