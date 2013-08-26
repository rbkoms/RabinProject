<?php

class Signup extends NonSessionController {

	public function __construct() {

        parent::__construct();
    	}

	public function index() {

		$this->check_session();
		$organizations = Organization::finder();

		if($_SERVER['REQUEST_METHOD'] !== 'POST') {
			/*$str= Member::echo_table_name();
			echo $str;*/

			return $this->load->view('signupForm',array('organizations'=>$organizations));
		}
		
		$data['first_name'] = $_POST['first_name'];
		$data['last_name'] = $_POST['last_name'];
		$data['username'] = $_POST['username'];
		$data['password'] = $_POST['password'];
		$data['email'] = $_POST['email'];
		$data['sex'] = $_POST['sex'];
		$organization = Organization::find_by_id($_POST['organization_id']);
		$data['organization']= $organization;

		try{

			$member = Member::create($data);
			$user = User::create($data);
				
		}
			
		catch(FirstNameInvalidException $e)
			{
				return $this->load_view('signupForm', array(
					'message'=>$e->getMessage(),
					'organizations'=>$organizations));
			}
		catch(LastNameInvalidException $e)
			{
				return $this->load_view('signupForm', array(
					'message'=>$e->getMessage(),
					'organizations'=>$organizations));
			
			}
		catch(EmailInvalidException $e)
			{
				return $this->load_view('signupForm', array(
					'message'=>$e->getMessage(),
					'organizations'=>$organizations));
			
			}
		
		catch(OrganizationInvalidException $e)
			{
				return $this->load_view('signupForm', array(
					'message'=>$e->getMessage(),
					'organizations'=>$organizations));
			
			}
		catch(SexInvalidException $e)
			{
				return $this->load_view('signupForm', array(
					'message'=>$e->getMessage(),
					'organizations'=>$organizations));
			
			}
			
		catch(UserNameInvalidException $e)
			{
				return $this->load_view('signupForm', array(
					'message'=>$e->getMessage(),
					'organizations'=>$organizations));
			}

		catch(PasswordInvalidException $e)
			{
				return $this->load_view('signupForm', array(
					'message'=>$e->getMessage(),
					'organizations'=>$organizations));
			}
		catch(InvalidOrganizationException $e)
			{
				return $this->load_view('signupForm', array(
					'message'=>$e->getMessage(),
					'organizations'=>$organizations));
			}
		

	}
}