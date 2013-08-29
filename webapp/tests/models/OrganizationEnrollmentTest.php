 <?php
class OrganizationEnrollmentTest extends CIUnit_TestCase
{
	protected $tables = array(
		'organization_enrollments'=>'organization_enrollments',
		'organizations'=>'organizations',
		'courses'=>'courses',
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
			'is_active'=>TRUE,
        	'is_delete'=>FALSE,
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
*/
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
		
		$org_enrollment = new OrganizationEnrollment();
		
		$course_id = $this->courses_fixt['1']['id'];
		$course = Course::find_by_id($course_id);

		$org_enrollment->course = $course;
		
		$this->assertEquals($org_enrollment->course_id,$course->id);
	}
	
	public function test_set_course_blank_exception()	{
		
		$org_enrollment = new OrganizationEnrollment();
		
		$course_id = $this->courses_fixt['3']['id'];
		$course = Course::find_by_id($course_id);
		
		$this->setExpectedException('CourseBlankException');
		$org_enrollment->course ='';

	}
	
	public function test_set_organization()	{
		
		$organization_id = $this->organizations_fixt['2']['id'];
		$organization = Organization::find_by_id($organization_id);
		
		
		$org_enrollment = new OrganizationEnrollment();
		
		
		$org_enrollment->organization = $organization;
		$this->assertEquals($org_enrollment->organization_id,$organization->id);
	
	}
	public function test_create() {
		//$course = $this->create_course();

		$course_id = $this->courses_fixt['4']['id'];
		$course = Course::find_by_id($course_id);

		$organization_id = $this->organizations_fixt['4']['id'];
		$organization = Organization::find_by_id($organization_id);
		
		
		$org_enrollment = OrganizationEnrollment::create(array(
		 			'courses'=>$course,
		 			'organization'=>$organization,
		 			));
  		$org_enrollment->save();
		$this->assertEquals($org_enrollment->course_id,$course->id);
		$this->assertEquals($org_enrollment->organization_id,$organization->id);
		$this->assertEquals($org_enrollment->is_active,TRUE);
		$this->assertEquals($org_enrollment->is_delete,FALSE);
	}
	public function test_create_exception() {
		
		//$course = $this->create_course();
		$course_id = $this->courses_fixt['1']['id'];
		$course = Course::find_by_id($course_id);

		
		$organization_id = $this->organizations_fixt['2']['id'];
		$organization = Organization::find_by_id($organization_id);
		
		
		/*$org_enrollment = OrganizationEnrollment::create(array(
		 			'course'=>$course,
		 			'organization'=>$organization,
		 			));
		$org_enrollment->is_active =TRUE;
		$org_enrollment->is_delete =FALSE;
		$org_enrollment->save();*/

		$this->setExpectedException("CourseEnrolled");
		$org_enrollment = OrganizationEnrollment::create(array(
		 			'courses'=>$course,
		 			'organization'=>$organization,
		 				));
				
	}
	public function test_create_inactive_exception() {
		$course_id = $this->courses_fixt['1']['id'];
		$course = Course::find_by_id($course_id);
		$organization_id = $this->organizations_fixt['1']['id'];
		$organization = Organization::find_by_id($organization_id);
		$this->setExpectedException("InactiveException");
		$org_enrollment = OrganizationEnrollment::create(array(
		 			'courses'=>$course,
		 			'organization'=>$organization, 		
		 			)
				);	

	}

	public function test_create_deleted_enrollment() {
		//$course = $this->create_course();
		$course_id = $this->courses_fixt['4']['id'];
		$course = Course::find_by_id($course_id);

		$organization_id = $this->organizations_fixt['4']['id'];
		$organization = Organization::find_by_id($organization_id);
		
		
		$org_enrollment = OrganizationEnrollment::create(array(
		 			'courses'=>$course,
		 			'organization'=>$organization,
		 			));
		/*$org_enrollment->is_active =FALSE;
		$org_enrollment->is_delete =TRUE;
		$org_enrollment->save();

		$org_enrollment = OrganizationEnrollment::create(array(
		 			'course'=>$course,
		 			'organization'=>$organization,
		 				));
		$org_enrollment->save();*/
		
	}
}
