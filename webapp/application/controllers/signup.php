<?php

class Signup extends CI_Controller {

	public function __construct() {

        parent::__construct();
    	}

	public function index() {

		if($this->session->userdata('member_id'))
        {
            redirect('dashboard');
        }
			
		$organizations = Organization::finder();

		if($_SERVER['REQUEST_METHOD'] !== 'POST') {

			return $this->load->view('signupForm',array('organizations'=>$organizations));
		}
		
		$first_name = $this->input->post("first_name");
		$last_name = $this->input->post("last_name");
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$email = $this->input->post("email");
		$sex = $this->input->post("sex");
		$organization = Organization::find_by_id($this->input->post("organizations"));


		
		
		try{

			$member = Member::create(array(
				'first_name' => $first_name,
				'last_name' => $last_name,
				'username'  => $username,
				'password' =>$password,
				'email'  => $email,
				'sex'  => $sex,
				'organization' => $organization,
				));

			$this->session->set_userdata(array(

				'member_id'=>$member->id));


			redirect('dashboard/index/');
		}
			
		catch(FirstNameInvalidException $e)
			{
				return $this->load->view('signupForm', array('message'=>$e->getMessage(),'organizations'=>$organizations));
			}
		catch(LastNameInvalidException $e)
			{
				return $this->load->view('signupForm', array('message'=>$e->getMessage(),'organizations'=>$organizations));
			
			}
		catch(EmailInvalidException $e)
			{
				return $this->load->view('signupForm', array('message'=>$e->getMessage(),'organizations'=>$organizations));
			
			}
		catch(SexInvalidException $e)
			{
				return $this->load->view('signupForm', array('message'=>$e->getMessage(),'organizations'=>$organizations));
			
			}
			
		catch(UserNameInvalidException $e)
			{
				return $this->load->view('signupForm', array('message'=>$e->getMessage(),'organizations'=>$organizations));
			}

		catch(PasswordInvalidException $e)
			{
				return $this->load->view('signupForm', array('message'=>$e->getMessage(),'organizations'=>$organizations));
			}

	}
}