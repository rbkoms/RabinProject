<?php

class Getfbk extends CI_Controller {

	public function __construct() {

        parent::__construct();
    	}

	public function index() {

		if($_SERVER['REQUEST_METHOD'] !== 'POST') {
			
			return $this->load->view('feedback');
		}
		
		$data['feedback'] = $_POST['feedback'];
		$data['name'] = $_POST['name'];


		try{

			$feedbackk = Feedback::create($data);
				
		}
			
		catch(FeedbackInvalidException $e)
			{
				return $this->load->view('feedback', array(
					'message'=>$e->getMessage(),
					));
			}
		catch(NameInvalidException $e)
			{
				return $this->load->view('feedback', array(
					'message'=>$e->getMessage(),
					));
			}
					
			

	}
}