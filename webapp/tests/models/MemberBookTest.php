<?php
class MemberBookTest extends CIUnit_TestCase
{
	protected $tables = array(
			'member_books'=>'member_books',
			'books'=>'books',
			'organizations'=>'organizations',
			'members'=>'members',	
			'organization_books'=>'organization_books'
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

	public function test_set_member() {

		$member_id = $this->members_fixt['2']['id'];
		$member = Member::find_by_id($member_id);
		$member_book = new MemberBook();
		$member_book->member = $member;
		$this->assertEquals($member_book->member_id,$member->id);
	}
	public function test_set_member_blank_exception() {

		$member_book = new MemberBook();
		$this->setExpectedException("InvalidInstanceException");
		$member_book->member = '';
	}
	public function test_set_member_invalid_instance_exception() {

		$organization_id = $this->organizations_fixt['1']['id'];
		$organization = Organization::find_by_id($organization_id);
		$member_book = new MemberBook();
		$this->setExpectedException("InvalidInstanceException");
		$member_book->member = $organization;
	}
	
	public function test_set_organization_book() {

		$organization_book_id = $this->organization_books_fixt['4']['id'];
		$organization_book = OrganizationBook::find_by_id($organization_book_id);

		$member_id = $this->members_fixt['7']['id'];
		$member = Member::find_by_id($member_id);
		
		$member_book = new MemberBook();
		$member_book->organization_book = $organization_book;
		$this->assertEquals($member_book->book_id,$organization_book->book_id);
	}
	public function test_set_organization_book_exception() {

		$member_id= $this->members_fixt['1']['id'];
		$member = Member::find_by_id($member_id);
		
		$member_book= new MemberBook();
		$this->setExpectedException("InvalidInstanceException");
		$member_book->organization_book = $member;
		
	}
	public function test_set_organization_book_blank_exception() {

		$member_id = $this->members_fixt['2']['id'];
		$member = Member::find_by_id($member_id);
		$member_book= new MemberBook();
		$this->setExpectedException("InvalidInstanceException");
		$member_book->organization_book = '';
	}

	public function test_create() {

		$organization_book_id = $this->organization_books_fixt['7']['id'];
		$organization_book = OrganizationBook::find_by_id($organization_book_id);
		$used_quantity= $organization_book->used_quantity;
		$available_quantity = $organization_book->available_quantity;
		$member_id = $this->members_fixt['7']['id'];
		$member = Member::find_by_id($member_id);
		
		$member_book = MemberBook::create(array(
							'member'=>$member,
							'organization_books'=> $organization_book,
							));

		$organization_book->reload();
		$this->assertEquals($member_book->member_id,$member->id);
		$this->assertEquals($member_book->book_id,$organization_book->book_id);
		$this->assertEquals($organization_book->used_quantity,$used_quantity+1);
		$this->assertEquals($organization_book->available_quantity,$available_quantity-1);
	}
	
	public function test_create_books_unavailable_exception() {

		$organization_book_id = $this->organization_books_fixt['8']['id'];
		$organization_book = OrganizationBook::find_by_id($organization_book_id);
		$member_id = $this->members_fixt['9']['id'];
		$member = Member::find_by_id($member_id);
		
		$this->setExpectedException("BooksUnavailableException");
		
		$member_book = MemberBook::create(array(
							'member'=> $member,
							'organization_books'=> $organization_book,
							));
	}
	public function test_create_exception() {

		$member_id = $this->members_fixt['4']['id'];
		$member = Member::find_by_id($member_id);
		$organization_book_id = $this->organization_books_fixt['7']['id'];
		$organization_book = OrganizationBook::find_by_id($organization_book_id);

		$this->setExpectedException("MemberBooksAlreadyExistsException");
		
		$member_book = MemberBook::create(array(
							'member'=> $member,
							'organization_books'=> $organization_book,
							));
	}
	public function test_return_book() {

		$member_book_id= $this->member_books_fixt['4']['id'];
		$member_book= MemberBook::find_by_id($member_book_id);

		$organization_book_id = $this->organization_books_fixt['7']['id'];
		$organization_book = OrganizationBook::find_by_id($organization_book_id);

		$used_quantity=$organization_book->used_quantity;
		$available_quantity=$organization_book->available_quantity;
		
		$member_book->return_book();
		$organization_book->reload();
		$this->assertEquals($member_book->is_expired,1);
		$this->assertEquals($organization_book->available_quantity,$available_quantity+1);
		$this->assertEquals($organization_book->used_quantity,$used_quantity-1);
		
	}
}