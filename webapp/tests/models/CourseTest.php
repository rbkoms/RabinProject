<?php
class CourseTest extends CIUnit_TestCase {
	protected $table=array(

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

	public function get_config_array() {
		$config['hostname'] = 'google.com';
        $config['username'] = 'a';
        $config['password'] = 'a';
        $config['port']     = 21;
        $config['passive']  = FALSE;
        $config['debug']    = TRUE;

        return $config;
	}


	public function create_mock_upload_true() {
		
		$config = $this->get_config_array();
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
		
		$config = $this->get_config_array();
		$ftp_mock = $this->getMockBluider('CI_FTP')
							->disableOrginalConstructor()
							->getMock();

		$ftp_mock->exsperts($this->once())
							->method('connect')
							->with($this->equalTo($config))
							->will($this->returnValue(TRUE));

		$ftp_mock->expects($this->once())
							->method('upload')
							->with('C:\Users\rabin\Documents\GitHub\RabinProject\webapp\system\Cupload\a.text','/www/uploads/myfolder/')
							->will($this->returnValue(FALSE));

		return $ftp_mock;
	}
	
	public function create_mock_connect_false()
	{
		$config = $this->get_config_array();
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
		$config = $this->get_config_array();	
		//$course_id = $this->courses_fixt['1']['id'];
		$course = Course::find_by_id(1);
		$ftp_mock = $this->create_mock_upload_true();
    	$bool= $course->course_upload($ftp_mock,$config);
		$this->assertTrue($bool);
	}

	public function test_upload_false() {
		$config = $this->get_config_array();
		//$course_id = $this->courses_fixt['1']['id'];
		$course = Course::find_by_id(1);
		$ftp_mock = $this->create_mock_upload_false();
		$bool = $course->course_upload($ftp_mock,$config);
		$this->assertFalse($bool);
	}
	
	public function test_connect_false() {
		$config = $this->get_config_array();
		//$course_id = $this->courses_fixt['1']['id'];
		$course = Course::find_by_id(1);
		$ftp_mock = $this->create_mock_connect_false();
    	$bool= $course->course_upload($ftp_mock,$config);
		$this->assertFalse($bool);
	}

}