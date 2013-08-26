<?php

class  SessionController extends CI_Controller {

	public function __construct() {
    		
    	parent::__construct();
    	$this->member = null;

    	$member_id = $this->session->userdata('member_id');
    	if(!$member_id) {

    		$this->session->set_flashdata('error','login to go to dashboard');
        	redirect('userlogin');
    	}

         if(!$this->member = Member::find_by_id($member_id))
        {
        	$this->session->set_flashdata('error','no member');
        	redirect('userlogin');
        }
    }

    public function load_view($path, $data = array()) {

    	$data = (array)$data;

    	$data['member'] = $this->member;
    	$data['organization'] = $this->member->organization;
    	$data['member_enrollments'] = $this->member->enrollments;
    	$this->load->view($path, $data);
    }
}


class NonSessionController extends CI_Controller {

       public function __construct() {
            
        parent::__construct();
    }

    public function check_session() 
    {

        if ($this->session->userdata('member_id'))
        {
            $this->session->set_flashdata('error', 'You are logged in....Please LOGOUT ');
            redirect('dashboard');
        } 
    }



   public function load_view($path, $data = array()) {

            $data = (array)$data;

            $this->load->view($path,$data);
    }

}
        	
        	

        	
