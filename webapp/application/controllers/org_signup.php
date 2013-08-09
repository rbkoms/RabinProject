<?php

class Org_signup extends CI_Controller {

	public function __construct() {

        parent::__construct();
    	}
    
    function index() {

    	if($_SERVER['REQUEST_METHOD'] !== 'POST') {

			return $this->load->view('orgForm');
				}
    	
		
		$org_name = $this->input->post("org_name");
		$org_location = $this->input->post("org_location");
		$org_director = $this->input->post("org_director");
		$org_contact_no = $this->input->post("org_contact_no");

		
		try{

			$organization = Organization::create(array(
				'org_name' => $org_name,
				'org_location' => $org_location,
				'org_director'  => $org_director,
				'org_contact_no' =>$org_contact_no,
				));
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


		if(!$organization)
		{
			$this->session->set_flashdata('create_problem','org unseccess');
			
			redirect("org_signup");
		}
		$organizations = Organization::all();
		
		return $this->load->view('orgdetails',array(
			
			'organizations'=> $organizations));
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