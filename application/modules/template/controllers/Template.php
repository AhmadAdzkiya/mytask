<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Template extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->data = null;

		// 		$this->load->module('template');
		// 		$this->load->model('common_model');
		$this->load->library('form_validation');
		// $this->load->model(array('Maps_model'));

	}

	public function template_view($data = NULL)
	{
		$this->load->view('dashboard', $data);
	}

	public function template_front($data = NULL)
	{
		$this->load->view('front/', $data);
	}


	public function template_temp($data = NULL)
	{
		$this->load->view('front_temp', $data);
	}

	public function infografis($data = NULL)
	{
		$this->load->view('front/infografis', $data);
	}

	public function data_terkini($data = NULL)
	{
		$data['gender'] = $this->Maps_model->get_compare_gender();

		//  print_r($data);

		$this->load->view('front/data_terkini', $data);
	}


	public function data($data = NULL)
	{
		$this->load->view('front/data', $data);
	}
}

/* End of file Template.php */
/* Location: ./application/modules/template/controllers/Template.php */

/* End of file Template.php */
/* Location: ./application/modules/template/controllers/Template.php */
