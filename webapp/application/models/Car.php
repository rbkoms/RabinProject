<?php

class Car extends ActiveRecord\Model {


	private $wheels;
	private $headlights;
	private $tellights;

	public function set_wheels($wheels) {

		$this->wheels = $wheels;

	}
	
	public function set_headlight($headlights) {

		$this->headlights = $headlights;

	}
	
	public function set_tellight($tellights) {

		$this->tellights = $tellights;

	}

	public static function create($car) {

		$car = new static;
		
		$car->set_wheels(2);
		$car->set_headlights(2);
		$car->set_tellights(2);

		return $car;
	}	
}