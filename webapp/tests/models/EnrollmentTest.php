<?php

class EnrollmentTest extends CIUnit_TestCase
{
	protected $tables = array(
		'enrollment'=>'enrollment',
		'courses'=>'courses',
		'members'=>'members',
		);

	public function __construct()
	{
		parent::__construct();
	}

	public function setUp()
	{
		parent::setUp();
	}

	public function tearDown()
	{
		parent::tearDown();
	}

	private function create_organization() {
		
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
		

	}
		private function create_course()
	{
		$course = Course::create(array(
							'cname'=>'java',
							'catagory'=>'gen',
							'duration'=>'10:00mins',
							)
						);
		$course->save();
		return $course;
	}

	public function test_set_course()
	{
		$enrollment = new Enrollment();
		$course = $this->create_course();
		$enrollment->course = $course;
		$this->assertEquals($enrollment->course_id,$course->id);
	}

	public function test_set_course_blank_exception()
	{
		$enrollment = new Enrollment();
		$this->setExpectedException("CourseBlankException");
		$enrollment->course='';
	}

	public function test_set_member()
	{
		$enrollment = new Enrollment();
		$member = $this->create_member();
		$enrollment->member = $member;
		$this->assertEquals($enrollment->member_id,$member->id);
	}

	public function test_create()
	{
		$course = $this->create_course();
		$member = $this->create_member();
		
		$enrollment = Enrollment::create(array(
		 			'course'=>$course,
		 			'member'=>$member,
		 			'is_active'=>1,
		 			'is_delete'=>0		 		
		 			)
				);

		$this->assertEquals($enrollment->course_id,$course->id);
		$this->assertEquals($enrollment->member_id,$member->id);
		$this->assertEquals($enrollment->is_active,1);
		$this->assertEquals($enrollment->is_delete,0);
	}

	public function test_create_exception()
	{
		$course = $this->create_course();
		$member = $this->create_member();
		
		$enrollment = Enrollment::create(array(
		 			'course'=>$course,
		 			'member'=>$member,
		 			'is_active'=>0,
		 			'is_delete'=>0		 		
		 			)
				);
		$this->setExpectedException("InvalidEnrollmentException");
		$enrollment = Enrollment::create(array(
		 			'course'=>$course,
		 			'member'=>$member,
		 			'is_active'=>1,
		 			'is_delete'=>0		 		
		 			)
				);

	}

}
