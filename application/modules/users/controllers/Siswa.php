<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
Author Salman Iqbal
Company Parexons
Date 26/1/2016
*/

class Siswa extends MY_Controller
{

    public $table = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->lang->load('auth');
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->load->module('template');
        $this->load->module('bwidevtemplate');

        // initialize db tables data
		$this->tables = $this->config->item('tables', 'ion_auth');

        $this->load->helper(array('html', 'language', 'form', 'country_helper'));
        $this->load->model(array('Users_modal', 'common_model'));

       
    }

    public function index()
    {
        // set the flash data error message if there is one
        $data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

        // list the users
        $data['users'] = $this->ion_auth->users()->result();
        foreach ($data['users'] as $k => $user) {
            $data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
        }

        $this->session->set_flashdata('message', $this->ion_auth->messages());

        $data['page'] = "users/users/view_users";
        $this->template->template_view($data);
    }

    

    public function createMember()
    {
        $tables = $this->config->item('tables', 'ion_auth');
        $identity_column = $this->config->item('identity', 'ion_auth');

        $data['top1'] = "dprd/v_top_prioritas";
		$data['page_title'] = "Pendaftaran aspirator DPRD Banyuwangi";
		$data['page_wallpaper'] = ""; 
		$data['page_sub_title'] = "Pendaftaran Aspirator DPRD Banyuwangi";
		$data['page'] = "dprd/v_kontainer";
		$data['pageContent'] = "users/aspirator/create_user_member_json";
		$data['pageLink'] = 'propemperda';
		$data['pageMenu'] = [];
		$data['data']['groups'] = $this->ion_auth->group(2)->result();
		$data['data']['identity_column'] = $identity_column;

		$this->bwidevtemplate->template_front($data);
    }

    // create a new user
    public function add_user_json()
    {
        $this->form_validation->set_rules('first_name', 'First name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last name', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique['.$this->tables['users'].'.username]');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
        $this->form_validation->set_rules('company', 'Company', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone No', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|max_length[20]|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm password', 'trim|matches[password]|required');
        $this->form_validation->set_rules('group', 'Group', 'trim|required');

        if ($this->form_validation->run() === FALSE) {
            $msg = "Periksa kembali data nama pengguna, email atau data lainnya, mungkin email yang Anda telah digunakan sebelumnya, Trimakasih";
            // $this->session->set_flashdata('error', $msg);
            echo json_encode([
                "success" => false,
                "status" => false,
                "message" => $msg,
                "data" => $msg
                ]);
                exit();

            // redirect('users/Users/create_user');
        } else {
            $first_name = $this->input->post('first_name');
            $last_name  = $this->input->post('last_name');
            $username   = $this->input->post('username');
            $email      = $this->input->post('email');
            $company    = $this->input->post('company');
            $phone      = $this->input->post('phone');
            $password   = $this->input->post('password');
            $gp         = $this->input->post('group');

            $group = array($gp);

            $additional_data = array(
                'first_name' => $first_name,
                'last_name'  => $last_name,
                'date'       => date('y-m-d'),
                'company'    => $company,
                'phone'      => $phone
            );

            // echo json_encode([
            //     "success" => true,
            //     "status" => true,
            //     "message" => $this->ion_auth->messages(),
            //     "data" => $additional_data
            //     ]);


            // exit();
                // $success = $this->ion_auth->register($username, $password, $email, $additional_data, $group);
            if ($this->ion_auth->register($username, $password, $email, $additional_data, $group)) {

                $user = $this->Users_modal->findBy(["a.email"=>$email]);

                $user = $user[0];
                $d = rand(100,9999)."/".$user->id."/".rand(100,9999);
                $bs64 = base64_encode($d);

                // $headers = "Reply-To: DPRD Banyuwangi <dprdbanyuwangi01@gmail.com>\r\n";
                $headers = "Return-Path: DPRD Banyuwangi <dprdbanyuwangi01@gmail.com>\r\n";
                $headers .= "From: DPRD Banyuwangi <dprdbanyuwangi01@gmail.com>\r\n"; 
                $headers .= "Organization: DPRD Banyuwangi\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
                $headers .= "X-Priority: 3\r\n";
                $headers .= "X-Mailer: PHP". phpversion() ."\r\n";

                
                // $headers = "From: dprdbanyuwangi01@gmail.com\r\n";
            
                $subject = "DPRD Banyuwangi - Verifikasi Akun";
                $message = "
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Verifikasi Akun</title>
                </head>
                <body>
                <div style='text-align:center'><img style='width:90px; height:95px;' src='https://dprd.banyuwangikab.go.id/v2/public/b-asset/img/dprd_logo.png'></div>
                <div style='background-color:#f7f7f7; width:100%; padding:1rem'>
                <h1>Selamat datang di DPRD Banyuwangi</h1>
                <h2>Verifikasi Akun</h2>
                Hai $user->first_name $user->last_name, Apakah anda melihat angka dibawah ini? <br>
                <span style='font-size:2rem; font-weight:bolder; padding:2rem; color:black'> ".rand(100,9999)."</span> <br>
                <table border='0' cellpadding='5px' >
                <tr>
                <td align:'center' valign='middle' style='font-size:16px; font-weight:bold; letter-spacing:.5px; line-height:150%; padding:15px 30px; 30px; '>
                <a style='padding:0.5rem; background-color:#e8e8e8; font-weight:bold; color:#4d4d4d; border:1px solid #d6d6d6; border-radius:5px; text-decoration:none;' 
                href='".base_url()."users/aspirator/vrf/".rtrim($bs64,"==")."'>Ya, Saya melihatnya</a>
                </td>
                </tr>
                </table>
                </div>
                
                
                    
                </body>
                </html>";
        
                $to = $email;

                $this->sendEmailVerify($email,$subject,$headers,$message);

                echo json_encode([
                    "success" => true,
                    "status" => true,
                    "message" => $this->ion_auth->messages(),
                    "data" => $additional_data
                    ]);

                // $this->session->set_flashdata('success', $this->ion_auth->messages());
                // redirect('users/Users', 'refresh');
            } else {
                echo json_encode([
                    "success" => false,
                    "status" => false,
                    "message" => $this->ion_auth->messages(),
                    "data" => $additional_data
                    ]);

                // $this->session->set_flashdata('error', $this->ion_auth->errors());
                // redirect('users/Users/create_user', 'refresh');
            }
        }
    }

    public function vrf($base64){
        $d = explode("/",base64_decode($base64."=="));
        $data['top1'] = "dprd/v_top_prioritas";
        $data['page_title'] = "Verifikasi email aspirator DPRD Banyuwangi";
        $data['page_wallpaper'] = ""; 
        $data['page_sub_title'] = "Verifikasi Aspirator DPRD Banyuwangi";
        $data['page'] = "dprd/v_kontainer";
        $data['data'] = "";


        if(count($d)>1){
            $id = $d[1];
        
            $user = $this->Users_modal->findBy(["a.id"=>$id]);
            
            if(count($user)>0){
                $user = $user[0];
                if($this->Users_modal->update(["verification_email"=>'1'],$id)){

                    
                    $data['pageContent'] = "users/aspirator/v_verifikasi_berhasil";
                    $data['pageLink'] = 'propemperda';
                    $data['pageMenu'] = [];
                }else{
                    $data['pageContent'] = "users/aspirator/v_verifikasi_gagal";
                    $data['pageLink'] = 'propemperda';
                    $data['pageMenu'] = [];

                }
            }else{
                $data['pageContent'] = "users/aspirator/v_verifikasi_gagal";
                $data['pageLink'] = 'propemperda';
                $data['pageMenu'] = [];
                
            }
        }
            else{
                $data['pageContent'] = "users/aspirator/v_verifikasi_gagal";
                $data['pageLink'] = 'propemperda';
                $data['pageMenu'] = [];
            }

        $this->bwidevtemplate->template_front($data);
        
    }

    public function sendEmailVerify($to,$subject,$headers,$txt){
		// $to = 'awanhari52@gmail.com';
		// echo $this->ion_auth->user()->row()->email;
		// $x="dd2@dd2.vbc";

		// $subject = 'Website DPRD Banyuwangi';

		// $headers = "From: dd2@dd2.vbc \r\n" .
		// 		"CC: admin.awanhari52@gmail.com,app.awanhari52@gmail.com; \r\n";
		// $headers .= "MIME-Version: 1.0\r\n";
		// $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		// $txt = "halo tes <br> <a href='".base_url()."'>lihat dprd web</a>";
		

		mail($to,$subject,$txt,$headers);
	}

    public function resendEmailVerification(){
        $wanted = json_decode(file_get_contents("php://input"));
        
        $user = $this->Users_modal->findBy(["a.id"=>$wanted->id_user]);

        $user = $user[0];
        $d = rand(100,9999)."/".$user->id."/".rand(100,9999);
        $bs64 = base64_encode($d);

        // $headers = "Reply-To: DPRD Banyuwangi <dprdbanyuwangi01@gmail.com>\r\n";
        $headers = "Return-Path: DPRD Banyuwangi <dprdbanyuwangi01@gmail.com>\r\n";
        $headers .= "From: DPRD Banyuwangi <dprdbanyuwangi01@gmail.com>\r\n"; 
        $headers .= "Organization: DPRD Banyuwangi\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= "X-Priority: 3\r\n";
        $headers .= "X-Mailer: PHP". phpversion() ."\r\n";

        
        // $headers = "From: dprdbanyuwangi01@gmail.com\r\n";
    
        $subject = "DPRD Banyuwangi - Kirim Ulang Verifikasi Akun";
        $message = "
        <!DOCTYPE html>
        <html>
        <head>
            <title>Verifikasi Akun</title>
        </head>
        <body>
        <div style='text-align:center'><img style='width:90px; height:95px;' src='https://dprd.banyuwangikab.go.id/v2/public/b-asset/img/dprd_logo.png'></div>
        <div style='background-color:#f7f7f7; width:100%; padding:1rem'>
        <h1>Selamat datang di DPRD Banyuwangi</h1>
        <h2>Verifikasi Akun</h2>
        Hai $user->first_name $user->last_name, Apakah anda melihat angka dibawah ini? <br>
        <span style='font-size:2rem; font-weight:bolder; padding:2rem; color:black'> ".rand(100,9999)."</span> <br>
        <table border='0' cellpadding='5px' >
        <tr>
        <td align:'center' valign='middle' style='font-size:16px; font-weight:bold; letter-spacing:.5px; line-height:150%; padding:15px 30px; 30px; '>
        <a style='padding:0.5rem; background-color:#e8e8e8; font-weight:bold; color:#4d4d4d; border:1px solid #d6d6d6; border-radius:5px; text-decoration:none;' 
        href='".base_url()."users/aspirator/vrf/".rtrim($bs64,"==")."'>Ya, Saya melihatnya</a>
        </td>
        </tr>
        </table>
        </div>
        
        
            
        </body>
        </html>";


        $this->sendEmailVerify($user->email,$subject,$headers,$message);

        echo json_encode([
            "success" => true,
            "status" => true,
            "message" => "Email verifikasi sudah dikirim ulang"
            ]);
    }

    public function _render_page($view, $data = null, $returnhtml = false) //I think this makes more sense
    {

        $this->viewdata = (empty($data)) ? $this->data : $data;

        $view_html = $this->load->view($view, $this->viewdata, $returnhtml);

        if ($returnhtml) return $view_html; //This will return html on 3rd argument being true
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

    public function _get_csrf_nonce()
    {
        $this->load->helper('string');
        $key   = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);

        return array($key => $value);
    }

    
}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */
