<?php
class OrganizationTest extends CIUnit_TestCase {

	protected $tables = array(
		'organizations'=>'organizations',
		'members'=>'members',
		'courses'=>'courses',
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
	public function test_set_org_name() {

		$organization = new Organization();
		$organization->org_name = "Olive Media";
		$this->assertEquals($organization->org_name,"Olive Media");
	}

	public function test_set_org_location() {

		$organization = new Organization();
		$organization->org_location = "chabahil";
		$this->assertEquals($organization->org_location,"chabahil");
	}

	public function test_set_org_director() {

		$organization = new Organization();
		$organization->org_director = "ram";
		$this->assertEquals($organization->org_director,"ram");
	}

	public function test_set_org_contact_no() {

		$organization = new Organization();
		$organization->org_contact_no = 98455455444;
		$this->assertEquals($organization->org_contact_no,98455455444);
	}

	
	public function test_org_org_name_exception() {

		$organization = new Organization();
		$this->setExpectedException('OrgNameInvalidException');
		$organization->org_name = "";
	}

	public function test_org_location_exception() {

		$organization = new Organization();
		$this->setExpectedException('OrgLocationInvalidException');
		$organization->org_location = "";
	}

	public function test_org_director_exception() {

		$organization = new Organization();
		$this->setExpectedException('OrgDirectorInvalidException');
		$organization->org_director = "";
	}

	public function test_org_contact_no_exception() {

		$organization = new Organization();
		$this->setExpectedException('OrgContactnoInvalidException');
		$organization->org_contact_no = "";
	}
	
	public function test_create() {
		
		$organization = Organization::create(array(
		 			'org_name'=> 'Olive Media',
		 			'org_location'=>'chabahil',
		 			'org_director'=>'ram',
		 			'org_contact_no'=>989262626,	 		
		 			)
				);
		/*$organization->save();
		exit();*/
		$this->assertEquals($organization->org_name,'Olive Media');
		$this->assertEquals($organization->org_location,'chabahil');
		$this->assertEquals($organization->org_director,'ram');
		$this->assertEquals($organization->org_contact_no,989262626);
		
		}
		
	public function test_count_members_org_enrollments() {

		$organization_id = $this->organizations_fixt['2']['id'];
		$organization = Organization::find_by_id($organization_id);
		
        $this->assertEquals($organization->count_members,0);
		$this->assertEquals($organization->count_organization_enrollments,0);
		$organization->count_members_org_enrollments();
		$this->assertEquals($organization->count_members,3);
		$this->assertEquals($organization->count_organization_enrollments,2);
	}

	public function test_count_members() {

		$reflection_class= new ReflectionClass("Organization");
		$method = $reflection_class->getMethod('count_members');
		$method->setAccessible(true);
		$organization_id = $this->organizations_fixt['2']['id'];
		$organization = Organization::find_by_id($organization_id);
		$this->assertEquals($method->invoke($organization),3);
	}
	
	public function test_enroll_members_rollback_exception() {
		
		$organization_enrollment = OrganizationEnrollment::find_by_id($this->organization_enrollments_fixt['2']['id']);
		$organization = Organization::find_by_id($this->organizations_fixt['2']['id']);
		$this->setExpectedException("InvalidInstanceException");
		$organization->enroll_members(array($organization_enrollment->course));
		foreach($organization->members as $member) {

			$enrollment = Enrollment::find_by_member_id_and_course_id($member->id,$organization_enrollment->course->id);
			//$enrollment = Enrollment::find_by_member_id_and_course_id($member->id,$course->id);
			$this->assertNull($enrollment);
		}
		
	}

}