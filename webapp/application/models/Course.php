<?php
include_once('Exceptions.php');
class Course extends BaseModel {
	static $table_name ='courses';

	static $primary_key = 'id';

	static $has_many = array(
		array(
        'enrollments',
        'class_name'=>'Enrollment',
        'foreign_key'=>'course_id'),
		array(
        'organization_enrollments',
        'class_name'=>'OrganizationEnrollment',
        'foreign_key'=>'course_id'),
   		);


		public function set_cname($cname) {
		
			if($cname=='') {
			
				throw new CNameInvalidException("name required");
			}		
		
		$this->assign_attribute('cname', $cname);
	}


	public function set_catagory($catagory) {
		
			if($catagory=='') {
			
				throw new CatagoryInvalidException("catagory required");
			}		
		
		$this->assign_attribute('catagory', $catagory);
	}

	public function set_duration($duration) {
		
			if($duration=='') {
			
				throw new DurationInvalidException("duration required");
			}		
		
		$this->assign_attribute('duration', $duration);
	}

	

	public function get_cname() {

		return $this->read_attribute('cname');
	}

	public function get_catagory() {

		return $this->read_attribute('catagory');
	}
	public function get_duration() {

		return $this->read_attribute('duration');
	}


	public static function create($parameters) {
		$course = new Course();

		$course->cname = $parameters['cname'];
		$course->catagory= $parameters['catagory'];
		$course->duration = $parameters['duration'];
		$course->save();

		return $course;
		}

	public function get_config_array() {
		
		$config['hostname'] = 'google.com';
        $config['username'] = 'a';
        $config['password'] = 'a';
        $config['port']     = 21;
        $config['passive']  = FALSE;
        $config['debug']    = TRUE;

        return $config;
		}

	public function course_upload($ftp,$config) {
        
        try
        {
            if($ftp->connect($config)==TRUE)
            {
               $bool= $ftp->upload('C:\Users\rabin\Documents\GitHub\RabinProject\webapp\system\Cupload\a.text','/www/uploads/myfolder/');             
               if($bool==TRUE)
               {
                $ftp->close();
                return TRUE;
               }
               else 
               {
                throw new Exception("Failed to Upload");
                
               }
            }

            else
            {
                throw new Exception("Failed to Connect");
            }
        }

        catch(Exception $e)
        {
            $ftp->close();
            return FALSE;
        }
 }
}