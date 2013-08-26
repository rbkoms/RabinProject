<?php 

class Dashboard extends SessionController {
	public function __construct() {

        parent::__construct();   
}

	
	public function index()
	{
		
		return $this->load_view('userf');

	}
    public function add()
    {
            
        if($_SERVER['REQUEST_METHOD'] !== 'POST') {
        
                $organization_enrollments= $this->member->organization->organization_enrollments;
                return $this->load_view('add_course',array("enrollments"=>$organization_enrollments));
            }
                
             try { 

                if(!array_key_exists('check_list', $_POST)) { 
                
                Enrollment::is_empty();
                
                } 

                foreach($_POST['check_list'] as $post)
                {
                     $data['courses']=Course::find_by_id($post);
                    $data['member']=$this->member;
                    $data['organization']= $this->member->organization->id;
                    $check = OrganizationEnrollment::find_valid_by_organization_id_and_course_id($data['organization'],$post);

                    //$find = Enrollment::get($data);   
                   $enrollment= Enrollment::create($data);
                 }
             }
                    
            catch(InvalidEnrollmentException $e)
                    {   
                        $organization_enrollments= $this->member->organization->organization_enrollments;
                        return $this->load_view('add_course',array("message"=>$e->getMessage(),"enrollments"=>$organization_enrollments));   
                    }                    
            
             catch(InactiveException $e)
                    {   
                        $organization_enrollments= $this->member->organization->organization_enrollments;
                        return $this->load_view('add_course',array("message"=>$e->getMessage(),"enrollments"=>$organization_enrollments));   
                    }       
               

             catch(CourseBlankException $e)
                    {
                        $organization_enrollments= $this->member->organization->organization_enrollments;
                        return $this->load_view('add_course',array("message"=>$e->getMessage(),"enrollments"=>$organization_enrollments));     
                    }
                  
            catch(CourseAlreadyEnrolled $e)
                {
                        $organization_enrollments= $this->member->organization->organization_enrollments;
                        return $this->load_view('add_course',array("message"=>$e->getMessage(),"enrollments"=>$organization_enrollments)); 
                    }




        
        $member=$this->member;
        $this->load_view('view',array('enrollments'=>$member->enrollments));
            
        }

   /* public function view_members($course_id) {  ..$member->enrollments 
        
         $course= Course::find_by_id($course_id);
      
           foreach ($course->enrollments as $enrollment)
             {
             echo $enrollment->member->first_name." ".$enrollment->member->last_name;
             }

        }
*/

     public function deactivate()
        {
            if($_SERVER['REQUEST_METHOD'] !== 'POST')
                {
                    $member=$this->member;
                    return $this->load_view('deactivate_courses',array("enrollments"=>$member->enrollments)); 
                }

                    try
                    {
                        if(!array_key_exists('check_list',$_POST))
                        {
                            Enrollment::is_empty();
                        }

                      
                    foreach($_POST['check_list'] as $post)
                         {
                        
                        $member_id = $this->member->id;
                        $enrollment = Enrollment::find_by_course_id_and_member_id_and_is_active($post,$member_id,TRUE);
                        $enrollment->deactivate();
                    
                        }
                     }


                    catch(DeleteException $e)
                    {   
                        $member= $this->member;
                        return $this->load->view('deactivate_courses',array(
                            "message"=>$e->getMessage(),
                            "enrollments"=>$member->enrollments
                            ));   
                    }

                   
                        
                    catch(CourseBlankException $e)
                    {   
                        $member= $this->member;
                        return $this->load->view('deactivate_courses',array(
                            "message"=>$e->getMessage(),
                            "enrollments"=>$member->enrollments
                            ));     
                    }

                    catch(CourseAlreadyDeactivated $e)
                    {   
                        $member=$this->member;
                        return $this->load_view('deactivate_courses',array("message"=>$e->getMessage(),"member"=>$this->member,"enrollments"=>$member->enrollments));   
                    }


                    $member=$this->member;
                    return $this->load_view('view',array("enrollments"=>$member->enrollments,"member"=>$this->member));

                    


                            
        }

            public function activate()
        {
            if($_SERVER['REQUEST_METHOD'] !== 'POST')
                {
                    $member=$this->member;
                    return $this->load_view('activate_courses',array("enrollments"=>$member->enrollments));
                }

                    try
                    {
                        if(!array_key_exists('check_list',$_POST))
                        {
                            Enrollment::is_empty();
                        }

                      
                    foreach($_POST['check_list'] as $post)
                    {
                        
                        $member_id = $this->member->id;
                        
                        
                        $enrollment = Enrollment::find_by_course_id_and_member_id_and_is_active($post,$member_id,FALSE);
                        $enrollment->activate();
                    
                    }
                    }

                    catch(DeleteException $e)
                    {
                        $member= $this->member;
                        return $this->load_view('activate_courses',array("message"=>$e->getMessage(),"member"=>$this->member,"enrollments"=>$member->enrollments));       
                    }

                    catch(InactiveException $e)
                    {
                        $member= $this->member;
                        return $this->load_view('activate_courses',array("message"=>$e->getMessage(),"member"=>$this->member,"enrollments"=>$member->enrollments));     
                    }
                        
                    catch(CourseBlankException $e)
                    {   
                        $member= $this->member;
                        return $this->load_view('activate_courses',array("message"=>$e->getMessage(),"member"=>$this->member,"enrollments"=>$member->enrollments));     
                    }

                    catch(CourseAlreadyDeactivated $e)
                    {   
                        $member=$this->member;
                        return $this->load_view('activate_courses',array("message"=>$e->getMessage(),"member"=>$this->member,"enrollments"=>$member->enrollments));   
                    }


                    $member=$this->member;
                    return $this->load_view('view',array("enrollments"=>$member->enrollments,"member"=>$this->member));

                    


                            
        }
             
            public function delete_course() {
            
            if($_SERVER['REQUEST_METHOD'] !== 'POST')
                {
                    $member=$this->member;
                    return $this->load_view('unroll_courses',array("enrollments"=>$member->enrollments,"member"=>$this->member));
                }

                    try
                    {
                        if(!array_key_exists('check_list',$_POST))
                        {
                            Enrollment::is_empty();
                        }

                      
                    foreach($_POST['check_list'] as $post)
                    {
                        
                        $member_id = $this->member->id;
                        
                        $enrollment = Enrollment::find_by_course_id_and_member_id_and_is_delete($post,$member_id,FALSE);
                        $enrollment->delete();
                    
                    }
                    }

                     
                        
                    catch(CourseBlankException $e)
                    {   
                        $member= $this->member;
                        return $this->load_view('deactivate_courses',array("message"=>$e->getMessage(),"member"=>$this->member,"enrollments"=>$member->enrollments));     
                    }

                    catch(CourseAlreadyactivated $e)
                    {   
                        $member=$this->member;
                        return $this->load_view('deactivate_courses',array("message"=>$e->getMessage(),"member"=>$this->member,"enrollments"=>$member->enrollments));   
                    }


                    $member=$this->member;
                    return $this->load_view('view',array("enrollments"=>$member->enrollments,"member"=>$this->member));

                            
        }






}


