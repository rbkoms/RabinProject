<?php
class MemberTest extends CIUnit_TestCase {
	protected $tables = array(
		'members'=>'members',
		'organizations'=>'organizations',
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

	private function create_organization() {
		
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


	public function test_set_first_name() {

		$member = new Member();

		$member->first_name = 'Rabin';

		$this->assertEquals($member->first_name, 'Rabin');
	}

	public function test_set_first_name_exception() {

		$member = new Member();

		$this->setExpectedException('FirstNameInvalidException');

		$member->first_name = '';
	}

	public function test_set_last_name(){
		
		$member = new Member();
		
		$member->last_name ='rabin';
		
		$this->assertEquals($member->last_name,'rabin');
	}
	
	
	public function test_set_last_name_exception() {

		$member = new Member();

		$this->setExpectedException('LastNameInvalidException');

		$member->last_name = '';
	}


	
	public function test_set_email() {
		
		$member = new Member();
		
		$member->email ='rabin@k.com';
		
		$this->assertEquals($member->email,'rabin@k.com');
	}
	

	public function test_set_email_exception() {

		$member = new Member();

		$this->setExpectedException('EmailInvalidException');

		$member->email = '';
	}
	

	public function test_set_sex(){
		
		$member = new Member();
		
		$member->sex ='Male';
		
		$this->assertEquals($member->sex,'Male');
	}
	

	public function test_set_sex_exception() {

		$member = new Member();

		$this->setExpectedException('SexInvalidException');

		$member->sex = '';
	}

	public function test_set_organization()
	{
		$member= new Member();
		$organization_id = $this->organizations_fixt['2']['id'];
		$organization = Organization::find_by_id($organization_id);
		
		$member->organization = $organization;
		
	}
	
	public function test_valid_organization() {

		$member = new Member();

		$this->setExpectedException('InvalidOrganizationException');
		
		$member->organization ='';
	}
	
	public function test_is_organization_instance() {

		$member= new Member();
		
		$this->setExpectedException('InvalidOrganizationException');
		
		$member->organization= $member;
	}
	
	public function test_set_inactive_orgexception() {
		
		$member = new Member();
		
		$organization_id = $this->organizations_fixt['1']['id'];

		$organization = Organization::find_by_id($organization_id);
				
		$this->setExpectedException('InactiveException');

		$member->organization = $organization;
	}
	public function test_set_deleted_exception() {
		
		$member = new Member();
		
		$organization_id= $this->organizations_fixt['3']['id'];

		$organization = Organization::find_by_id($organization_id);

		$this->setExpectedException('DeleteException');

		$member->organization = $organization;
	}

	public function test_create_member() {
		
		//$organization = $this->create_organization();
		$organization_id = $this->organizations_fixt['1']['id'];
		$organization = Organization::find_by_id($organization_id);
		}
		/*$member = Member::create(array(
			'first_name'=> 'a',
			'last_name'=>'b',
			'email'=>'c',
			'sex'=>'Male',
			'organization'=> $organization,
			'is_active'=>TRUE,
        	'is_delete'=>FALSE,
		));		
		$member->save();
				
		$this->assertEquals($member->first_name,'a');
		$this->assertEquals($member->last_name,'b');
		$this->assertEquals($member->email,'c');
		$this->assertEquals($member->sex,'Male');
		$this->assertEquals($member->org_id,$organization->id);
		$this->assertEquals($member->is_active,TRUE);
		$this->assertEquals($member->is_delete,FALSE);*/
	
}

