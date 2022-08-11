<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_setup extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();

		//Do your magic here
		
		//Load template module for header and footer
		$this->load->module('template'); 

		//Load common model
   		$this->load->model('common_model'); 

   		//check if user logged in 
   		if (!$this->ion_auth->logged_in())
		{
		   redirect('users/auth', 'refresh');
		}
	}

	/*
		* Load Login page setup
	    *
	    * Two Factor Authentication 
		* Enable / Disable user registration
		* Enable / Disable Forgot Password
		* Enable / Disable Socail Logins
	*/
	public function index()
	{
		$data['reg_status'] = $this->common_model->select('settings');
		
		$data['page'] = "site_config/configuration/login_page_setup";
      	$this->template->template_view($data);
	}

	/*
		* Update User registration status 0/1
	*/
	public function reg_status($value='')
	{
	      $status = post('status');

	      $data = array('registration_status' => $status);

	      $user_id = $this->session->userdata('user_id');

	      $result = $this->common_model->update($user_id,$data,'settings');

	      if ($result) 
	      {
	        echo 'success';
	      } 
	      else {
	         echo '<div class="alert alert-danger">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                Error
	              </div>';
	      }
	      
	}

	/*
		* Update Socail Logins status 0/1
	*/
    public function social_login_status($value='')
    {
	    $status = post('status');

	    $data = array('socail_login_status' => $status);

	    $user_id = $this->session->userdata('user_id');

	    $result = $this->common_model->update($user_id,$data,'settings');

	    if ($result) 
	    {
	       echo 'success';
	    } 
	    else 
	    {
	        echo '<div class="alert alert-danger">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                Error
	              </div>';
	    }
	      
	}

	/*
		* Update Forgot Password Status 0/1
	*/	
	public function forgot_pass_status($value='')
	{
        $status = post('status');

        $data = array('forgot_pass_status' => $status);

        $user_id = $this->session->userdata('user_id');

        $result = $this->common_model->update($user_id,$data,'settings');

	    if ($result) 
	    {
	       echo 'success';
	    } 
      	else {
           echo 'failed';
        }
	      
	}

	/*
		* Update Two Factor Authenction status 0/1
	*/

	public function two_factor_auth($value='')
	{
        $status = post('status');

        $data = array('two_factor_auth' => $status);

        $user_id = $this->session->userdata('user_id');

        $result = $this->common_model->update($user_id,$data,'settings');

	    if ($result) 
	    {
	       echo 'success';
	    } 
      	else {
           echo 'failed';
        }
	      
	}

}

/* End of file Login.php */
/* Location: ./application/modules/site_config/controllers/Login.php */