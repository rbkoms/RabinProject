<?php
class CarHatchback extends Car {
	
	
	private $table_name ='carhatchback';
	private $model_name;
	private $car_mileage;
	private $car_length;
	


	public function set_model_name($model_name) {
		
			$this->model_name = $model_name;
	}

	public function set_mileage($car_mileage) {
		
			$this->car_mileage = $car_mileage;
	}

	public function set_car_length($car_length) {
		
			$this->car_length = $car_length;
	}
	public static function create ($parameters) {

		$hatchback = new Hatchback();
		$hatchback->model_name = $parameters['model_name'];
		$hatchback->car_length = $parameters['car_length'];
		$hatchback->car_mileage = $parameters['car_mileage'];
		$hatchback->save();
		return $hatchback;
	}

	}