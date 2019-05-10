<?php

namespace App\Components;

class Users{
	public function __construct($name, $age = 0) {
		$this->name = $name;
		$this->age = $age;
	}

	public function name() {
		return $this->name;
	}

	public function age() {
		return $this->age;
	}
}