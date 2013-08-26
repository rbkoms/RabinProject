<?php
include_once('Exceptions.php');
class OrganizationEnrollment extends BaseModel
{

    static $table_name = 'organization_enrollments';
    static $primary_key = 'id';

    static $belongs_to = array(
        array(
            'organizations',
            'class_name'=>'Organization',
            'foreign_key'=>'organization_id'),
        array(
            'courses',
            'class_name'=>'Course',
            'foreign_key'=>'course_id')
    );

    public function set_course($course)
    {       
        $this->assign_attribute('course_id',$course->id);
    }

    public function set_organization($organization)
    {
        $this->assign_attribute('organization_id',$organization->id);
    }
    

    public static function create($data)
    {
        $enrollment = new OrganizationEnrollment();
        $enrollment->course = $data['course'];
        $enrollment->organization= $data['organization']; 

        self::get($data);

        $enrollment->is_active=1;
        $enrollment->is_delete=0;
        $enrollment->save();
        return $enrollment;
    }

    public static function courses_subscribed($organization)
    {
        $org_id= $organization->id;
        $courses=self::find('all',array('conditions'=>array('organization_id=?',$org_id)));
        return $courses;
    }

    public static function  get($data)
    {
        $organization_id=$data['organization']->id;
        $course_id= $data['course']->id;
        $result= self::find(array('conditions'=> array('course_id=? AND organization_id=?',$course_id,$organization_id)));
        
        if($result && $result->is_active==TRUE)
        {
            throw new CourseEnrolled("you are currently enrolled to the course!!!");
        }
         
        return;
    }

    public static function is_empty()
    {
       throw new BlankException("Select the course first!!!"); 
    }
}