<?php
include_once('Exceptions.php');
class Book extends BaseModel {
	static $table_name ='books';

	static $primary_key = 'id';

	static $has_many = array(
		array(
		'organizations',
        'class_name'=>'Organization',
        'foreign_key'=>'org_id',),
        array(
        'organization_books',
        'class_name'=>'OrganizationBook',
        'foreign_key'=>'book_id',
        ),
        
   		);


		public function set_book_name($book_name) {
		
			if($book_name=='') {
			
				throw new BookNameInvalidException("name required");
			}		
		
		$this->assign_attribute('book_name', $book_name);
		}

		public function set_book_author($book_author) {
		
			if($book_author=='') {
			
				throw new BookAuthorInvalidException("name required");
			}		
		
		$this->assign_attribute('book_author', $book_author);
		
		}

		public function set_book_edition($book_edition) {
			
			if($book_edition=='') {
			
				throw new BookEditionInvalidException("name required");
			}		
		
		$this->assign_attribute('book_edition', $book_edition);
	}


	public function get_book_name() {

		return $this->read_attribute('book_name');
	}

	public function get_book_author() {

		return $this->read_attribute('book_author');
	}

	public function get_book_edition() {

		return $this->read_attribute('book_edition');
	}


	public static function create($parameters) {
		
		$book = new Book();

		$book->book_name = $parameters['book_name'];
		$book->book_author= $parameters['book_author'];
		$book->book_edition = $parameters['book_edition'];
		$book->save();

		return $book;
		}

}
