<?php
include_once('Exceptions.php');
class OrganizationBook extends BaseModel {
	static $table_name ='organization_books';

	static $primary_key = 'id';

	 static $belongs_to = array(
        array(
            'organization',
            'class_name'=>'Organization',
            'foreign_key'=>'organization_id'),
        array(
            'books',
            'class_name'=>'Book',
            'foreign_key'=>'book_id')
    );


	public function set_book($book) { 

        if(!$book instanceof Book) {

            throw new InvalidInstanceException("book required");
        }    

        //$book->check_is_valid();

        $this->assign_attribute('book_id',$book->id);
    }

    public function set_organization($organization) {

       
         if(!$organization instanceof Organization) {

            throw new InvalidInstanceException("org required");
        } 
        $organization->check_is_valid();   

     $this->assign_attribute('organization_id',$organization->id);
    }

    public function set_quantity($quantity) {

        if($quantity==='' || $quantity <=0 || $quantity < $this->used_quantity) {

    	throw new QuantityInvalidException("Quantity Invalid");

        }

    $this->assign_attribute('quantity',$quantity);

    }

    public function set_used_quantity($quantity) {

        if($quantity === '' || $quantity <0 || $quantity > $this->quantity ) { 

            throw new QuantityInvalidException("invalid quantity");
        }

        $this->assign_attribute('used_quantity',$quantity);
        }

    public function set_available_quantity($quantity) {


         if($quantity === '' || $quantity <0 ) { 

                throw new QuantityInvalidException(" invalid quantity");
        }

        $this->assign_attribute('available_quantity',$quantity);
        
        }

    public function book_issued_member() {

        if($this->available_quantity == 0) {

           throw new BooksUnavailableException(" invalid quantity"); 
        }

        $this->used_quantity += 1;
        $this->available_quantity -= 1;
        $this->save();
    }

    public function book_return_member() {

        if($this->used_quantity == 0) {

           throw new BooksUnavailableException(" invalid returning (transaction)"); 
        }

        $this->used_quantity -= 1;
        $this->available_quantity += 1;
        $this->save();

    	
    }
    

    public static function create($data) {
        s
        $organization_book = new OrganizationBook();
        $organization_book->book = $data['books'];
        $organization_book->organization= $data['organization'];
         if(!self::get($data)) {
            throw new OrganizationBookExits("organization book already exits");
        } 
        $organization_book->quantity = $data['quantity'];
        $organization_book->used_quantity = 0;
        $organization_book->available_quantity = $data['quantity'];
        

        /*self::get($data);*/
        
        $organization_book->save();
        return $organization_book;
    }
    public static function get($data) {

        $book_id= $data['books']->id;
        $organization_id= $data['organization']->id;
        $result= self::find_by_book_id_and_organization_id($book_id,$organization_id);

        
        if($result)
            {
            
            return false;
            }

            return true;

    }

    public static function is_empty() {
       
       throw new CourseBlankException("Select the book first!!"); 
    }
       
}

	