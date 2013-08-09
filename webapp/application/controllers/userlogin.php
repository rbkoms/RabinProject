<?php
session_start();
class Userlogin extends CI_Controller {

	public function __construct() {

        parent::__construct();
    }

	public function index() {

        if($this->session->userdata('member_id'))
        {
            $this->session->set_flashdata('error','PLease logout to signup');
            redirect('dashboard');
        }

        if($_SERVER['REQUEST_METHOD'] !== 'POST') {

            return $this->load->view('userloginForm');
            
            }
        
		$data['username'] = $this->input->post("username");
		$data['password'] = $this->input->post("password");
	 
	 try
    {
        $user = User::login($data);

        //redirect('dashboard/index/'.$user->member->id);
    
    }
    
    catch(UserInvalidException $e)
    {
        return $this->load->view('userloginform', array(

        	'message' => $e->getMessage(),

        	));  	
    }

    catch(UserPasswordInvalidException $e)
    {
        return $this->load->view('userloginform', array(

        	'message' => $e->getMessage(),

       	)); 
    }
    //echo $user->member->id;

    $this->session->set_userdata(array(
        'member_id'=>$user->member->id,
    ));
    $this->session->set_flashdata('in','you are in dude');

    redirect('dashboard');

}


    public function logout() {

        $this->session->sess_destroy();
        redirect('../userlogin');
        }
}
