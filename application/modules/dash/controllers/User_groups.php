<?php defined('BASEPATH') or exit('No direct script access allowed');
/*
Author Salman Iqbal
date 29/1/2017
Company Parexons
 */
class User_groups extends MY_Controller
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
		$this->load->model(array('common_model', 'Users_modal', 'Users_groups'));

		$this->load->module('template');

		if (!$this->ion_auth->logged_in()) {
			redirect('users/auth', 'refresh');
		}

		$sess_data = $this->session->all_userdata();


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


		// pr($sess_data);
		// die(); 	
	}
	public function index()
	{
		if (!$this->ion_auth->is_admin()) {
			return show_error("You Must Be An Administrator To View This Page");
		}
		
		// set the flash data error message if there is one
		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		// list the groups
		$data['groups'] = $this->ion_auth->groups()->result();

		$this->session->set_flashdata('message', $this->ion_auth->messages());
		$data['page'] = 'users/user_groups/view_group';
		$this->template->template_view($data);
	}

	// create a new group
	public function create_group()
	{
		if (!$this->ion_auth->is_admin()) {
			return show_error("You Must Be An Administrator To View This Page");
		}

		$data['title'] = $this->lang->line('create_group_title');

		// validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'trim|required');

		if ($this->form_validation->run() == true) {

			$pre = $this->input->post('privilege');
			
			if (empty($pre)) {
				$msg = "You Must Have to Select at least one Previlige";
				$this->session->set_flashdata('error', $msg);
				redirect('users/User_groups/create_group', 'refresh');
			}

			$new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'));

			foreach ($pre as $key => $value) {
				$data = array('perm_id' => $pre[$key], 'group_id' => $new_group_id);

				$result = $this->common_model->add($this->tables['group_perm'], $data);
			}

			if ($result) {
				// check to see if we are creating the group
				// redirect them back to the user groups page
				$this->session->set_flashdata('success', $this->ion_auth->messages());
				redirect("users/User_groups", 'refresh');
			}
		} else {
			// display the create group form
			// set the flash data error message if there is one
			$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$data['group_name'] = array(
				'name' => 'group_name',
				'id' => 'group_name',
				'placeholder' => 'Admin',
				'class' => 'form-control',
				'type' => 'text',
				'required' => 'required',
				'value' => $this->form_validation->set_value('group_name'),
			);
			$data['description'] = array(
				'name' => 'description',
				'id' => 'description',
				'class' => 'form-control',
				'placeholder' => 'Administrator',
				'required' => 'required',
				'type' => 'text',
				'value' => $this->form_validation->set_value('description'),
			);

			$data['perm'] = $this->common_model->select($this->tables['permissions']);

			$data['page'] = 'users/user_groups/create_group';
			$this->template->template_view($data);
			// $this->_render_page('dashboard', $data);
		}
	}

	// edit a group
	public function edit_group($id)
	{
		if (!$this->ion_auth->is_admin()) {
			return show_error("You Must Be An Administrator To View This Page");
		}

		// bail if no group id given
		if (!$id || empty($id)) {
			redirect('users/User_groups', 'refresh');
		}

		$data['title'] = $this->lang->line('edit_group_title');

		$group = $this->ion_auth->group($id)->row();

		$privilege = $this->common_model->select($this->tables['permissions']);

		$currentPrivilege = $this->Users_modal->get_user_privileges($id);

		// validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'trim|required');

		if (isset($_POST) && !empty($_POST)) {

			if ($this->form_validation->run() === true) {

				//Only allow updating groups if user is admin
				if ($this->ion_auth->is_admin()) {
					//Update the groups user belongs to
					$privilegeData = $this->input->post('privlg');

					if (empty($privilegeData)) {
						$msg = "You Must Have To Set At Least One Privilege";
						$this->session->set_flashdata('error', $msg);
						redirect("users/User_groups/edit_group/" . $id, 'refresh');
					}

					if (isset($privilegeData) && !empty($privilegeData)) {

						$query = $this->Users_modal->remove_from_privileges($privilegeData, $id);

						// print_r($query);die();
						foreach ($privilegeData as $key => $value) {
							$data = array('perm_id' => $privilegeData[$key], 'group_id' => $id);

							$result = $this->common_model->add($this->tables['group_perm'] , $data);
						}
					}
				}
				$data = array('name' => $this->input->post('group_name'), 'description' => $this->input->post('group_description'));

				$group_update = $this->common_model->update($id, $data, $this->tables['groups'] );

				if ($group_update) {
					$this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
					redirect("users/User_groups", 'refresh');
				} else {
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				}
			}
		}

		// set the flash data error message if there is one
		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$data['group'] = $group;
		$data['privileges'] = $privilege;
		$data['crtPrivilege'] = $currentPrivilege;

		$readonly = $this->config->item('admin_group', 'ion_auth') === $group->name ? 'readonly' : '';

		$data['group_name'] = array(
			'name' => 'group_name',
			'id' => 'group_name',
			'type' => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('group_name', $group->name),
			$readonly => $readonly,
		);
		$data['group_description'] = array(
			'name' => 'group_description',
			'id' => 'group_description',
			'class' => 'form-control',
			'type' => 'text',
			'value' => $this->form_validation->set_value('group_description', $group->description),
			$readonly => $readonly,
		);


		$data['page'] = 'users/user_groups/edit_group';
		$this->template->template_view($data);
		// $this->_render_page("dashboard", $data);
	}

	public function _render_page($view, $data = null, $returnhtml = false) //I think this makes more sense
	{

		$this->viewdata = (empty($data)) ? $this->data : $data;

		$view_html = $this->load->view($view, $this->viewdata, $returnhtml);

		if ($returnhtml) return $view_html; //This will return html on 3rd argument being true
	}

	/*
	 * Delete group
	 */
	public function delete_group()
	{
		// Chekck If user is admin
		if (!$this->ion_auth->is_admin()) {
			return show_error("You Must Be An Administrator To Delete This Page");
		}

		$group_id = $this->uri->segment(4);

		//pass the right arguments and it's done
		$group_delete = $this->ion_auth->delete_group($group_id);

		if ($group_delete) {
			$this->session->set_flashdata('success', $this->ion_auth->messages());
			redirect('users/User_groups', 'refresh');
		} else {
			$msg = "You Can Not Delete Admin!";
			$this->session->set_flashdata('error', $msg);
			redirect('users/User_groups', 'refresh');
		}
	}

	//Check Duplicate group name
	public function check_group_name()
	{
		$group_name = $this->input->post('group_name');

		$result = $this->Users_groups->check_group('groups', $group_name);

		if ($result) {
			echo "ok::";
		}
	}
}

/* End of file User_groups.php */
/* Location: ./application/controllers/User_groups.php */
