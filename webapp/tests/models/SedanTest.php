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