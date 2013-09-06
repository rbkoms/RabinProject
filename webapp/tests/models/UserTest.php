<?php
class UserTest extends CIUnit_TestCase {
	protected $tables = array(
		'users'=>'users',
		'members' => 'members',
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
	
	public function test_set_username() {

		$user = new User();

		$user->username = 'om';

		$user->save();

		$user->username = 'aaa';

		$this->assertEquals($user->username, 'aaa');
	}

		public function test_set_old_username() {
		$user1 = new User();
		$user1->username = 'kiraan';
		$user1->save();

		$user2 = new User();
		$user2->username = 'raabin';
		$user2->save();
		$this->setExpectedException('UserNameInvalidException');
		$user1->username = 'raabin';

	}
	public function test_set_username_exception() {

		$user = new User();

		$this->setExpectedException('UserNameInvalidException');

		$user->username = '';
	}

	public function test_set_password(){
		
		$user = new User();
		
		$user->password ='om';
		
		$this->assertEquals($user->password,sha1('om'));
	}
	public function test_set_password_exception() {

		$user = new User();

		$this->setExpectedException('PasswordInvalidException');

		$user->password = '';
	}

	public function test_set_member() {

		$member_id = $this->members_fixt['1']['id'];
		$member = Member::find_by_id($member_id);

		$user= new User();
		$user->member = $member;
		$this->assertEquals($user->member_id,$member->id);

	}
	public function test_create_user() {
				
		$user = User::create(array(
			
			'username'=>'rbk',
			'password'=>'rbk',
			
			));
		/*$user->member = $member;*/
		$user->save();
				
		$this->assertEquals($user->username,'rbk');
		$this->assertEquals($user->password,sha1('rbk'));
		//$this->assertEquals($user->member_id,$member->id);
		
	}
	public function test_login() {

		$user = User::login(array('username'=>'ram','password'=>'ram'));
		$this->assertInstanceOf('user',$user);
	}

	public function test_login_username_exception() {

		$this->setExpectedException("UserInvalidException");
		$user = User::login(array('username'=>'aaa','password'=>'ram'));	
	}

	public function test_login_password_invalid_exception() {

		$this->setExpectedException("UserPasswordInvalidException");
		$user = User::login(array('username'=>'ram','password'=>'rbk'));	
	}
	public function test_username_exits_exception() {
		
		$user = new User();
		$this->setExpectedException("UserNameInvalidException");
		$user->username = 'ram';	
	}
}

