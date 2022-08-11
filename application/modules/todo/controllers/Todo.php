<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
Author Salman Iqbal
Created on 20/1/2017
Company trustechsol.com
*/

class Todo extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->module('template');

		$this->load->model('common_model');

		if (!$this->ion_auth->logged_in()) {
			redirect('users/auth', 'refresh');
		}
		$this->ion_auth->get_user_group();
	}

	public function index()
	{
		$data['page'] = "todo/todo";
		$data['tasks'] = $this->common_model->getAllData('tasks', '', '', array('completed_status' => 0));

		$this->template->template_view($data);
	}

	public function store()
	{
		if ($_FILES['image']['name'] != '') {

			$config['upload_path']          = './uploads/task_images/';
			$config['allowed_types']        = 'gif|jpg|png';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('image')) {
				$error = array('error' => $this->upload->display_errors());

				show_error($error);
			} else {
				$data = array('upload_data' => $this->upload->data());

				$imageDetailArray = $this->upload->data();
				$image =  base_url() . 'uploads/task_images/' . $imageDetailArray['file_name'];
			}
		} else {
			$image = '';
		}

		$data = array(
			'task_name' => $this->input->post('task_title'),
			'description' => $this->input->post('desc'),
			'task_img' => $image,
			'task_status' => 'inprogress',
			'completed_status' => 0,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
		);

		$result = $this->common_model->InsertData('tasks', $data);

		if ($result) {
			$msg = "Task Added Successfully";
			$this->session->set_flashdata('success', $msg);
			redirect('todo', 'refresh');
		} else {
			$msg = "Error!";
			$this->session->set_flashdata('error', $msg);
			redirect('todo', 'refresh');
		}
	}
	public function delete($id)
	{
		$this->common_model->DeleteDB('tasks', array('id' => $id));

		$msg = "Task Deleted Successfully";
		$this->session->set_flashdata('success', $msg);
		redirect('todo', 'refresh');
	}
	public function edit($id)
	{
		$results = $this->common_model->getAllData('tasks', '', 1, array('id' => $id));

		echo json_encode($results);
	}
	public function update()
	{
		if ($_FILES['image']['name'] != '') {

			$config['upload_path']          = './uploads/task_images/';
			$config['allowed_types']        = 'gif|jpg|png';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('image')) {
				$error = array('error' => $this->upload->display_errors());

				show_error($error);
			} else {
				$data = array('upload_data' => $this->upload->data());

				$imageDetailArray = $this->upload->data();
				$image =  base_url() . 'uploads/task_images/' . $imageDetailArray['file_name'];
			}
		} else {
			$image = $this->input->post('old_img');
		}

		$data = array(
			'task_name' => $this->input->post('task_title'),
			'description' => $this->input->post('desc'),
			'task_img' =>  $image,
			'task_status' => 'inprogress',
			'completed_status' => 0,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
		);

		$result = $this->common_model->UpdateDB('tasks', array('id' => $this->input->post('task_id')), $data);

		if ($result) {
			$msg = "Task Updated Successfully";
			$this->session->set_flashdata('success', $msg);
			redirect('todo', 'refresh');
		} else {
			$msg = "Error!";
			$this->session->set_flashdata('error', $msg);
			redirect('todo', 'refresh');
		}
	}
	public function mark_completed($id)
	{
		$data = array(
			'completed_status' => 1,
			'task_status' => 'completed',
		);

		$this->common_model->UpdateDB('tasks', array('id' => $id), $data);

		$msg = "You Marked a Task Completed";
		$this->session->set_flashdata('success', $msg);
		redirect('todo', 'refresh');
	}
	public function completed_tasks()
	{
		
		$data['page'] = "todo/completed_tasks";
		$data['tasks'] = $this->common_model->getAllData('tasks', '', '', array('completed_status' => 1));

		$this->template->template_view($data);
	}
	public function search_tasks()
	{
		$task = $this->input->get('task');

		$data['page'] = "todo/search_tasks";
		$data['tasks'] = $this->common_model->getAllData('tasks', '', '', array('task_name' => $task));

		$this->template->template_view($data);
	}
}

/* End of file Site_config.php */
/* Location: ./application/controllers/Site_config.php */
