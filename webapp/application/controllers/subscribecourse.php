<?php

    class SubscribeCourse extends CI_Controller
    {


        public function __construct()
        {
            // Call the Model constructor
         parent::__construct();

        }

        public function index()
        {   

                    

        } 

        public function add_org_enrollment($organization_id)
        {
         
            if($_SERVER['REQUEST_METHOD'] !== 'POST')
                {
                    $organization= Organization::find_by_id($organization_id);

                    $courses= Course::all();
                    return $this->load->view('subscribe_course',array("organization"=>$organization,"course"=>$courses)); 
                }
                

                try
                    {
                        if(!array_key_exists('check_list',$_POST))
                        {
                            OrganizationEnrollment::is_empty();
                        }

                      
                    foreach($_POST['check_list'] as $post)
                    {

                        $data['organization']= Organization::find_by_id($organization_id);
                        $data['course']=Course::find_by_id($post);
                        $find_existence = OrganizationEnrollment::get($data);
                        $enrollment= OrganizationEnrollment::create($data);                  
                        
                    
                    }
                    }

        catch(InvalidOrgEnrollmentException $e)
               {
            $organization=Organization::find_by_id($organization_id);
            $courses= Course::all();
            return $this->load->view('subscribe_course',array("message"=>$e->getMessage(),"organization"=>$organization,"course"=>$courses));
           }
           
        catch(BlankException $e)
               {
            $organization=Organization::find_by_id($organization_id);
            $courses= Course::all();
            return $this->load->view('subscribe_course',array("message"=>$e->getMessage(),"organization"=>$organization,"course"=>$courses));
           }
        catch(CourseEnrolled $e)
             {
            $courses= Course::all();
            $organization=Organization::find_by_id($organization_id);
            return $this->load->view('subscribe_course',array("message"=>$e->getMessage(),"organization"=>$organization,"course"=>$courses));
          }
                
                    
                    
                
                    


        }      
                            
        
    }


?>