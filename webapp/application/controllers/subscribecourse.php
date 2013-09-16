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
        public function count_members_org_enrollments($organization_id)
        {
            $organization = Organization::find_by_id($organization_id);
            $organization->count_members_org_enrollments();
        }

        public function add_org_enrollment($organization_id)
        {
         
            if($_SERVER['REQUEST_METHOD'] !== 'POST')
                {
                    $organization= Organization::find_by_id($organization_id);

                    $courses= Course::all();
                    return $this->load->view('subscribe_course',array("organization"=>$organization,"courses"=>$courses)); 
                }
                

                try
                    {
                        if(!array_key_exists('check_list',$_POST)) {
                            OrganizationEnrollment::is_empty();
                        }

                      
                    foreach($_POST['check_list'] as $post)
                    {

                        $data['organization']= Organization::find_by_id($organization_id);
                        $data['courses']=Course::find_by_id($post);
//                        $find_existence = OrganizationEnrollment::get($data);
                        $enrollment= OrganizationEnrollment::create($data);  
                        //$data['organization']->enroll_members($data['courses']);                
                        
                    
                    }
                    }
        
        catch (Exception $e) {

                echo "transaction unsuccessful";
            }

        catch(InvalidOrgEnrollmentException $e) {

            $organization=Organization::find_by_id($organization_id);
            $courses= Course::all();
            return $this->load->view('subscribe_course',array("message"=>$e->getMessage(),"organization"=>$organization,"courses"=>$courses));
           }
           
        catch(BlankException $e) {

            $organization=Organization::find_by_id($organization_id);
            $courses= Course::all();
            return $this->load->view('subscribe_course',array("message"=>$e->getMessage(),"organization"=>$organization,"courses"=>$courses));
           }
        catch(CourseEnrolled $e) {

            $courses= Course::all();
            $organization=Organization::find_by_id($organization_id);
            return $this->load->view('subscribe_course',array("message"=>$e->getMessage(),"organization"=>$organization,"courses"=>$courses));
          }
                
                    
                    
          }      
                            
        
    }
