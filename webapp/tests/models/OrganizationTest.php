<?php
class OrganizationTest extends CIUnit_TestCase
{
	protected $tables = array(
		'organizations'=>'organizations',
		'members'=>'members'
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
	public function test_set_org_name()
	{
		$organization = new Organization();
		$organization->org_name = "Olive Media";
		$this->assertEquals($organization->org_name,"Olive Media");
	}
	public function test_set_org_location()
	{
		$organization = new Organization();
		$organization->org_location = "chabahil";
		$this->assertEquals($organization->org_location,"chabahil");
	}
	public function test_set_org_director()
	{
		$organization = new Organization();
		$organization->org_director = "ram";
		$this->assertEquals($organization->org_director,"ram");
	}
	public function test_set_org_contact_no()
	{
		$organization = new Organization();
		$organization->org_contact_no = 98455455444;
		$this->assertEquals($organization->org_contact_no,98455455444);
	}
	
	public function test_org_org_name_exception()
	{
		$organization = new Organization();
		$this->setExpectedException('OrgNameInvalidException');
		$organization->org_name = "";
	}
	public function test_org_location_exception()
	{
		$organization = new Organization();
		$this->setExpectedException('OrgLocationInvalidException');
		$organization->org_location = "";
	}
	public function test_org_director_exception()
	{
		$organization = new Organization();
		$this->setExpectedException('OrgDirectorInvalidException');
		$organization->org_director = "";
	}
	public function test_org_contact_no_exception()
	{
		$organization = new Organization();
		$this->setExpectedException('OrgContactnoInvalidException');
		$organization->org_contact_no = "";
	}
	
	public function test_create()
	{
		$organization = Organization::create(array(
		 			'org_name'=> 'Olive Media',
		 			'org_location'=>'chabahil',
		 			'org_director'=>'ram',
		 			'org_contact_no'=>989262626,	 		
		 			)
				);
		$this->assertEquals($organization->org_name,'Olive Media');
		$this->assertEquals($organization->org_location,'chabahil');
		$this->assertEquals($organization->org_director,'ram');
		$this->assertEquals($organization->org_contact_no,989262626);
		
		}
}