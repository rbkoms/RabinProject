<?php
class Enrollment extends ActiveRecord\Model
{
    static $table_name = 'enrollment';
    static $primary_key = 'id';
    
    static $belongs_to = array(
        array(
            'members',
            'class_name'=>'Member',
            'foreign_key'=>'member_id',
            ),
        array(
            'courses',
            'class_name'=>'Course',
            'foreign_key'=>'course_id',
            )
    );
    public function set_course_id($course)
    {
        $this->assign_attribute('course_id',$course);
    }
    public function set_member_id($member)
	{
    	$this->assign_attribute('member_id',$member->id);
    }
    public static function create($data)
    {
    	$enrollment = new Enrollment();
    	$enrollment->course_id = $data['course_id'];
        $enrollment->member_id = $data['member_id'];
        $enrollment->save();
        return $enrollment;
    }
}
