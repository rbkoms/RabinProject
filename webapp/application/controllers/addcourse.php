<?php

class Addcourse extends CI_Controller {

	public function __construct() {

        parent::__construct();
    	}
    
    function index() {
    	foreach($_POST['check_list'] as $post)
                    {
                        $data['course_id']=Course::find_by_id($post);
                        $data['member_id']=$this->member;
                        $enrollment= Enrollment::create($data);
                    }
}
