 <?php
class OrganizationBookTest extends CIUnit_TestCase
{
	protected $tables = array(
		'organization_books'=>'organization_books',
		'organizations'=>'organizations',
		'books'=>'books',
		'members'=>'members',
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

	public function test_set_book() {
			
		$book_id = $this->books_fixt['1']['id'];
		$book = Book::find_by_id($book_id);
		$organization_book = new OrganizationBook();
		$organization_book->book = $book;
		
		$this->assertEquals($organization_book->book_id,$book->id);
	}
	
	public function test_set_book_blank_exception()	{
		
		$organization_book = new OrganizationBook();
		
		$this->setExpectedException('InvalidInstanceException');
		
		$organization_book->book ='';

	}
	public function test_set_book_exception()
	{
		$member_id= $this->members_fixt['1']['id'];
		$member = Member::find_by_id($member_id);
		$organization_book = new OrganizationBook();
		$this->setExpectedException("InvalidInstanceException");
		$organization_book->book = $member;

	}
	
	public function test_set_organization()	{
		
		$organization_id = $this->organizations_fixt['2']['id'];
		$organization = Organization::find_by_id($organization_id);
		
		
		$organization_book = new OrganizationBook();
		
		
		$organization_book->organization = $organization;
		$this->assertEquals($organization_book->organization_id,$organization->id);
	
	}

	/*public function test_set_invalid_organization_exception()	{
		
		$organization_id = $this->organizations_fixt['2']['id'];
		$organization = Organization::find_by_id($organization_id);
		
		
		$organization_book = new OrganizationBook();
		$this->setExpectedException("InvalidInstanceException");
		
		$organization_book->organization = $organization;

	}*/

	public function test_set_organization_blank_Exception() {
		
		$organization_book = new OrganizationBook();
		$this->setExpectedException("InvalidInstanceException");
		$organization_book->organization= '';
	}

	public function test_set_organization_invalidinstance_Exception() {

		$member_id = $this->members_fixt['5']['id'];
		$member = Member::find_by_id($member_id);
		$organization_book = new OrganizationBook();
		$this->setExpectedException("InvalidInstanceException");
		$organization_book->organization = $member;
	}



	public function test_set_quantity() {

		$organization_book = new OrganizationBook();

        $organization_book->quantity = 2;

		$this->assertEquals($organization_book->quantity,2);

	}
	/*public function test_set_used_quantity() {

		$organizationBook = new OrganizationBook();

        $organizationBook->used_quantity = 2;

		$this->assertEquals($organizationBook->used_quantity,2);

	}

	public function test_set_available_quantity() {

		$organizationBook = new OrganizationBook();

        $organizationBook->available_quantity = 2;

		$this->assertEquals($organizationBook->available_quantity,2);

	}*/

	public function test_set_quantity_exception() {

		$organization_book = new OrganizationBook();

		$this->setExpectedException('QuantityInvalidException');

		$organization_book->quantity= '';

	}

	public function test_set_less_than_used_quantity() {

		$organization_book = new OrganizationBook();

		$organization_book->quantity = 20;
		$organization_book->used_quantity =10;

		$this->setExpectedException("QuantityInvalidException");

		$organization_book->quantity = 5;
	}

	public function test_set_quantity_negative_exception() {

		$organization_book = new OrganizationBook();

		$this->setExpectedException('QuantityInvalidException');

		$organization_book->quantity= -1;
	}
	public function test_set_quantity_zero_exception() {

		$organization_book = new OrganizationBook();

		$this->setExpectedException('QuantityInvalidException');

		$organization_book->quantity= 0;
	}


	public function test_create() {
		
		$book_id = $this->books_fixt['1']['id'];
		$book = Book::find_by_id($book_id);

		$organization_id = $this->organizations_fixt['4']['id'];
		$organization = Organization::find_by_id($organization_id);
		
		
		
		
		$organization_book = OrganizationBook::create(array(
		 			'books'=>$book,
		 			'organization'=>$organization,
		 			'quantity'=>10,
			));


		$this->assertEquals($organization_book->book_id,$book->id);
		$this->assertEquals($organization_book->organization_id,$organization->id);
		$this->assertEquals($organization_book->quantity,10);
		$this->assertEquals($organization_book->available_quantity,10);
		$this->assertEquals($organization_book->used_quantity,0);
		
	}

	public function test_create_exception() {

		$book_id = $this->books_fixt['1']['id'];
		$book = Book::find_by_id($book_id);

		$organization_id = $this->organizations_fixt['2']['id'];
		$organization = Organization::find_by_id($organization_id);

		$this->setExpectedException('OrganizationBookExits');
		
		
		$organization_book = OrganizationBook::create(array(
		 			'books'=>$book,
		 			'organization'=>$organization,
		 			'quantity'=>10,
		 			'used_quantity'=>0,
		 			'available_quantity'=>10,
		 				 		
		 			));
		

	}
	public function test_book_issued_member() {

		$organization_book_id = $this->organization_books_fixt['1']['id'];
		$organization_book = OrganizationBook::find_by_id($organization_book_id);

		$quantity = $organization_book->quantity;
		$available_quantity = $organization_book->available_quantity;
		$used_quantity = $organization_book->used_quantity;
		
		$organization_book->book_issued_member();

		$this->assertEquals($organization_book->available_quantity , $available_quantity-1);
		$this->assertEquals($organization_book->used_quantity , $used_quantity+1);


	}

	public function test_book_issued_member_exception() {

		$organization_book_id = $this->organization_books_fixt['2']['id'];
		$organization_book = OrganizationBook::find_by_id($organization_book_id);

		$this->setExpectedException("BooksUnavailableException");
		$organization_book->book_issued_member();
	}

	public function test_book_returned_member() {

		$organization_book_id = $this->organization_books_fixt['1']['id'];
		$organization_book = OrganizationBook::find_by_id($organization_book_id);

		$quantity = $organization_book->quantity;
		$available_quantity = $organization_book->available_quantity;
		$used_quantity = $organization_book->used_quantity;

		$organization_book->book_return_member();

		$this->assertEquals($organization_book->available_quantity , $available_quantity+1);
		$this->assertEquals($organization_book->used_quantity , $used_quantity-1);

	}
	public function test_book_returned_member_exception() {

		$organization_book_id = $this->organization_books_fixt['3']['id'];
		$organization_book = OrganizationBook::find_by_id($organization_book_id);

		
		$this->setExpectedException("BooksUnavailableException");
		$organization_book->book_return_member();
	}
	
}
