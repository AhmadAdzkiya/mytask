<?php defined('BASEPATH') or exit('No direct script access allowed');

use Firebase\JWT\JWT;
use Firebase\JWT\Key;


class Auth extends MY_Controller
{

	private $key;
	private $alg = 'HS256';
	private $exp_date_long;

	public function __construct()
	{
		parent::__construct();
		// $this->load->database();
		$this->load->library(array('form_validation', "email", "facebook"));
		$this->load->helper(array('html', 'language'));
		$this->config->load('upload_config');
		$this->form_validation->set_error_delimiters(
		$this->config->item('error_start_delimiter', 'ion_auth'), 
		$this->config->item('error_end_delimiter', 'ion_auth'));

		$this->load->config('ion_auth');

		$this->lang->load('auth');
		$this->load->model(array('Users_modal', 'Users_groups', 'common_model'));
		$this->tables = $this->config->item('tables', 'ion_auth');

		$this->load->module('template');


		$this->key = $this->config->item("encryption_key");
		$this->exp_date_long = $this->config->item("expiration_jwt");
		$this->uploadPaths = $this->config->item('path'); 

		


		// Include the google api php libraries
		include_once APPPATH . "libraries/google-api-php-client/Google_Client.php";
		include_once APPPATH . "libraries/google-api-php-client/contrib/Google_Oauth2Service.php";

		//Load user group for privallegs
		$this->ion_auth->get_user_group();

		// pr($this->session->all_userdata());
		// die();
	}



	public function uriRefreshToken(){
		$postData = json_decode(file_get_contents("php://input"));
		if($postData){

			$login = $this->ion_auth->loginSiswaFromMobile($postData->nisn, $postData->password,false);
			if ($login) {
				$siswa = $this->siswa_model->getListSiswa(["a.nisn" => $postData->nisn])[0];
				$user = $this->db->select("*")->from($this->tables['users'])->where("nisn = '".$postData->nisn."' ")->get()->result_object();
				$siswa->username = $user[0]->username;
				
				
				$issuedAt = time();
				// jwt valid for 60 days (60 seconds * 60 minutes * 24 hours * 60 days)
				$expirationTime = $issuedAt + 60 * 60 * 24 * $this->exp_date_long;


				$siswa->exp = $expirationTime;



				$jwt = JWT::encode((array)$siswa, $this->key, $this->alg);



				echo json_encode([
					"status" => true,
					"message" => "Berhasil login",
					"data" => $siswa,
					"key" => $jwt
					]);
			}else{
				echo json_encode([
					"status" => false,
					"message" => "Gagal login",
					"data" => null,
					"key" => null
					]);
			}
			
		}
	}

	
	// redirect if needed, otherwise display the user list
	public function index()
	{
		if (!$this->ion_auth->logged_in()) {
			// redirect them to the login page
			redirect('users/auth/login', 'refresh');
		} else {

			//Count all users
			$data['total_users'] = $this->Users_modal->count_users();

			// set the flash data error message if there is one
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//get all users
			//$data['all_users'] = $this->Users_modal->all_users();

			$data['today_users'] = $this->Users_modal->recent_users();

			$data['weekly'] = $this->Users_modal->weekly_data();

			//list the users
			// $data['users'] = $this->ion_auth->users()->result();
			// foreach ($data['users'] as $k => $user)
			// {
			// 	$data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			// }
			
			

			$user_group = $this->ion_auth->get_user_group();

			if(in_array($user_group,[2])){
				redirect(base_url()."dash");
				$data['page'] = "users/auth/index";
			
			}else{
				$data['page'] = "users/auth/index";
				$this->template->template_view($data);
			}
		}
	}

	// log the user in
	public function login()
	{
		if($this->ion_auth->logged_in()){
			$this->logout();
		}

		$data['title'] = $this->lang->line('login_heading');

		//validate form input
		$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

		if ($this->form_validation->run() == true) {
			$identity = $this->input->post('identity');
			$password = $this->input->post('password');

			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
				$check = $this->common_model->getAllData($this->tables['settings'], 'two_factor_auth');

				// checking if Two  Factor Authentication is Enable
				if ($check[0]->two_factor_auth == 1) {
					//if the login is successful
					//redirect them back to the home page
					$destry = array('identity', 'email', 'user_id', 'old_last_login', 'last_check');

					$this->session->unset_userdata($destry);

					$string = mt_rand(100000, 999999);

					$newdata = array(
						'new_email' => $identity,
						'pass'      => $password,
						'remember'  => $remember,
						'verification_code'  => $string,
					);

					$this->session->set_userdata($newdata);


					$Message = 'Hi Dear, <br> Your Verification code is: <br> <h3>' . $string . '</h3> <br><br> Thanks';

					$config = array(
						'mailtype' => 'html',
						'charset'  => 'utf-8',
						'wordwrap' => TRUE
					);

					$this->load->library('email', $config);

					$this->email->from($this->config->item('admin_email', 'ion_auth'), $this->config->item('site_title', 'ion_auth'));
					$this->email->to($identity);
					$this->email->subject('Verification');
					$this->email->message($Message);
					$send = $this->email->send();

					if ($send) {
						$msg = "Please Check Your Email to Verify your Account";
						$this->session->set_flashdata('success', $msg);
						redirect('users/Auth/authentication', 'refresh');
					} else {
						$msg = "Email Can not Send";
						$this->session->set_flashdata('error', $msg);
						redirect('users/auth/login', 'refresh');
					}
				} else {
					$this->session->set_flashdata('message', "erorr ". $this->ion_auth->messages());
					redirect('dash', 'refresh');
				}
			} else {
				// if the login was un-successful
				// redirect them back to the login page

				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('users/auth/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		} 
		else {
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['identity'] = array(
				'name' => 'identity',
				'id'    => 'identity',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$data['password'] = array(
				'name' => 'password',
				'id'   => 'password',
				'type' => 'password',
			);

			$data['reg_status'] = $this->common_model->select($this->tables['settings']);

			$this->load->config('social_auth_config');

			// Google Project API Credentials
			$clientId     = $this->config->item('google_client_id');
			$clientSecret = $this->config->item('google_secret_id');
			$redirectUrl  = $this->config->item('google_call_back');



			// Google Client Configuration
			$gClient = new Google_Client();
			$gClient->setClientId($clientId);
			$gClient->setClientSecret($clientSecret);
			$gClient->setRedirectUri($redirectUrl);
			$google_oauthV2 = new Google_Oauth2Service($gClient);

			if (isset($_REQUEST['code'])) {
				$gClient->authenticate();
				$this->session->set_userdata('token', $gClient->getAccessToken());
				redirect($redirectUrl);
			}

			//google login url
			$data['authUrl'] = $gClient->createAuthUrl();

			// facebook login URL
			$data['fbUrl'] =  $this->facebook->login_url();

			//passing linkedin credentials to view
			$data['client_id']     = $this->config->item('linkedin_client_id');
			$data['client_secret'] = $this->config->item('linkedin_client_secret');
			$data['redirect_uri']  = $this->config->item('linkedin_redirect_uri');
			$data['csrf_token']    = $this->config->item('linkedin_csrf_token');
			$data['scopes']        = $this->config->item('linkedin_scopes');


			$data['reg_email']     = $this->config->item('reg_status');

			// $this->session->set_flashdata('message','error saat login');

			// $this->session->set_flashdata('message', $this->ion_auth->messages());

			// $data['page'] = "users/auth/login";
			// 	$this->template->template_view($data);

			if(isset($_SERVER['HTTP_REFERER'])){
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->load->view('users/auth/login', $data);
			}
			// redirect();
			
		}
	}

	public function frmLoginMember(){
		$data['title'] = $this->lang->line('login_heading');
	
		//validate form input
		$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

		if ($this->form_validation->run() == true) {
			$identity = $this->input->post('identity');
			$password = $this->input->post('password');

			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool) $this->input->post('remember');

			

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
				$check = $this->common_model->getAllData($this->tables['settings'], 'two_factor_auth');

				// checking if Two  Factor Authentication is Enable
				if ($check[0]->two_factor_auth == 1) {
					//if the login is successful
					//redirect them back to the home page
					$destry = array('identity', 'email', 'user_id', 'old_last_login', 'last_check');

					$this->session->unset_userdata($destry);

					$string = mt_rand(100000, 999999);

					$newdata = array(
						'new_email' => $identity,
						'pass'      => $password,
						'remember'  => $remember,
						'verification_code'  => $string,
					);

					$this->session->set_userdata($newdata);


					$Message = 'Hi Dear, <br> Your Verification code is: <br> <h3>' . $string . '</h3> <br><br> Thanks';

					$config = array(
						'mailtype' => 'html',
						'charset'  => 'utf-8',
						'wordwrap' => TRUE
					);

					$this->load->library('email', $config);

					$this->email->from($this->config->item('admin_email', 'ion_auth'), $this->config->item('site_title', 'ion_auth'));
					$this->email->to($identity);
					$this->email->subject('Verification');
					$this->email->message($Message);
					$send = $this->email->send();

					if ($send) {
						$msg = "Please Check Your Email to Verify your Account";
						$this->session->set_flashdata('success', $msg);
						redirect('users/Auth/authentication', 'refresh');
					} else {
						$msg = "Email Can not Send";
						$this->session->set_flashdata('error', $msg);
						redirect('users/auth/loginMember', 'refresh');
					}
				} else {
					$this->session->set_flashdata('message', "erorr ". $this->ion_auth->messages());
					// redirect('users/auth/', 'refresh');
				}
			} else {
				// if the login was un-successful
				// redirect them back to the login page

				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('users/auth/loginMember', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		} 
		else {
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['identity'] = array(
				'name' => 'identity',
				'id'    => 'identity',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$data['password'] = array(
				'name' => 'password',
				'id'   => 'password',
				'type' => 'password',
			);

			$data['reg_status'] = $this->common_model->select($this->tables['settings']);

			$this->load->config('social_auth_config');

			// Google Project API Credentials
			$clientId     = $this->config->item('google_client_id');
			$clientSecret = $this->config->item('google_secret_id');
			$redirectUrl  = $this->config->item('google_call_back');



			// Google Client Configuration
			$gClient = new Google_Client();
			$gClient->setClientId($clientId);
			$gClient->setClientSecret($clientSecret);
			$gClient->setRedirectUri($redirectUrl);
			$google_oauthV2 = new Google_Oauth2Service($gClient);

			if (isset($_REQUEST['code'])) {
				$gClient->authenticate();
				$this->session->set_userdata('token', $gClient->getAccessToken());
				redirect($redirectUrl);
			}

			//google login url
			$data['authUrl'] = $gClient->createAuthUrl();

			// facebook login URL
			$data['fbUrl'] =  $this->facebook->login_url();

			//passing linkedin credentials to view
			$data['client_id']     = $this->config->item('linkedin_client_id');
			$data['client_secret'] = $this->config->item('linkedin_client_secret');
			$data['redirect_uri']  = $this->config->item('linkedin_redirect_uri');
			$data['csrf_token']    = $this->config->item('linkedin_csrf_token');
			$data['scopes']        = $this->config->item('linkedin_scopes');


			$data['reg_email']     = $this->config->item('reg_status');

			$this->session->set_flashdata('message', $this->ion_auth->messages());

			// $data['page'] = "users/auth/login";
			// 	$this->template->template_view($data);
			$this->load->view('users/auth/member_login', $data);
		} 
	}


	public function loginMember(){
		if($this->ion_auth->logged_in()){
			// print_r($this->ion_auth->get_users_groups()->result());
			$userlog =  $this->ion_auth->get_users_groups()->row();
			

			if ($userlog->name != 'members' && $userlog->id != 2 ) {
				// redirect them to the login page
				// redirect('users/auth', 'refresh');
				// echo "bukan members";
				$this->frmLoginMember();
				
			} 
			else {
	
				redirect('users/auth', 'refresh'); {
					// the user is not logging in so display the login page
					// set the flash data error message if there is one
					$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
	
					$data['identity'] = array(
						'name' => 'identity',
						'id'    => 'identity',
						'type'  => 'text',
						'value' => $this->form_validation->set_value('identity'),
					);
					$data['password'] = array(
						'name' => 'password',
						'id'   => 'password',
						'type' => 'password',
					);
	
					$data['reg_status'] = $this->common_model->select($this->tables['settings']);
	
					$this->load->config('social_auth_config');
	
					// Google Project API Credentials
					$clientId     = $this->config->item('google_client_id');
					$clientSecret = $this->config->item('google_secret_id');
					$redirectUrl  = $this->config->item('google_call_back');
	
	
	
					// Google Client Configuration
					$gClient = new Google_Client();
					$gClient->setClientId($clientId);
					$gClient->setClientSecret($clientSecret);
					$gClient->setRedirectUri($redirectUrl);
					$google_oauthV2 = new Google_Oauth2Service($gClient);
	
					if (isset($_REQUEST['code'])) {
						$gClient->authenticate();
						$this->session->set_userdata('token', $gClient->getAccessToken());
						redirect($redirectUrl);
					}
	
					//google login url
					$data['authUrl'] = $gClient->createAuthUrl();
	
					// facebook login URL
					$data['fbUrl'] =  $this->facebook->login_url();
	
					//passing linkedin credentials to view
					$data['client_id']     = $this->config->item('linkedin_client_id');
					$data['client_secret'] = $this->config->item('linkedin_client_secret');
					$data['redirect_uri']  = $this->config->item('linkedin_redirect_uri');
					$data['csrf_token']    = $this->config->item('linkedin_csrf_token');
					$data['scopes']        = $this->config->item('linkedin_scopes');
	
	
					$data['reg_email']     = $this->config->item('reg_status');
	
					$this->session->set_flashdata('message', $this->ion_auth->messages());
	
					// $data['page'] = "users/auth/login";
					// 	$this->template->template_view($data);
					$this->load->view('users/auth/member_login', $data);
				} 
			}
		}else{
			$this->frmLoginMember();
		}
	}
	/*
		Two Factor Authentication
	*/
	public function Authentication()
	{
		if ($this->input->post()) {
			// validate form input
			$this->form_validation->set_rules('code', 'Code', 'trim|required|numeric');

			if ($this->form_validation->run() === TRUE) {
				$code = $this->input->post('code');

				if ($code == $this->session->userdata('verification_code')) {
					if ($this->ion_auth->login($this->session->userdata('new_email'), $this->session->userdata('pass'), $this->session->userdata('remember'))) {
						$destry = array('new_email', 'pass', 'remember', 'verification_code');

						$this->session->unset_userdata($destry);

						$msg = "Your Verification Completed Successfully";
						$this->session->set_flashdata('success', $msg);
						redirect('users/auth/', 'refresh');
					}
				} else {
					$msg = "You have Enter wrong Code, Please Try Again";
					$this->session->set_flashdata('error', $msg);
					redirect('users/Auth/Authentication', 'refresh');
				}
			} else {
				$data['message'] = validation_errors();
				view('two_factor_auth');
			}
		} else {
			view("users/auth/two_factor_auth");
		}
	}

	// log the user out
	public function logout()
	{
		$data['title'] = "Logout";

		$group = $this->ion_auth->get_users_groups()->row();

		if(isset($group)){

		

			$this->session->unset_userdata('token');
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('token_secret');
			$this->session->unset_userdata('status');
			// $this->facebook->destroy_session();

			// log the user out
			$logout = $this->ion_auth->logout();

			// redirect them to the login page
			if($group->id == 2){
				redirect('users/auth/loginMember');
			}else{
				redirect('users/auth');
			}
		}
		else{
			redirect('users/auth/loginMember');
		}
		
	}

	// change password
	public function change_password()
	{
		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
		$this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

		if (!$this->ion_auth->logged_in()) {
			redirect('users/auth/login', 'refresh');
		}

		$user = $this->ion_auth->user()->row();


		if ($this->form_validation->run() == false) {
			// display the form
			// set the flash data error message if there is one
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');

			$data['old_password'] = array(
				'name'     => 'old',
				'id'       => 'old',
				'type'     => 'password',
				'class'    => 'form-control',
				'placeholder'    => 'Enter Old Password',
				'required' => 'required',
			);
			$data['new_password'] = array(
				'name'     => 'new',
				'id'       => 'new',
				'class'    => 'form-control',
				'type'     => 'password',
				'required' => 'required',
				'placeholder'    => 'Enter Password',
				'minlength' => 8,
				'pattern'  => '^.{' . $data['min_password_length'] . '}.*$',
			);
			$data['new_password_confirm'] = array(
				'name'    => 'new_confirm',
				'id'      => 'new_confirm',
				'class'   => 'form-control',
				'type'    => 'password',
				'required' => 'required',
				'placeholder'    => 'Confirm Password',
				'pattern' => '^.{' . $data['min_password_length'] . '}.*$',
			);
			$data['user_id'] = array(
				'name'  => 'user_id',
				'id'    => 'user_id',
				'type'  => 'hidden',
				'value' => $user->id,
			);

			// render
			$data['page'] = "users/auth/change_password";
			$this->template->template_view($data);
		} else {
			$identity = $this->session->userdata('identity');

			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change) {
				//if the password was successfully changed
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('users/auth/logout', 'refresh');
			} else {
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('users/Profile', 'refresh');
			}
		}
	}




	// forgot password
	public function forgot_password()
	{
		// setting validation rules by checking whether identity is username or email
		if ($this->config->item('identity', 'ion_auth') != 'email') {
			$this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
		} else {
			$this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
		}


		if ($this->form_validation->run() == false) {
			$data['type'] = $this->config->item('identity', 'ion_auth');
			// setup the input
			$data['identity'] = array(
				'name' => 'identity',
				'id'       => 'identity',
				'class'    => "form-control",
				'required' => "required"
			);

			if ($this->config->item('identity', 'ion_auth') != 'email') {
				$data['identity_label'] = $this->lang->line('forgot_password_identity_label');
			} else {
				$data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
			}

			// set any errors and display the form
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->_render_page('users/auth/forgot_password', $data);
		} else {
			$identity_column = $this->config->item('identity', 'ion_auth');
			$identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

			if (empty($identity)) {
				if ($this->config->item('identity', 'ion_auth') != 'email') {
					$this->ion_auth->set_error('forgot_password_identity_not_found');
				} else {
					$this->ion_auth->set_error('forgot_password_email_not_found');
				}
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("users/auth/forgot_password", 'refresh');
			}

			// run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

			// pr($forgotten);die;

			if ($forgotten) {
				// if there were no errors
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("users/auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
			} else {
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("users/auth/forgot_password", 'refresh');
			}
		}
	}

	// reset password - final step for forgotten password

	public function reset_passwords($code = NULL)
	{

		$user = $this->ion_auth->forgotten_password_check($code);
		echo $user;
	}


	public function reset_password($code = NULL)
	{
		if (!$code) {
			show_404();
		}

		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user) {
			// if the code is valid then display the password reset form

			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

			if ($this->form_validation->run() == false) {
				// display the form

				// set the flash data error message if there is one
				$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$data['new_password'] = array(
					'name'  	=> 'new',
					'id'    	=> 'new',
					'type'   	=> 'password',
					'class' 	=> "form-control",
					'minlength' => "8",
					'maxlength' => "20",
					'required'  => "required",
					'pattern'   => '^.{' . $data['min_password_length'] . '}.*$',
				);
				$data['new_password_confirm'] = array(
					'name'    => 'new_confirm',
					'id'      => 'new_confirm',
					'type'    => 'password',
					'class'   => "form-control",
					'required'  => "required",
					'pattern' => '^.{' . $data['min_password_length'] . '}.*$',
				);
				$data['user_id'] = array(
					'name'  => 'user_id',
					'id'    => 'user_id',
					'type'  => 'hidden',
					'value' => $user->id,
				);
				$data['csrf'] = $this->_get_csrf_nonce();
				$data['code'] = $code;

				// render
				$this->_render_page('auth/reset_password', $data);
			} else {
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id')) {

					// something fishy might be up
					$this->ion_auth->clear_forgotten_password_code($code);

					show_error($this->lang->line('error_csrf'));
				} else {
					// finally change the password
					$identity = $user->{$this->config->item('identity', 'ion_auth')};

					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

					if ($change) {
						// if the password was successfully changed
						$this->session->set_flashdata('message', $this->ion_auth->messages());
						redirect("auth/login", 'refresh');
					} else {
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('auth/reset_password/' . $code, 'refresh');
					}
				}
			}
		} else {
			// if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("users/auth/forgot_password", 'refresh');
		}
	}


	// activate the user
	public function activate($id, $code = false)
	{
		if ($code !== false) {
			$activation = $this->ion_auth->activate($id, $code);
		} else if ($this->ion_auth->is_admin()) {
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation) {
			// redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("auth", 'refresh');
		} else {
			// redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}

	// deactivate the user
	public function deactivate($id = NULL)
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
			// redirect them to the home page because they must be an administrator to view this
			// return show_error('You must be an administrator to view this page.');
			$msg = "You must be an administrator to view this page.";
			$this->session->set_flashdata('error', $msg);
			redirect('users', 'refresh');
		}

		if ($this->session->userdata('user_id') == $id) {
			$msg = "You Can not deactivate logged in user.";
			$this->session->set_flashdata('success', $msg);
			redirect('users', 'refresh');
		}

		$id = (int) $id;

		$this->load->library('form_validation');
		$this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');
		$this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');

		if ($this->form_validation->run() == FALSE) {
			// insert csrf check
			$data['csrf'] = $this->_get_csrf_nonce();
			$data['user'] = $this->ion_auth->user($id)->row();

			$data['page'] = 'users/auth/deactivate_user';
			$this->template->template_view($data);
			// $this->_render_page('dashboard', $data);
		} else {

			// do we really want to deactivate?
			if ($this->input->post('confirm') == 'yes') {
				// do we have a valid request?
				if ($id != $this->input->post('id')) {
					show_error($this->lang->line('error_csrf'));
				}

				// do we have the right userlevel?
				if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
					$this->ion_auth->deactivate($id);
				}
			}
			// redirect them back to the auth page
			$this->session->set_flashdata('success', $this->ion_auth->messages());
			redirect('users', 'refresh');
		}
	}

	// create a new user
	public function create_user()
	{
		$data['title'] = $this->lang->line('create_user_heading');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
			redirect('auth', 'refresh');
		}

		$tables = $this->config->item('tables', 'ion_auth');
		$identity_column = $this->config->item('identity', 'ion_auth');
		$this->data['identity_column'] = $identity_column;

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');
		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required');
		if ($identity_column !== 'email') {
			$this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_identity_label'), 'required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email');
		} else {
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
		}
		$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
		$this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'trim');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

		if ($this->form_validation->run() == true) {
			$email    = strtolower($this->input->post('email'));
			$identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
			$password = $this->input->post('password');

			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'company'    => $this->input->post('company'),
				'phone'      => $this->input->post('phone'),
			);
		}
		if ($this->form_validation->run() == true && $this->ion_auth->register($identity, $password, $email, $additional_data)) {
			// check to see if we are creating the user
			// redirect them back to the admin page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("auth", 'refresh');
		} else {
			// display the create user form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['first_name'] = array(
				'name'  => 'first_name',
				'id'    => 'first_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('first_name'),
			);
			$this->data['last_name'] = array(
				'name'  => 'last_name',
				'id'    => 'last_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('last_name'),
			);
			$this->data['identity'] = array(
				'name'  => 'identity',
				'id'    => 'identity',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['email'] = array(
				'name'  => 'email',
				'id'    => 'email',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('email'),
			);
			$this->data['company'] = array(
				'name'  => 'company',
				'id'    => 'company',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('company'),
			);
			$this->data['phone'] = array(
				'name'  => 'phone',
				'id'    => 'phone',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('phone'),
			);
			$this->data['password'] = array(
				'name'  => 'password',
				'id'    => 'password',
				'type'  => 'password',
				'value' => $this->form_validation->set_value('password'),
			);
			$this->data['password_confirm'] = array(
				'name'  => 'password_confirm',
				'id'    => 'password_confirm',
				'type'  => 'password',
				'value' => $this->form_validation->set_value('password_confirm'),
			);

			$this->_render_page('auth/create_user', $this->data);
		}
	}

	// edit a user
	public function edit_user($id)
	{
		$this->data['title'] = $this->lang->line('edit_user_heading');

		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id))) {
			redirect('auth', 'refresh');
		}

		$user = $this->ion_auth->user($id)->row();
		$groups = $this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result();

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required');
		$this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'required');

		if (isset($_POST) && !empty($_POST)) {
			// do we have a valid request?
			if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id')) {
				show_error($this->lang->line('error_csrf'));
			}

			// update the password if it was posted
			if ($this->input->post('password')) {
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
			}

			if ($this->form_validation->run() === TRUE) {
				$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name'  => $this->input->post('last_name'),
					'company'    => $this->input->post('company'),
					'phone'      => $this->input->post('phone'),
				);

				// update the password if it was posted
				if ($this->input->post('password')) {
					$data['password'] = $this->input->post('password');
				}



				// Only allow updating groups if user is admin
				if ($this->ion_auth->is_admin()) {
					//Update the groups user belongs to
					$groupData = $this->input->post('groups');

					if (isset($groupData) && !empty($groupData)) {

						$this->ion_auth->remove_from_group('', $id);

						foreach ($groupData as $grp) {
							$this->ion_auth->add_to_group($grp, $id);
						}
					}
				}

				// check to see if we are updating the user
				if ($this->ion_auth->update($user->id, $data)) {
					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					if ($this->ion_auth->is_admin()) {
						redirect('auth', 'refresh');
					} else {
						redirect('/', 'refresh');
					}
				} else {
					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->ion_auth->errors());
					if ($this->ion_auth->is_admin()) {
						redirect('auth', 'refresh');
					} else {
						redirect('/', 'refresh');
					}
				}
			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['currentGroups'] = $currentGroups;

		$this->data['first_name'] = array(
			'name'  => 'first_name',
			'id'    => 'first_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('first_name', $user->first_name),
		);
		$this->data['last_name'] = array(
			'name'  => 'last_name',
			'id'    => 'last_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('last_name', $user->last_name),
		);
		$this->data['username'] = array(
			'name'  => 'username',
			'id'    => 'username',
			'type'  => 'text',
			'class' => "form-control",
			'value' => $this->form_validation->set_value('last_name', $user->username),
		);
		$this->data['last_name'] = array(
			'name'  => 'last_name',
			'id'    => 'last_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('last_name', $user->last_name),
		);
		$this->data['company'] = array(
			'name'  => 'company',
			'id'    => 'company',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('company', $user->company),
		);
		$this->data['phone'] = array(
			'name'  => 'phone',
			'id'    => 'phone',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('phone', $user->phone),
		);
		$this->data['password'] = array(
			'name' => 'password',
			'id'   => 'password',
			'type' => 'password'
		);
		$this->data['password_confirm'] = array(
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
			'type' => 'password'
		);

		$this->_render_page('auth/edit_user', $this->data);
	}

	// create a new group
	public function create_group()
	{
		$this->data['title'] = $this->lang->line('create_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
			redirect('auth', 'refresh');
		}

		// validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'required|alpha_dash');

		if ($this->form_validation->run() == TRUE) {
			$new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'));
			if ($new_group_id) {
				// check to see if we are creating the group
				// redirect them back to the admin page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth", 'refresh');
			}
		} else {
			// display the create group form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['group_name'] = array(
				'name'  => 'group_name',
				'id'    => 'group_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('group_name'),
			);
			$this->data['description'] = array(
				'name'  => 'description',
				'id'    => 'description',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('description'),
			);

			$this->_render_page('auth/create_group', $this->data);
		}
	}

	// edit a group
	public function edit_group($id)
	{
		// bail if no group id given
		if (!$id || empty($id)) {
			redirect('auth', 'refresh');
		}

		$this->data['title'] = $this->lang->line('edit_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
			redirect('auth', 'refresh');
		}

		$group = $this->ion_auth->group($id)->row();

		// validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'required|alpha_dash');

		if (isset($_POST) && !empty($_POST)) {
			if ($this->form_validation->run() === TRUE) {
				$group_update = $this->ion_auth->update_group($id, $_POST['group_name'], $_POST['group_description']);

				if ($group_update) {
					$this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
				} else {
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				}
				redirect("auth", 'refresh');
			}
		}

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['group'] = $group;

		$readonly = $this->config->item('admin_group', 'ion_auth') === $group->name ? 'readonly' : '';

		$this->data['group_name'] = array(
			'name'    => 'group_name',
			'id'      => 'group_name',
			'type'    => 'text',
			'value'   => $this->form_validation->set_value('group_name', $group->name),
			$readonly => $readonly,
		);
		$this->data['group_description'] = array(
			'name'  => 'group_description',
			'id'    => 'group_description',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('group_description', $group->description),
		);

		$this->_render_page('auth/edit_group', $this->data);
	}

	public function login_usage()
	{
		$this->data['page'] = "auth/login_usage";
		$this->load->view('dashboard', $this->data);
	}

	public function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	public function _valid_csrf_nonce()
	{
		$csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
		if ($csrfkey && $csrfkey == $this->session->flashdata('csrfvalue')) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function _render_page($view, $data = null, $returnhtml = false) //I think this makes more sense
	{

		$this->viewdata = (empty($data)) ? $this->data : $data;

		$view_html = $this->load->view($view, $this->viewdata, $returnhtml);

		if ($returnhtml) return $view_html; //This will return html on 3rd argument being true
	}
}