<?php
include_once('Exceptions.php');
class Course extends ActiveRecord\Model {
	static $table_name ='courses';

	static $primary_key = 'id';

	static $has_many = array(
		array(
        'enrollments',
        'class_name'=>'Enrollment',
        'foreign_key'=>'course_id'),
		array(
        'organization_enrollments',
        'class_name'=>'OrganizationEnrollment',
        'foreign_key'=>'course_id'),
   		);

	public function set_cname($cname) {
		
			if($cname=='') {
			
				throw new CNameInvalidException("name required");
			}		
		
		$this->assign_attribute('cname', $cname);
	}


	public function set_catagory($catagory) {
		
			if($catagory=='') {
			
				throw new CatagoryInvalidException("catagory required");
			}		
		
		$this->assign_attribute('catagory', $catagory);
	}

	public function set_duration($duration) {
		
			if($duration=='') {
			
				throw new DurationInvalidException("duration required");
			}		
		
		$this->assign_attribute('duration', $duration);
	}

	

	public function get_cname() {

		return $this->read_attribute('cname');
	}

	public function get_catagory() {

		return $this->read_attribute('catagory');
	}
	public function get_duration() {

		return $this->read_attribute('duration');
	}


	public static function create($parameters) {
		$course = new Course();

		$course->cname = $parameters['cname'];
		$course->catagory= $parameters['catagory'];
		$course->duration = $parameters['duration'];
		$course->save();

		return $course;
		}

}