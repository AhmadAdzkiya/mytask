<?php defined('BASEPATH') or exit('No direct script access allowed');

class Permissions extends MY_Controller
{
	public $tables = [];
	public $db = null;

	public function __construct()
	{
		parent::__construct();
		//Do your magic here

		$this->load->library(array('form_validation'));
		$this->load->helper(array('html', 'language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
		$this->load->model(array('Ion_auth_model', 'common_model'));

		$this->load->module('template');

		$this->config->load('ion_auth', TRUE);
		$this->load->helper('cookie', 'date');
		$this->lang->load('ion_auth');

		// initialize the database
		$group_name = $this->config->item('database_group_name', 'ion_auth');
		if (empty($group_name)) 
		{
			// By default, use CI's db that should be already loaded
			$CI =& get_instance();
			$this->db = $CI->db;
		}
		else
		{
			// For specific group name, open a new specific connection
			$this->db = $this->load->database($group_name, TRUE, TRUE);
		}   

		// initialize db tables data
		$this->tables = $this->config->item('tables', 'ion_auth');


		if (!$this->ion_auth->logged_in()) {
			redirect('users/auth', 'refresh');
		}
	}

	public function index()
	{
		if (!$this->ion_auth->is_admin()) {
			return show_error("You Must Be An Administrator To View This Page");
		}

			$data['head_permissions'] = $this->common_model->getAllData($this->tables['permissions'], '*', '', array('level' => 0));
			$data['sub_permissions'] = $this->common_model->getAllData($this->tables['permissions'], '*', '', array('level' => 1));
			$data['permissions'] = group_permission(null);
			$data['page'] = 'users/user_groups/permissions';


			$this->template->template_view($data);
			
	}

	public function save_head_permission(){
		$data = array(
			'perm_name' => post('perm_name'),
			'icon' => post('icon'),
			'menu_name' => 'head',
			'url' => post('url'),
			'slug' => slugify(post('perm_name')),
			'keterangan' => post('keterangan'),
			'level' => 0,
			'parent_id' => 0,
			'created_at' => date('Y-m-d H:i:s'),
			'urutan' => post('urutan')
		);

		$result = $this->common_model->add($this->tables['permissions'], $data);


		$dataGroup = [
			"id"		=> '',
			"group_id"	=> 1,
			"perm_id"	=> $this->db->insert_id()
		];

			
		// $result = $this->common_model->add($this->tables['group_perm'], $dataGroup);

		if ($result) {
			$msg = "Permission Added Successfully";
			$this->session->set_flashdata('success', $msg);
			redirect('users/Permissions', 'refresh');
		} else {
			$msg = "Error";
			$this->session->set_flashdata('error', $msg);
			redirect('users/Permissions', 'refresh');
		}
	}
	
	public function sub_permission()
	{
		$data = array(
			'perm_id' =>'',
			'perm_name' => post('perm'),
			'icon' => '<i class="fa fa-angle-right" aria-hidden="true"></i>',
			'slug' => slugify(post('perm')),
			'keterangan' => post('keterangan'),
			'level' => 1,
			'menu_name' => 'sub',
			'url' => post('url'),
			'created_at' => date('Y-m-d H:i:s'),
			'parent_id' => post('head_perm'),
			'urutan' => post('urutan')
		);

		$result = $this->common_model->add($this->tables['permissions'], $data);
		$dataGroup = [
			"id"		=> '',
			"group_id"	=> 1,
			"perm_id"	=> $this->db->insert_id()
		];

			
		// $result = $this->common_model->add($this->tables['group_perm'], $dataGroup);

		if ($result) {
			$msg = "Permission Added Successfully";
			$this->session->set_flashdata('success', $msg);
			redirect('users/Permissions', 'refresh');
		} else {
			$msg = "Error";
			$this->session->set_flashdata('error', $msg);
			redirect('users/Permissions', 'refresh');
		}
	}
	public function delete_perm($id)
	{
		if($this->ion_auth->get_users_groups()->row()->id == 1){
			$this->common_model->delete(array('perm_id' => $id), $this->tables['permissions']);
			$this->common_model->delete(array('parent_id' => $id), $this->tables['permissions']);

			$msg = "Permission Delete Successfully";
			$this->session->set_flashdata('success', $msg);
			redirect('users/Permissions', 'refresh');
		}else{
			$msg = "Anda tidak diperbolehkan menghapus data ini";
			$this->session->set_flashdata('error', $msg);
			redirect('users/Permissions', 'refresh');
		}
		
	}
	
	public function get_perm()
	{
		$id = post('id');
		$level = post('level');

		if ($level == 0) {
			$edit_id = array('perm_id' => $id);

			$result = $this->common_model->getAllData($this->tables['permissions'], '*', 1, $edit_id);

			echo json_encode($result);
		} else {
			$result =  $this->common_model->getAllData($this->tables['permissions'], '*', 1, array('perm_id' => $id));

			echo json_encode($result);
		}
	}

	public function get_permission()
	{
		$id = post('id');
		$level = post('level');

		if ($level == 0) {
			$edit_id = array('perm_id' => $id);

			$result = $this->common_model->getAllData($this->tables['permissions'], '*', 1, $edit_id);

			echo json_encode($result);
		} else {
			$result =  $this->common_model->getAllData($this->tables['permissions'], '*');

			echo json_encode($result);
		}
	}
	

	public function update_perm()
	{
		if (!$this->ion_auth->is_admin()) {
			return show_error("You Must Be An Administrator To View This Page");
		}
		$data = array(
			'perm_name' => post('perm_name'),
			'icon' => post('icon'),
			'keterangan' => post('keterangan'),
			'url' => post('url'),
			'urutan' => post('urutan'),
		);

		$result = $this->common_model->UpdateDB($this->tables['permissions'], array('perm_id' => post('id')), $data);

		if ($result) {
			$msg = "Head Permission Update Successfully";
			$this->session->set_flashdata('success', $msg);
			redirect('users/Permissions', 'refresh');
		} else {
			$msg = "Error";
			$this->session->set_flashdata('error', $msg);
			redirect('users/Permissions', 'refresh');
		}
	}

	public function update_sub_permission()
	{
		if(post('id') == post('head_perm')){
			$msg = "Gagal update menu dan sub menu tidak boleh sama ";
			$this->session->set_flashdata('error', $msg);
			redirect('users/Permissions', 'refresh');
		}else{
			$data = array(
				'perm_name' => post('perm'),
				'url' => post('url'),
				'keterangan' => post('keterangan'),
				'parent_id' => post('head_perm'),
				'urutan' => post('urutan'),
			);
	
			$result = $this->common_model->UpdateDB($this->tables['permissions'], array('perm_id' => post('id')), $data);
	
			if ($result) {
				$msg = "Sub Permission Updated Successfully";
				$this->session->set_flashdata('success', $msg);
				redirect('users/Permissions', 'refresh');
			} else {
				$msg = "Error";
				$this->session->set_flashdata('error', $msg);
				redirect('users/Permissions', 'refresh');
			}
		}
		
	}
}

/* End of file Controllername.php */
