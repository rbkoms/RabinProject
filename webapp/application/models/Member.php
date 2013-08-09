<?php
class FirstNameInvalidException extends Exception{ }
class LastNameInvalidException extends Exception{ }
class EmailInvalidException extends Exception{ }
class SexInvalidException extends Exception{ }


class Member extends ActiveRecord\Model {
	static $table_name ='members';

	static $has_one = array(
		array(
        'user',
        'class_name'=>'User',
        'foreign_key'=>'member_id',
        ));

	static $belongs_to = array(
		array(
        'organization',
        'class_name'=>'Organization',
        'foreign_key'=>'org_id',
        ));

	public function set_first_name($first_name) {
		
			if($first_name=='') {
			
				throw new FirstNameInvalidException("FIRSTNAME required");
			}		
		
		$this->assign_attribute('first_name', $first_name);
	}

	public function set_last_name($last_name) {
		
			if($last_name=='') {
			
				throw new LastNameInvalidException("LASTNAME required");
			}	

		$this->assign_attribute('last_name', $last_name);
	}

	public function set_email($email) {
		
			if($email=='') {
				
				throw new EmailNameInvalidException("email required");
			}	
		
		$this->assign_attribute('email', $email);
	}

	public function set_sex($sex) {
		
			if($sex=='') {
				
				throw new SexNameInvalidException("sex required");
			}	

 		$this->assign_attribute('sex', $sex);	
	}

	public function set_organization($organization) { 

		$this->assign_attribute('org_id', $organization->id);	
	}

	public function get_first_name() {

		return $this->read_attribute('first_name');
	}

	public function get_last_name() {

		return $this->read_attribute('last_name');
	}

	public function get_full_name() {

		return $this->read_attribute('first_name'). " " . $this->read_attribute('last_name');
	}

	public function get_email() {

		return $this->read_attribute('email');
	}

	public function get_sex() {

		return $this->read_attribute('sex');
	}

	public function activate() {

		$this->is_active = 1;
		$this->save();

	}

	public function deactivate() {

		$this->is_active = 0;
		$this->save();	
	}

	public function delete() {

		$this->is_deleted = 1;
		$this->save();	
	}

	public function undelete() {

		$this->is_deleted = 0;
		$this->save();
	}

	public static function create($parameters) {

		$member = new Member();

		$member->first_name = $parameters['first_name'];
		$member->last_name= $parameters['last_name'];
		$member->email = $parameters['email'];
		$member->sex = $parameters['sex'];
		$member->organization =$parameters['organization'];
		//$member->save();
		
		$user = User::create(array(
			'username' => $parameters['username'],
			'password' => $parameters['password'],
			'member'=> $member,
		));

		$member->save();
		$user->member=$member;
		$user->save();

		return $member;	
	}
}