<?php
class CourseTest extends CIUnit_TestCase {
	protected $tables = array(
		'courses'=>'courses',
		'organizations'=>'organizations',
		'organization_enrollments'=>'organization_enrollments',
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

	public function test_get_config_array() {

		$course = new Course();
		$config = $course->get_config_array();

        $this->assertEquals($config['username'], 'a');
        $this->assertEquals($config['hostname'], 'google.com');
        $this->assertEquals($config['password'], 'a');
        $this->assertEquals($config['port'], 21);
        $this->assertEquals($config['passive'], FALSE);
        $this->assertEquals($config['debug'], TRUE);
	}


	public function create_mock_upload_true() {
		
		$config = $this->test_get_config_array();
		$ftp_mock = $this->getMockBuilder('CI_FTP')
							->disableOriginalConstructor()
							->getMock();
		
		$ftp_mock->expects($this->any())
                 	->method('connect')
                 	->with($this->equalTo($config))
    				->will($this->returnValue(TRUE));

    	$ftp_mock->expects($this->any())
    				->method('upload')
    				->with('C:\Users\rabin\Documents\GitHub\RabinProject\webapp\system\Cupload\a.text','/www/uploads/myfolder/')
    				->will($this->returnValue(TRUE));
    							
    	return $ftp_mock;

	}

	public function create_mock_upload_false() {
		
		$config = $this->test_get_config_array();
		$ftp_mock = $this->getMockBuilder('CI_FTP')
							->disableOriginalConstructor()
							->getMock();

		$ftp_mock->expects($this->any())
							->method('connect')
							->with($this->equalTo($config))
							->will($this->returnValue(TRUE));

		$ftp_mock->expects($this->any())
							->method('upload')
							->with('C:\Users\rabin\Documents\GitHub\RabinProject\webapp\system\Cupload\a.text','/www/uploads/myfolder/')
							->will($this->returnValue(FALSE));

		return $ftp_mock;
	}
	
	public function create_mock_connect_false()
	{
		$config = $this->test_get_config_array();
		$ftp_mock = $this->getMockBuilder('CI_FTP')
							->disableOriginalConstructor()
							->getMock();
		


		$ftp_mock->expects($this->any())
                 	->method('connect')
                 	->with($this->equalTo($config))
    				->will($this->returnValue(FALSE));

    	$ftp_mock->expects($this->any())
    				->method('upload')
    				->with('C:\Users\rabin\Documents\GitHub\RabinProject\webapp\system\Cupload\a.text','/www/uploads/myfolder/')
    				->will($this->returnValue(TRUE));
    							
    	return $ftp_mock;
	}
	
	public function test_upload_true() {
		$config = $this->test_get_config_array();	
		$course_id = $this->courses_fixt[1]['id'];
		$course = Course::find_by_id($course_id);
		$ftp_mock = $this->create_mock_upload_true();
    	$bool= $course->course_upload($ftp_mock,$config);
		$this->assertTrue($bool);
	}

	public function test_upload_false() {
		$config = $this->test_get_config_array();
		$course_id = $this->courses_fixt[1]['id'];
		$course = Course::find_by_id($course_id);
		$ftp_mock = $this->create_mock_upload_false();
		$bool = $course->course_upload($ftp_mock,$config);
		$this->assertFalse($bool);
	}
	
	public function test_connect_false() {
		$config = $this->test_get_config_array();
		$course_id = $this->courses_fixt[1]['id'];
		$course = Course::find_by_id($course_id);
		$ftp_mock = $this->create_mock_connect_false();
    	$bool= $course->course_upload($ftp_mock,$config);
		$this->assertFalse($bool);
	}

}