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
            'organization_book',
            'class_name'=>'OrganizationBook',
            'foreign_key'=>'organization_book_id'),
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
        
        $this->assign_attribute ('organization_book_id',$organization_book->id);
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
        $oraganization_book_id= $data['organization_books']->id;
        $result= self::find_by_member_id_and_organization_book_id_and_is_expired($member_id,$oraganization_book_id,0);
        
        if($result) { 

            return true;

        }
       
        $data['organization_books']->book_issued_member();
       
        return ;    
    }

    public function return_book() {

        $this->is_expired = TRUE;
        
        $this->organization_book->book_return_member();
        
        return;
    }
}