<?php
include_once('Exceptions.php');
class Feedback extends BaseModel {
	
	static $table_name ='feedback';
	static $primary_key = 'id';

	public function set_feedback($feedback) {
		
			if($feedback=='') {
			
				throw new FeedbackInvalidException("feedback required");
			}		
		
		$this->assign_attribute('feedback', $feedback);
	}
	public function set_name($name) {
		
			if($name=='') {
			
				throw new NameInvalidException("name required");
			}		
		
		$this->assign_attribute('name', $name);
	}

	
	public function get_feedback() {

		return $this->read_attribute('feedback');
	}

	public function get_name() {

		return $this->read_attribute('name');
	}


	public static function create($data) {

		$feedbackk = new Feedback();

		$feedbackk->feedback = $data['feedback'];
		$feedbackk->name = $data['name'];
						
		$feedbackk->save();
		
		return $feedbackk;	
	}



	

}