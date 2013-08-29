<?php
include_once('Exceptions.php');
class Organization extends BaseModel {
	
	static $has_many = array(
		array(
        'members',
        'class_name'=>'Member',
        'foreign_key'=>'org_id',
        ),
        array(
        'organization_enrollments',
        'class_name'=>'OrganizationEnrollment',
        'foreign_key'=>'organization_id',
        ));

	 /*static $belongs_to = array(
        array(
            'course',
            'class_name'=>'Course',
            'foreign_key'=>'id',

            ));*/

    
	static $table_name = 'organizations';
	static $primary_key = 'id';


	private function count_members() {

		$count = count($this->members);
		return $count;

	}

	private function count_organization_enrollments() {

		$count = count($this->organization_enrollments);
		return $count;

	}
	public function count_members_org_enrollments() {

		$count_members = $this->count_members();
		$count_organization_enrollments = $this->count_organization_enrollments();
		$this->assign_attribute('count_members',$count_members);
		$this->assign_attribute('count_organization_enrollments',$count_organization_enrollments);
		$this->save();
		
	}


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
	
	public static function create($parameters) {

		$organization = new Organization();

		$organization->org_name = $parameters['org_name'];
		$organization->org_location = $parameters['org_location'];
		$organization->org_director = $parameters['org_director'];
		$organization->org_contact_no = $parameters['org_contact_no'];
		$organization->is_active = TRUE;
        $organization->is_delete = FALSE;
		$organization->save();
		

		
		return $organization;	
	}
	public function enroll_members($course) {

		$connection = Enrollment::connection();
		
		try{
			$connection->transaction();

			$members = $this->members;

			foreach($members as $member) {

			$enrollment = Enrollment::find_by_member_id_and_course_id_and_is_active($member->id,$course->id,TRUE);
				if($enrollment) {
					$enrollment->is_delete=TRUE;
				}

			$newenrollment = Enrollment::create(array(
				'members' => $member, 
				'courses' => $course,
				));
		}

			$connection->commit();


		} 
			catch(Exception $e) {

			$connection->rollback();
			throw $e;

		}
		
	}

}