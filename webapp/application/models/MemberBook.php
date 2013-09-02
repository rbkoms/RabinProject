<?php
include_once('Exceptions.php');
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
            'book',
            'class_name'=>'Book',
            'foreign_key'=>'book_id'),
    );
    public function set_member($member)
    {
    	if (!$member instanceof Member) 
        {
            throw new InvalidInstanceException("invalid organization type");
        }
        $member->check_is_valid();
        
        $this->assign_attribute ('member_id',$member->id);
    }
  	public function set_book($book)
    {
    	if (!$book instanceof Book) 
        {
            throw new InvalidInstanceException("invalid book type");
        }
        $this->assign_attribute ('book_id',$book->id);
    }
    public static function create($data)
    {
    	$member_book = new Member_Books();
    	$member_book->member = $data['member'];
    	$member_book->book = $data['books'];
    	
    	if(!self::get($data))
        {
            throw new Member_BooksAlreadyExistsException("Member_Books Already Exists");
            
        }
        self::check_organization_subscription($data);
        $member_book->save();
        return $member_book;
    }
    public static function check_organization_subscription($data)
    {
    	$result = Organization_Books::find_by_organization_id_and_book_id($data['member']->organization->id,$data['book']->id);
    	if(!$result || $result->available_quantity==0)
    	{
    		throw new BooksUnavailableException("BooksUnavailableException");
    		
    	}
    	$result->available_quantity -=1;
    	$result->used_quantity += 1;
    	$result->save();
    	return;
    }
    public static function  get($data)
    {
        $member_id= $data['member']->id;
        $book_id= $data['books']->id;
        $result= self::find_by_member_id_and_book_id($member_id,$book_id);
        
        if($result)
        {     
            return false;
        }
        return true;    
    }
}