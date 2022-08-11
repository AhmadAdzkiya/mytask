<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
Author Salman Iqbal
Created on 20/1/2017
Company Parexons
*/

class Register extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->helper(array('form','html'));
        $this->load->model('Register_model');
		$this->load->model('common_model');
        $this->load->library(array('form_validation'));
        $this->load->config('ion_auth');
        
        // initialize db tables data
		$this->tables = $this->config->item('tables', 'ion_auth');
	}

    /*
        * Load Sign up Page
    */
	public function index()
	{
        $this->load->view('auth/Sign_Up');      
	}

    /*
        * Sign up new user
    */
	public function sign_up()
	{
        //validate form
        $this->form_validation->set_rules('first_name', 'First name','trim|required');
        $this->form_validation->set_rules('last_name', 'Last name','trim|required');
        $this->form_validation->set_rules('username','Username','trim|required|is_unique[ '.$this->tables['users'].'.username]');
        $this->form_validation->set_rules('email','Email','trim|valid_email|required|is_unique[ '.$this->tables['users'].'.email]');
        $this->form_validation->set_rules('password','Password','trim|min_length[8]|max_length[20]|required');
        $this->form_validation->set_rules('confirm_password','Confirm password','trim|matches[password]|required');
        // $this->form_validation->set_rules('g-recaptcha-response', 'Captcha','required');

        // Re-populate the values after validation failed
        // $this->form_validation->set_value('first_name');
 
        if($this->form_validation->run() === FALSE)
        {
        	$msg = "Please Fill The Form Correctly <br> User name And E-Mail Must Be unique";
			$this->session->set_flashdata('error',$msg);
            redirect('users/Register');
        }
        else
        {
            if ($_POST['g-recaptcha-response'] == TRUE) 
            {
                $first_name = $this->input->post('first_name');
                $last_name  = $this->input->post('last_name');
                $username   = $this->input->post('username');
                $email      = $this->input->post('email');
                $password   = $this->input->post('password');

                $string = mt_rand(100000, 999999);
     
                $additional_data = array(
                    'first_name'        => $first_name,
                    'last_name'         => $last_name,
                    'oauth_provider'    => 'local',
                    'date'              => date('y-m-d'),
                    'verification_code' => $string  
                );

                $register = $this->ion_auth->register($username,$password,$email,$additional_data);

                if ($register)
                {
                    $msg = "Sign Up Successfully Now you can Login";
                    $this->session->set_flashdata('error',$msg);
                    redirect('/','refresh');
                }
                else
                {
                    $msg = "There is problem in your form filling please fill the form Correctly";
                    $this->session->set_flashdata('error',$msg);
                    redirect('users/Register','refresh');
                } 
            }
            else
            {
                $msg = "Captcha Verification is required";
                $this->session->set_flashdata('error',$msg);
                redirect('users/Register','refresh');
            }
        }
    }

    /* 
        * Check Duplicate Email
    */ 
    public function check_email()
    {
        $email = $this->input->post('myemail');

        $result = $this->Register_model->check_mail( $this->tables['users'],$email);

        if ($result) 
        {
        	echo "ok::";
        }
    }

    /*
        * Check Duplicate UserName
    */
    public function check_username()
    {
        $username = $this->input->post('u_name');

        $result = $this->Register_model->check_username( $this->tables['users'],$username);

        if ($result) 
        {
        	echo "ok::";
        }
    }
    /*
       * Activate a User
    */
    function verifycode()
    {
        if ($this->input->post()) 
        {
            // validate form input
            $this->form_validation->set_rules('code','Code' , 'trim|required|numeric');

            if ($this->form_validation->run() === TRUE)
            {
                $code = $this->input->post('code');

                $check = $this->common_model->getAllData( $this->tables['users'],'verification_code', array('verification_code' => $code));

                if (!empty($check[0]->verification_code)) 
                {
                    $data = array('active' => 1);

                    $where = array('verification_code' => $code);

                    $status_update = $this->common_model->UpdateDB($this->tables['users'],$where,$data);

                    if ($status_update) 
                    {
                        $msg = "Your Code Verified Successfully, Now you can Login";
                        $this->session->set_flashdata('success',$msg);
                        redirect('users/Auth','refresh');
                    }
                }
                else
                {
                    $msg = "You have Enter wrong Code, Please Try Again";
                    $this->session->set_flashdata('error',$msg);
                    redirect('users/Register/verifycode','refresh');
                }
            }   
            else
            {
                $data['message'] = validation_errors();
                view('verify_user');
            }
        } 
        else 
        {
            view('auth/verify_user');
        }
    }

    /**
     * [Send email for forgot password]
     * @return [void]
     */
    public function forgot_pass()
    {
        if ($this->input->post()) 
        {
            $get_user = $this->common_model->getAllData($this->tables['users'],'*',1,array('email' => $this->input->post('identity')));

            if (!empty($get_user)) 
            {
                $random = mt_rand(100000, 999999);

                $this->common_model->UpdateDB($this->tables['users'],array('id' => $get_user->id),array('forgotten_password_code' => $random));

                $name       = $this->config->item('site_title','ion_auth');
                $from_email = $this->config->item('admin_email','ion_auth');
                $to         = $get_user->email;
                $subject    = 'Forgot  Password';
                $msg        = 'Hi Dear, <br> Please Click the Below link to Update Your Password: <br> <h3>'.base_url('users/auth/reset_password/'.$random.'').'</h3> <br><br> Thanks';;

                $this->email->set_mailtype("html");
                    
                $config = array(
                                    'protocol' => 'sendmail',
                                    'mailtype' => 'html',
                                    'charset'  => 'utf-8',
                                    'wordwrap' => TRUE
                                );
                    
                $this->email->initialize($config);    
            
                $this->email->from($from_email, $name);
                $this->email->to($to);

                $this->email->subject($subject);
                $this->email->message($msg);


                $result = $this->email->send();

                if ($result) 
                {
                    $msg = "Please Check Your Email";
                    $this->session->set_flashdata('success',$msg);
                    redirect('users/register/forgot_pass','refresh');
                }
                else
                {
                    $msg = "Error! Can not Send Email";
                    $this->session->set_flashdata('error', $msg);
                    redirect('users/register/forgot_pass','refresh');
                }
            } 
            else 
            {
                $msg = 'This Email is not found in our Database Records';
                $this->session->set_flashdata('error', $msg);
                redirect('users/register/forgot_pass','refresh');
            }
            
        } 
        else 
        {
            $this->load->view('users/auth/forgot_password');
        }
    }

    public function demo()
    {
        $msg = "This functionality is disable in demo";
        $this->session->set_flashdata('error', $msg);
        redirect('users/auth/login', 'refresh');
    }
}

/* End of file Register.php */
/* Location: ./application/controllers/Register.php */