<?php 
session_start();
class Dashboard extends CI_Controller {
	public function __construct() {

        parent::__construct();

        if(!$member_id = $this->session->userdata('member_id'))
        {
        	$this->session->set_flashdata('error','login to go to dashboard');
        	redirect('userlogin');
        }

        $this->member = Member::find_by_id($member_id);
         if(!$this->member)
        {
        	$this->session->set_flashdata('error','no member');
        	redirect('userlogin');
        }
		}

	
	public function index()
	{
		
		return $this->load->view('userf', array("member"=>$this->member));

	}

	}


