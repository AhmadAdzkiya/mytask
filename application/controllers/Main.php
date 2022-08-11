<?php defined('BASEPATH') or exit('No direct script access allowed');

class Main extends MY_Controller
{


	public function __construct()
	{
		parent::__construct();
		// $this->load->database();
		$this->load->library(array('form_validation', "email", "facebook"));
		$this->load->helper(array('html', 'language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->load->config('ion_auth');

		$this->lang->load('auth');
		$this->load->model(array('Users_modal', 'Users_groups', 'common_model'));

		$this->load->module('template');

		// Include the google api php libraries
		include_once APPPATH . "libraries/google-api-php-client/Google_Client.php";
		include_once APPPATH . "libraries/google-api-php-client/contrib/Google_Oauth2Service.php";

		//Load user group for privallegs
		$this->ion_auth->get_user_group();

		// pr($this->session->all_userdata());
		// die();
	}
	
    public function () 
	{
		
		$this->template->set_template('template/front/');
				
		$this->template->title = 'Ok';
		$this->data['menu'] = 'home';
		
		$this->template->description = '';		
		$this->template->meta->add('keyword', '');
		
		$this->template->content->view('v_home', $this->data);
		$this->template->publish();		
    }	
}