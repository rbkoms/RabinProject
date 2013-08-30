<?php
class CarSedan extends Car {
	
	
	private $table_name ='carsedan';
	private $model_name;
	private $car_mileage;
	private $car_length;
	
	public function set_model_name($model_name) {
		
		$this->model_name = $model_name;
	}

	public function set_car_length($car_length) {

		$this->car_length = $car_length;
		
	}

	public function set_car_mileage($car_mileage) {

		$this->car_mileage = $car_mileage;
		
	}
	public function set_wheels($wheels) {

		$wheels;
	}


	public static function create_sedan ($parameters) {

		$sedan = static::create();
		$sedan->model_name = $parameters['model_name'];
		$sedan->car_length = $parameters['car_length'];
		$sedan->car_mileage = $parameters['car_mileage'];
		
		return $sedan;
	}

}


