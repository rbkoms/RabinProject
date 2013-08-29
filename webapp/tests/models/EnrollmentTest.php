<?php

class EnrollmentTest extends CIUnit_TestCase
{
	protected $tables = array(
		'enrollment'=>'enrollment',
		'courses'=>'courses',
		'members'=>'members',
		);

	public function __construct() {
		parent::__construct();
	}

	public function setUp() {
		parent::setUp();
	}

	public function tearDown() {
		parent::tearDown();
	}

	/*private function create_organization() {
		
		$organization = Organization::create(array(
			'org_name'=>'rb',
			'org_location'=>'nepal',
			'org_director'=>'rb',
			'org_contact_no'=>98959005994,
			)); 
		$organization->save();
		return $organization;
		

	}

	private function create_member() {

		$organization = $this->create_organization();
		
		$member = Member::create(array(
			'first_name'=>'rb',
			'last_name'=>'karma',
			'email'=>'rb',
			'sex'=>'Male',
			'organization'=>$organization,
			'is_active'=>TRUE,
        	'is_delete'=>FALSE,
			)); 
		$member->save();
		return $member;
		

	}*/
		private function create_course() {
		$course = Course::create(array(
							'cname'=>'java',
							'catagory'=>'gen',
							'duration'=>'10:00mins',
							)
						);
		$course->save();
		return $course;
	}

	public function test_set_course() {
		$enrollment = new Enrollment();
		//$course = $this->create_course();
		$course_id = $this->courses_fixt['1']['id'];
		$course = Course::find_by_id($course_id);
		$enrollment->course = $course;
		$this->assertEquals($enrollment->course_id,$course->id);
	}

	public function test_set_course_blank_exception() {
		$enrollment = new Enrollment();
		$this->setExpectedException("CourseBlankException");
		$enrollment->course='';
	}

	public function test_set_member() {
		$enrollment = new Enrollment();
		$member_id = $this->members_fixt['1']['id'];
		$member = Member::find_by_id($member_id);
		$enrollment->member = $member;
		$this->assertEquals($enrollment->member_id,$member->id);
	}

	public function test_create() {
		//$course = $this->create_course();
		//$member = $this->create_member();
		$course_id = $this->courses_fixt['3']['id'];
		$course = Course::find_by_id($course_id);

		$member_id = $this->members_fixt['3']['id'];
		$member = Member::find_by_id($member_id);
		
		/*$enrollment =$this->enrollment['1']['id'];
		$enrollment = Enrollment::find_by_id('id');*/

	
		$enrollment = Enrollment::create(array(
		 			'courses'=>$course,
		 			'members'=>$member,
		 			));

		$this->assertEquals($enrollment->course_id,$course->id);
		$this->assertEquals($enrollment->member_id,$member->id);
		$this->assertEquals($enrollment->is_active,1);
		$this->assertEquals($enrollment->is_delete,0);
	}
	public function test_create_exception() {
		/*$course_id = $this->courses_fixt['3']['id'];
		$course = Course::find_by_id($course_id);*/

		$member_id = $this->members_fixt['3']['id'];
		$member = Member::find_by_id($member_id);

		$enrollment_id =$this->enrollment_fixt['1']['id'];
		$enrollment = Enrollment::find_by_id($enrollment_id);

		
		$this->setExpectedException("CourseBlankException");
		$enrollment = Enrollment::create(array(
		 			'courses'=>'',
		 			'members'=>$member,
		 			)
				);

	}
	public function test_create_inactive_exception() {
		
		$course_id = $this->courses_fixt['5']['id'];
		$course = Course::find_by_id($course_id);
		
		$member_id = $this->members_fixt['3']['id'];
		$member = Member::find_by_id($member_id);

		/*$enrollment_id =$this->enrollment_fixt['1']['id'];
		$enrollment = Enrollment::find_by_id($enrollment_id);
		*/
		
		$this->setExpectedException("InactiveException");
		$enrollment = Enrollment::create(array(
		 			'courses'=>$course,
		 			'members'=>$member,
		 				 		
		 			)
				);

	}

	public function test_create_deleted_exception() {
		//$course = $this->create_course();
		//$member = $this->create_member();
		$course_id = $this->courses_fixt['1']['id'];
		$member_id = $this->members_fixt['3']['id'];
		$course = Course::find_by_id($course_id);
		$member = Member::find_by_id($member_id);
		
		
		$enrollment = Enrollment::create(array(
		 			'courses'=>$course,
		 			'members'=>$member,
		 				 		
		 			)
				);

	}


}
