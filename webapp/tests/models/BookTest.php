<?php
class BookTest extends CIUnit_TestCase {
	protected $tables = array(
		'books'=>'books',
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

	
	public function test_set_book_name() {

		$book = new Book();

		$book->book_name = 'Nepali';

		$this->assertEquals($book->book_name, 'Nepali');
	}

	public function test_set_book_name_exception() {

		$book = new Book();

		$this->setExpectedException('BookNameInvalidException');

		$book->book_name = '';
	}

	public function test_set_book_author() {

		$book = new Book();

		$book->book_author = 'Kiran Guragai';

		$this->assertEquals($book->book_author,'Kiran Guragai');
	}

	public function test_set_book_author_exception() {

		$book = new Book();

		$this->setExpectedException('BookAuthorInvalidException');

		$book->book_author = '';
	}
	public function test_set_book_edition() {

		$book = new Book();

		$book->book_edition = '1.0';

		$this->assertEquals($book->book_edition,'1.0');
	}

	public function test_set_book_edition_exception() {

		$book = new Book();

		$this->setExpectedException('BookEditionInvalidException');

		$book->book_edition = '';
	}

	public function test_create_book() {
		
			$book = Book::create(array(
			'book_name'=> 'a',
			'book_author'=>'b',
			'book_edition'=>'1.0',
			));
		$book->save();
		$this->assertEquals($book->book_name,'a');
		$this->assertEquals($book->book_author,'b');
		$this->assertEquals($book->book_edition,'1.0');
	}

}