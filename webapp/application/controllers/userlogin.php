<?php
class Userlogin extends NonSessionController {

	public function __construct() {

        parent::__construct();
    }

	public function index() {

        $this->check_session();
        

        if($_SERVER['REQUEST_METHOD'] !== 'POST') {

            return $this->load->view('userloginForm');
            
            }
        
		  $data['username'] = $_POST['username'];
		  $data['password'] = $_POST['password'];
	 
	     try
        {
            $user = User::login($data);
            //$user->member->check_is_valid();
          
        }
    
         catch(UserInvalidException $e)
            {
              return $this->load_view('userloginform', array(

         	'message' => $e->getMessage(),

            	));  	
         }

            catch(UserPasswordInvalidException $e)
         {
                return $this->load_view('userloginform', array(

        	'message' => $e->getMessage(),

    	)); 
    }
    //echo $user->member->id;

         $this->session->set_userdata(array(
         'member_id'=>$user->member->id,
        ));
         if(!$this->input->cookie('user_organization') || $user->member->organization->org_name != $this->input->cookie('user_organization')) {
            
                    $cookie = array(
                        'name'   => 'user_organization',
                        'value'  => $user->member->organization->org_name,
                        'expire' => '0',
                        );
                    $this->input->set_cookie($cookie);
                    $this->session->set_flashdata('in', 'Wish U A Great Time');
                }
                else {
                    $organization_name = $this->input->cookie('user_organization');
                    $this->session->set_flashdata('in',':)  we heartly welcome you to... '. $organization_name);
                }
                
                
                


     //$this->session->set_flashdata('in','you are in!!!');

     redirect('dashboard');

}


    public function logout() {

        $this->session->sess_destroy();
        redirect('../userlogin');
        }
}
