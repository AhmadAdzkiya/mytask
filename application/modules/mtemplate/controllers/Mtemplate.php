<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtemplate extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function template_view($data = NULL)
	{
		$this->load->view('dashboard',$data);
	}
	
	public function template_simple($data = NULL)
	{
		$this->load->view('front/tema',$data);
	}

	public function template_temp($data = NULL)
	{
		$this->load->view('front_temp',$data);
	}

	
}

/* End of file Template.php */
/* Location: ./application/modules/template/controllers/Template.php */

/* End of file Template.php */
/* Location: ./application/modules/template/controllers/Template.php */
