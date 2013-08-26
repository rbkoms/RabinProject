<?php

class Org_signup extends CI_Controller {

	public function __construct() {

        parent::__construct();
    	}
    
    function index() {

    	if($_SERVER['REQUEST_METHOD'] !== 'POST') {

			return $this->load->view('orgForm');
				}
    	
		
		$data['org_name']= $_POST['org_name'];
		$data['org_location']= $_POST['org_location'];
		$data['org_director']= $_POST['org_director'];
		$data['org_contact_no']= $_POST['org_contact_no'];
		

		
		try {

			$organization = Organization::create($data);
			}

		catch(OrgNameInvalidException $e)
			{
				return $this->load->view('orgForm', array('message'=>$e->getMessage()));
			}

		catch(OrgLocationInvalidException $e)
			{
				return $this->load->view('orgForm', array('message'=>$e->getMessage()));
			}
		catch(OrgDirectorInvalidException $e)
			{
				return $this->load->view('orgForm', array('message'=>$e->getMessage()));
			}
		catch(OrgContactnoInvalidException $e)
			{
				return $this->load->view('orgForm', array('message'=>$e->getMessage()));
			}	

		
		if(!$organization) {
			$this->session->set_flashdata('create_problem','org unseccess');
			
			redirect("org_signup");
		}
		$organizations = Organization::all();
		$courses= Course::all();
		
		return $this->load->view('orgdetails',array(
			
			'organizations'=> $organizations,
			'courses'=>$courses,
			'organization'=>$organization));
	}

	

	public function viewmembers($org_id) {

		$organizations = Organization::find_by_id($org_id);
		foreach($organizations->members as $member)
		{
		echo $member->first_name;
		echo "\n";
		echo $member->last_name;
		}
	
		}
}