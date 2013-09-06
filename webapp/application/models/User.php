<?php
 include_once('Exceptions.php');
 class User extends ActiveRecord\Model {
    
    static $belongs_to = array(
        array(
        'member',
        'class_name'=>'Member',
        'foreign_key'=>'id',
        ));

    static $table_name ='users';
    static $primary_key = 'id';

	
    public function set_username($username)
    {

        if ($username=='') {
            
            throw new UserNameInvalidException("Username required");
        }

        if ($this->is_new_record())  {
            
            $bool = User::exists(array('conditions'=>array(

            'username'=>$username,
            
            )));
            
         if ($bool) {
            
            throw new UserNameInvalidException("Username already exist...");
            
        }
        }
        else
        {
            $bool = User::exists(array('conditions'=>array(

            'username = ? and id != ?',
            $username,
            $this->id,
            
            )));
            
         if ($bool) {
            
            throw new UserNameInvalidException("Username already exist");
            
        }
 
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

    	$user = new User();

        $user->username = ($parameters['username']);
        $user->password = ($parameters['password']);
        
        $user->save();
	
	   return $user;
   } 
   
}
