<?php
defined('BASEPATH') or exit('No direct script access allowed');/*Author bee*/

class Dash extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->module('template');
		$this->load->helper('url');




		date_default_timezone_set("Asia/Jakarta");

		//$this->load->model('admin__model');

		if (!$this->ion_auth->logged_in()) {
			redirect('users/auth', 'refresh');
		}
		$this->ion_auth->get_user_group();
	}

	public function index() //blank
	{
		// $user_group = $this->ion_auth->get_user_group();

		// if(in_array($user_group,[2])){

		// 	// $user = $this->ion_auth->user()->row();
		// 	// $raperda = $raperda = $this->raperda_model->getListRaperda(" d.id in ('1602240041') ");
		// 	// $aspirasi = $this->raperda_aspirasi_model->getListAspirasi(["c.id"=>$user->id]); 
		// 	// $this->raperda_aspirasi_model->getList(["a.creatorid"=>$user->id]);
		// 	$data['page'] = "dash/dash/v_dash_index_member";
		// 	// $data['user'] =$user;
		// 	// $data['aspirasi'] =$aspirasi;
		// 	// $data['raperda'] =$raperda;

		// 	$this->template->template_view($data);

		// }else{

		// 	$data['user'] = $this->ion_auth->user()->row();
		// 	$data['page'] = "dash/dash/v_dash_index_admin";
		// 	$this->template->template_view($data);
		// }

		$data['user'] = $this->ion_auth->user()->row();
		$data['page'] = "dash/dash/v_dash_index_admin";
		$this->template->template_view($data);
	}
}
