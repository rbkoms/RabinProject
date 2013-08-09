<?php
class OrgNameInvalidException extends Exception{ }
class OrgLocationException extends Exception{ }
class OrgDirectorInvalidException extends Exception{ }
class OrgContactnoInvalidException extends Exception{ }

class Organization extends ActiveRecord\Model {
	
	static $has_many = array(
		array(
        'members',
        'class_name'=>'Member',
        'foreign_key'=>'org_id',
        ));
	static $table_name = 'organizations';
	static $primary_key = 'id';

	public function set_org_name($org_name) {
		
		if($org_name=='') 
		{
			throw new OrgNameInvalidException("name required");
		}	
		
		$this->assign_attribute('org_name', $org_name);
	}

	public function set_org_location($org_location) {
		
		if($org_location=='') 
		{
			throw new OrgLocationInvalidException("location required");
		}	
		$this->assign_attribute('org_location', $org_location);
	}

	public function set_org_director($org_director) {
		
		if($org_director=='') 
		{
			throw new OrgDirectorInvalidException("director required");
		}	
		
		$this->assign_attribute('org_director', $org_director);
	}

	public function set_org_contact_no($org_contact_no) {
		
		if($org_contact_no=='') 
		{
			throw new OrgContactnoInvalidException("contact no required");
		}	
			
 		
 		$this->assign_attribute('org_contact_no', $org_contact_no);	
	}

	public function finder() {
		$organizations = Organization::find('all');
		return $organizations;
	}
	/*public function get_org_name() {

		return $this->read_attribute('org_name');
	}

	public function get_org_location() {

		return $this->read_attribute('org_location');
		
	}

	public function get_org_director() {

		return $this->read_attribute('org_director');
	}

	public function get_org_contact_no() {

		return $this->read_attribute('org_contact_no');
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
	}*/

	public static function create($parameters) {

		$organization = new Organization();

		$organization->org_name = $parameters['org_name'];
		$organization->org_location = $parameters['org_location'];
		$organization->org_director = $parameters['org_director'];
		$organization->org_contact_no = $parameters['org_contact_no'];
		$organization->save();
		

		
		return $organization;	
	}
}
?>