<?php

 class UserInvalidException extends Exception { }
 class UserPasswordInvalidException extends Exception { }
 class UserNameInvalidException extends Exception{ }
 class PasswordInvalidException extends Exception{ }

 class User extends ActiveRecord\Model {
    
    static $belongs_to = array(
        array(
        'member',
        'class_name'=>'Member',
        'foreign_key'=>'member_id',
        ));



    static $table_name ='users';
    static $primary_key = 'id';

	public function set_username($username) {

        if($username=='') {
            throw new UserNameInvalidException("username required");
        }   

        if(User::exists(array(
            'username' => $username,
            )))
        {
            throw new UserNameInvalidException("username is there");
        }

           $this->assign_attribute('username', $username);
	}

	public function set_password($password) {

        if($password=='') {
            throw new PasswordInvalidException("password required");
        }   

	   $this->assign_attribute('password', sha1($password));
		}

    public function set_member($member){

        $this->assign_attribute('member_id', $member->id);
    }

	public function get_username() {
		  return $this->read_attribute('username');
	} 
  
    public function get_password() {

    	   return $this->read_attribute('password');
    }
    

    public static function login($data) {
 
        $user = User::find(array(
            'conditions' => array(
                    'username' => $data['username'],
                ),
            ));

    
        if(!$user) {
            throw new UserInvalidException('Your UserName is invalid  :(');
        }
        
           if($user->password == sha1($data['password'])) {

                return $user;
           }

        throw new UserPasswordInvalidException("Your password is wrong :(");    
    }  

    public static function create($parameters) {

    	$user = new user();

        $user->username = ($parameters['username']);
        $user->password = ($parameters['password']);
        //$user->member = ($parameters['member']);
        $user->save();
	
	   return $user;
   } 
}
