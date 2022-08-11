<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
Author Salman Iqbal
Created on 20/1/2017
Company Parexons
*/

class Site_config extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    //Do your magic here
    $this->load->helper('file');
    $this->load->module('template');
    $this->load->model('common_model');

    // Check if user Logged in
    if (!$this->ion_auth->logged_in()) {
      redirect('users/auth', 'refresh');
    }
    // $this->ion_auth->get_user_group();
  }

  /*
     * Load Site configuration page
  */
  public function index()
  {
    // Check if user is Admin 
    if (!$this->ion_auth->is_admin()) {
      return show_error("You Must Be An Administrator To View This Page");
    }
    $data['page'] = "site_config/configuration/site_config";
    $this->template->template_view($data);
    // $this->load->view('dashboard', $data);
  }

  /*
     * login system set up
  */
  public function Set_up()
  {
    if (isset($_POST)) {
      
      $site_name   = $this->input->post("site_name");
      $admin_email = $this->input->post("admin_email");
      $login_id    = $this->input->post("login_id");
      $min_pass    = $this->input->post("min_pass");
      $max_pass    = $this->input->post("max_pass");
      $login_atmpt = $this->input->post("login_atmpt");
      $user_expire = $this->input->post("user_expire");
      $lock_time   = $this->input->post("lock_time");
      $email_activation   = $this->input->post("email_activation");

      if (empty($site_name)) {
        $site_name = "Login System";
      }
      if (empty($admin_email)) {
        $admin_email = "admin@gmail.com";
      }
      if (empty($login_id)) {
        $login_id = "email";
      }
      if (empty($min_pass)) {
        $min_pass = 8;
      }
      if (empty($max_pass)) {
        $max_pass = 20;
      }
      if (empty($login_atmpt)) {
        $login_atmpt = 3;
      }
      if (empty($user_expire)) {
        $user_expire = 86500;
      }
      if (empty($lock_time)) {
        $lock_time = 600;
      }
      if (empty($email_activation)) {
        $email_activation = 'FALSE';
      }

      //Config path
      $config_path  = "./application/config/config_ion_auth.php";
      $replace_path = "./application/config/ion_auth.php";

      // Open the file
      $ion_auth_replace = file_get_contents($config_path);

      $new  = str_replace("%SITE_TITLE%", $site_name, $ion_auth_replace);
      $new  = str_replace("%ADMIN_EMAIL%", $admin_email, $new);
      $new  = str_replace("%IDENTITY%", $login_id, $new);
      $new  = str_replace("%MIN_PASS_LENGTH%", $min_pass, $new);
      $new  = str_replace("%MAX_PASS_LENGTH%", $max_pass, $new);
      $new  = str_replace("%USER_EXPIRE%", $user_expire, $new);
      $new  = str_replace("%MAX_LOGIN_ATTEMPT%", $login_atmpt, $new);
      $new  = str_replace("%LOCK_TIME%", $lock_time, $new);
      $new  = str_replace("%EMAIL_ACTIVATION%", $email_activation, $new);

      // Write the new ion_auth.php file
      $handle = fopen($replace_path, 'w+');

      // Chmod the file, in case the user forgot
      @chmod($replace_path, 0777);

      // Verify file permissions
      if (is_writable($replace_path)) {

        // Write the file
        if (fwrite($handle, $new)) {
          $msg = "Configuration Completed!";
          $this->session->set_flashdata('success', $msg);
          redirect('site_config', 'refresh');
        } else {
          $msg = "Error please contact with administrator!";
          $this->session->set_flashdata('error', $msg);
          redirect('site_config', 'refresh');
        }
      } else {
        $msg = "Error please contact with administrator!";
        $this->session->set_flashdata('error', $msg);
        redirect('site_config', 'refresh');
      }
    }
  }

  /*
    * Load database back up page
  */
  public function backup()
  {
    $data['page'] = "site_config/configuration/backup";
    $this->template->template_view($data);
    // $this->load->view('dashboard',$data);
  }

  /*
     * Export Users list
  */
  public function export_users()
  {
    $this->load->dbutil();

    $this->load->helper('file');

    $this->load->helper('download');

    $query = $this->db->query("SELECT * FROM users");

    $delimiter = ",";

    $nuline    = "\r\n";

    force_download($query . '.csv', $this->dbutil->csv_from_result($query, $delimiter, $nuline));
  }
  /*
      * Database Backup
   */
  public function backup_db()
  {

    // Load the DB utility class
    $this->load->dbutil();

    // Backup your entire database and assign it to a variable
    $backup = $this->dbutil->backup();

    // Load the file helper and write the file to your server
    $this->load->helper('file');

    write_file('Downloads.sql', $backup);

    // Load the download helper and send the file to your desktop
    $this->load->helper('download');

    force_download('backup.zip', $backup);
  }

  /*
      * Facebook configuration 
   */
  public function fb_config($value = '')
  {
    if ($_POST) {
      
      $app_id       = post('app_id');
      $apps_secret  = post('app_secret');
      $redirect_url = post('url');

      $path_to_file = APPPATH . "config/social_auth_config.php";

      // Open the file
      $file_contents = file_get_contents($path_to_file);

      $new  = str_replace("1304570809649783", $app_id, $file_contents, $count);
      $new  = str_replace("2be58a38fc9deb0c84cb30d29591699b", $apps_secret, $new, $count);
      $new  = str_replace("social_login/facebook_login", $redirect_url, $new, $count);

      if ($count == 0) {
        $msg = "Setup have been already done,If you want to change it again then try manually.";
        $this->session->set_flashdata('error', $msg);
        redirect('site_config/fb_config', 'refresh');
      }

      $replace_path = file_put_contents($path_to_file, $new);

      // Chmod the file, in case the user forgot
      @chmod($path_to_file, 0777);

      // Verify file permissions
      if (is_writable($path_to_file)) {

        $msg = "Facebook Setup Completed";
        $this->session->set_flashdata('success', $msg);
        redirect('site_config/fb_config', 'refresh');
      } else {
        $msg = "Error please contact with administrator!";
        $this->session->set_flashdata('error', $msg);
        redirect('site_config', 'refresh');
      }
    } else {
      $data['page'] = "site_config/social_login_config/fb_login";
      $this->template->template_view($data);
    }
  }

  /*
      * Twitter configuration
   */
  public function twitter_config($value = '')
  {
    if ($_POST) {
      $msg = "This Functionality is disable in demo";
      $this->session->set_flashdata('error', $msg);
      redirect('site_config/twitter_config', 'refresh');
      $app_id       = post('app_id');
      $apps_secret  = post('app_secret');
      $redirect_url = post('url');

      $path_to_file = APPPATH . "config/social_auth_config.php";

      // Open the file
      $file_contents = file_get_contents($path_to_file);

      $new  = str_replace("Ps0HSs9mBruaZHrj5T7FgNG25", $app_id, $file_contents, $count);
      $new  = str_replace("lH4GT1LxYyLtAeXL5rb8q1tblLDpTjYhROGB3cRmg3SmXNaVBy", $apps_secret, $new, $count);
      $new  = str_replace("social_login/twitter_login/", $redirect_url, $new, $count);

      if ($count == 0) {
        $msg = "Setup have been already done,If you want to change it again then try manually.";
        $this->session->set_flashdata('error', $msg);
        redirect('site_config/twitter_config', 'refresh');
      }

      $replace_path = file_put_contents($path_to_file, $new);

      // Chmod the file, in case the user forgot
      @chmod($path_to_file, 0777);

      // Verify file permissions
      if (is_writable($path_to_file)) {

        $msg = "Twitter Setup Completed";
        $this->session->set_flashdata('success', $msg);
        redirect('site_config/twitter_config', 'refresh');
      } else {
        $msg = "Error: Your File is Not Writable, Please on Permission 777";
        $this->session->set_flashdata('error', $msg);
        redirect('site_config/twitter_config', 'refresh');
      }
    } else {
      $data['page'] = "site_config/social_login_config/twitter_login";
      $this->template->template_view($data);
    }
  }

  /*
      * Google configuration
   */
  public function google_config($value = '')
  {
    if ($_POST) {
      $msg = "This Functionality is disable in demo";
      $this->session->set_flashdata('error', $msg);
      redirect('site_config/google_config', 'refresh');
      $app_id       = post('app_id');
      $apps_secret  = post('app_secret');
      $redirect_url = post('url');

      $path_to_file = APPPATH . "config/social_auth_config.php";

      // Open the file
      $file_contents = file_get_contents($path_to_file);

      $new  = str_replace("554815054343-mrip66a0c4a9r4tmse3ohidmfk5d7pt8.apps.googleusercontent.com", $app_id, $file_contents, $count);
      $new  = str_replace("m-9HZQDEuNhphErNkNXveh3J", $apps_secret, $new, $count);
      $new  = str_replace("social_login/google_login/", $redirect_url, $new, $count);

      if ($count == 0) {
        $msg = "Setup have been already done,If you want to change it again then try manually.";
        $this->session->set_flashdata('error', $msg);
        redirect('site_config/google_config', 'refresh');
      }

      $replace_path = file_put_contents($path_to_file, $new);

      // Chmod the file, in case the user forgot
      @chmod($path_to_file, 0777);

      // Verify file permissions
      if (is_writable($path_to_file)) {

        $msg = "Google Setup Completed";
        $this->session->set_flashdata('success', $msg);
        redirect('site_config/google_config', 'refresh');
      } else {
        $msg = "Error: Your File is Not Writable, Please on Permission 777";
        $this->session->set_flashdata('error', $msg);
        redirect('site_config/google_config', 'refresh');
      }
    } else {
      $data['page'] = "site_config/social_login_config/google_login";
      $this->template->template_view($data);
    }
  }

  /*
      * Instagram configuration
   */
  public function insta_config($value = '')
  {
    if ($_POST) {
      $msg = "This Functionality is disable in demo";
      $this->session->set_flashdata('error', $msg);
      redirect('site_config/insta_config', 'refresh');
      $apps_secret  = post('app_secret');
      $redirect_url = post('url');

      $path_to_file = APPPATH . "config/social_auth_config.php";

      // Open the file
      $file_contents = file_get_contents($path_to_file);

      $new  = str_replace("cc0c6e3ffad5457eb811cf3bd99f0524", $app_id, $file_contents, $count);
      $new  = str_replace("8abce035a6f741edb739dbdff8a4fe84", $apps_secret, $new, $count);
      $new  = str_replace("Social_login/instagram_login", $redirect_url, $new, $count);

      if ($count == 0) {
        $msg = "Setup have been already done,If you want to change it again then try manually.";
        $this->session->set_flashdata('error', $msg);
        redirect('site_config/insta_config', 'refresh');
      }

      $replace_path = file_put_contents($path_to_file, $new);

      // Chmod the file, in case the user forgot
      @chmod($path_to_file, 0777);

      // Verify file permissions
      if (is_writable($path_to_file)) {

        $msg = "Instagram Setup Completed";
        $this->session->set_flashdata('success', $msg);
        redirect('site_config/insta_config', 'refresh');
      } else {
        $msg = "Error: Your File is Not Writable, Please on Permission 777";
        $this->session->set_flashdata('error', $msg);
        redirect('site_config/insta_config', 'refresh');
      }
    } else {
      $data['page'] = "site_config/social_login_config/insta_login";
      $this->template->template_view($data);
    }
  }

  /*
      * Linkendin configuration
   */
  public function linkedin_config($value = '')
  {
    if ($_POST) {
      $msg = "This Functionality is disable in demo";
      $this->session->set_flashdata('error', $msg);
      redirect('site_config/linkedin_config', 'refresh');
      $app_id       = post('app_id');
      $apps_secret  = post('app_secret');
      $redirect_url = post('url');

      $path_to_file = APPPATH . "config/social_auth_config.php";

      // Open the file
      $file_contents = file_get_contents($path_to_file);

      $new  = str_replace("81uy3lt801lccs", $app_id, $file_contents, $count);
      $new  = str_replace("v3XvcLVh2200Lr27", $apps_secret, $new, $count);
      $new  = str_replace("social_login/linkedin_data", $redirect_url, $new, $count);

      if ($count == 0) {
        $msg = "Setup have been already done,If you want to change it again then try manually.";
        $this->session->set_flashdata('error', $msg);
        redirect('site_config/linkedin_config', 'refresh');
      }

      $replace_path = file_put_contents($path_to_file, $new);

      // Chmod the file, in case the user forgot
      @chmod($path_to_file, 0777);

      // Verify file permissions
      if (is_writable($path_to_file)) {

        $msg = "LinkedIn Setup Completed";
        $this->session->set_flashdata('success', $msg);
        redirect('site_config/linkedin_config', 'refresh');
      } else {
        $msg = "Error: Your File is Not Writable, Please on Permission 777";
        $this->session->set_flashdata('error', $msg);
        redirect('site_config/linkedin_config', 'refresh');
      }
    } else {
      $data['page'] = "site_config/social_login_config/linkedin_login";
      $this->template->template_view($data);
    }
  }
}

/* End of file Site_config.php */
/* Location: ./application/controllers/Site_config.php */
