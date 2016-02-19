<?php
	class Person {
		public $age;
		public $name;

		public function __construct($name){
			$this->name = $name;
		}

		public function setAge($age) {
			if ($age < 18) {
				throw new exception("Person is not old enough");
			}

			$this->age = $age;

		}
		public function getAge($age) {
			return $age * 365;

		}

	}

	$john = new Person("John Doe");
	$john->setAge(30);


	echo "<pre>";
	var_dump($john->getAge(30));
	echo "</pre>";
?>