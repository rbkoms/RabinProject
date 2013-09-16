<?php

class Course_Signup extends CI_Controller {

	public function __construct() {

        parent::__construct();
    	}

	public function index() {

		
			

		if($_SERVER['REQUEST_METHOD'] !== 'POST') {

			return $this->load->view('courseForm');
		}
		
		$data['cname']= $_POST['cname'];
		//echo $_POST['cname'];
		//exit();
        $data['catagory']=$_POST['catagory'];
        $data['duration']=$_POST['duration'];
        


		
		
		try{

			$course = Course::create($data);

			}
			
		catch(CNameInvalidException $e)
			{
				return $this->load->view('courseForm', array('message'=>$e->getMessage(),));
			}
		catch(CatagoryInvalidException $e)
			{
				return $this->load->view('courseForm', array('message'=>$e->getMessage(),));
			
			}
		catch(DurationInvalidException $e)
			{
				return $this->load->view('courseForm', array('message'=>$e->getMessage(),));
			
			}
		

		if(!$course)
        {
            $this->session->set_flashdata('create_problem','Course creation is unsuccessfull');
            redirect('course_signup');
        }

        $courses= Course::all();

        return $this->load->view('coursee',array('courses'=>$courses));/**/        
    }


        public function view_members($course_id) {   
       
            $course= Course::find_by_id($course_id);
        
            /*foreach ($course->enrollments as $enrollment)
            {
                echo $enrollment->member->first_name." ".$enrollment->member->last_name;
            }*/
            return $this->load->view('cmembers',array(
            	'courses'=>$course));
	

	}
	public function outcoursedetails() {

		$courses= Course::all();

       	$this->load->view('coursee',array('courses'=>$courses));/**/        
	}
}