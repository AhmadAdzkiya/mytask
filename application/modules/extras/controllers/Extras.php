<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
Author Salman Iqbal
Created on 20/1/2017
Company Parexons
*/

class Extras extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here

		$this->load->module('template');

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('users/auth/login', 'refresh');
		}
		$this->ion_auth->get_user_group();
	}

	public function dashboard($value='')
	{
		view('extra/dashboard');
	}
	public function login_and_signup($value='')
	{
		$data['page'] = "extras/extra/login_and_signup";
		$this->template->template_view($data);
	}

	public function layout_boxed()
	{
		$data['page'] = "extras/layout/layout-boxed";
		$this->template->template_view($data);
	}

	public function layout_grids($value='')
	{
		$data['page'] = "extras/layout/layout-grids";
		$this->template->template_view($data);
	}

	public function layout_horizontal($value='')
	{
		$data['page'] = "extras/layout/layout-horizontal";
		$this->template->template_view($data);
	}

	public function layout_sidebar_scroll($value='')
	{
		$data['page'] = "extras/layout/layout-sidebar-scroll";
		$this->template->template_view($data);
	}

	public function layout_static_leftbar($value='')
	{
		$data['page'] = "extras/layout/layout-static-leftbar";
		$this->template->template_view($data);
	}

	public function app_inbox()
	{
		$data['page'] = "extras/extra/app_inbox";
		$this->template->template_view($data);
	}

	public function calender($value='')
	{
		$data['page'] = "extras/extra/calander";
		$this->template->template_view($data);
	}

	public function email_compose()
	{
		$data['page'] = "extras/extra/inbox_compose";
		$this->template->template_view($data);
	}

	public function userguide()
	{
		view('userguide/index');
	}
	public function ui_forms($value='')
	{
		view('extras/Forms/ui-forms');
	}
	public function form_components($value='')
	{
		view('extras/Forms/form-components');
	}
	public function form_pickers($value='')
	{
		view('extras/Forms/form-pickers');
	}
	public function form_wizard($value='')
	{
		view('extras/Forms/form-wizard');
	}
	public function form_validation($value='')
	{
		view('extras/Forms/form-validation');
	}
	public function form_masks($value='')
	{
		view('extras/Forms/form-masks');
	}
	public function form_dropzone($value='')
	{
		view('extras/Forms/form-dropzone');
	}
	public function form_summernote($value='')
	{
		view('extras/Forms/form-summernote');
	}
	public function form_markdown($value='')
	{
		view('extras/Forms/form-markdown');
	}
	public function form_xeditable($value='')
	{
		view('extras/Forms/form-xeditable');
	}
	public function form_gridforms($value='')
	{
		view('extras/Forms/form-gridforms');
	}
	public function buttons($value='')
	{
		$data['page'] = "extras/extra/buttons";
		$this->template->template_view($data);
	}
}

/* End of file Extras.php */
/* Location: ./application/controllers/Extras.php */