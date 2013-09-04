<?php

class MemberBook extends BaseModel
{
	static $table_name = 'member_books';
    static $primary_key = 'id';
    static $belongs_to = array(
        array(
            'member',
            'class_name'=>'Member',
            'foreign_key'=>'member_id'),
        array(
            'organizationbook',
            'class_name'=>'OrganizationBook',
            'foreign_key'=>'book_id'),
    );
    public function set_member($member) {

    	if (!$member instanceof Member)  {

            throw new InvalidInstanceException("invalid organization type");
        }
        
        $this->assign_attribute ('member_id',$member->id);
    }


  	public function set_organization_book($organization_book) {

    	if (!$organization_book instanceof OrganizationBook)  {

            throw new InvalidInstanceException("invalid book type... :(");
        }
        
        $this->assign_attribute ('book_id',$organization_book->book_id);
    }
    public static function create($data) {
    	
        $member_book = new MemberBook();
    	$member_book->member = $data['member'];
    	$member_book->organization_book = $data['organization_books'];

    	if(self::get($data)) {
           
            throw new MemberBooksAlreadyExistsException("  Member Books is Already Exists");
            
        }
        $member_book->save();
        return $member_book;
    }
   
    public static function  get($data) {

        $member_id= $data['member']->id;
        $book_id= $data['organization_books']->book_id;
        $result= self::find_by_member_id_and_book_id($member_id,$book_id);
        
        if($result) { 

            return true;

        }
        if($data['organization_books']->available_quantity == 0) {
            
            throw new BooksUnavailableException("Books unavailable");
            
        }

        $data['organization_books']->available_quantity -=1;
        $data['organization_books']->used_quantity += 1;
        $data['organization_books']->save();
        return ;    
    }

    public function return_book() {

        $this->is_expired = TRUE;
        $book_id = $this->book_id;
        $organization_id = $this->member->organization->id;
        $organization_book = OrganizationBook::find_by_organization_id_and_book_id($organization_id,$book_id);
        $organization_book->available_quantity +=1;
        $organization_book->used_quantity -= 1;
        $organization_book->save();
        return;
    }
}