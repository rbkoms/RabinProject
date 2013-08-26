<?php
class CourseTest extends CIUnit_TestCase {
	protected $table=array(
		'courses'=>'courses',
		'organizations'=>'organizations',
		'organization_enrollments',
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

	
	public function test_set_cname() {

		$course = new Course();

		$course->cname = 'Nepali';

		$this->assertEquals($course->cname, 'Nepali');
	}

	public function test_set_cname_exception() {

		$course = new Course();

		$this->setExpectedException('CNameInvalidException');

		$course->cname = '';
	}

	public function test_set_catagory() {

		$course = new Course();

		$course->catagory = 'General';

		$this->assertEquals($course->catagory,'General');
	}
	
	public function test_set_catagory_exception() {

		$course = new Course();

		$this->setExpectedException('CatagoryInvalidException');

		$course->catagory= '';

	}

	public function test_set_duration() {

		$course = new Course();

		$course->duration = '10:00mins';

		$this->assertEquals($course->duration,'10:00mins');

	}

	public function test_set_duration_exception() {

		$course = new Course();

		$this->setExpectedException('DurationInvalidException');

		$course->duration= '';

	}

	public function test_create_course() {
		
		$course = Course::create(array(
			'cname'=> 'a',
			'catagory'=>'b',
			'duration'=>1,
			));
		$course->save();
		$this->assertEquals($course->cname,'a');
		$this->assertEquals($course->catagory,'b');
		$this->assertEquals($course->duration,1);
	}
	}