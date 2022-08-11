<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	// Helper For print_r
	function pr($var = '')
	{
		echo "<pre>";
		   print_r($var);	
		echo "</pre>";
	    // die();	
	}

	//Helper For base_url()
	function bs($value = '')
	{
		// public $url = ""
		echo base_url($value);
	}

	//Helper for $this->load->view()
	function view($value='', $data=array(), $output = false)
	{
		$CI =& get_instance();
		$CI->load->view($value,$data,$output);
	}

	//Helper For thsi->input->post()
	function post($value='')
	{
		$CI =& get_instance();
	    return $CI->input->post($value);
	}

	//helper for var_dump
    function dd($value='')
	{
		echo "<pre>";
		   var_dump($value);	
		echo "</pre>";
		die();
	}

	function ll($value='')
	{
		echo "<pre>";
		   var_dump($value);	
		echo "</pre>";
	}

	//Helper for last_query()
	function vd()
	{
		$CI =& get_instance();
		return $CI->db->last_query();
	}

	
	function group_priviliges($value='')
	{
		$CI =& get_instance();

		$gp_id = $CI->session->userdata("group_id");

		$gp_result = $CI->ion_auth_model->user_head_privilege($gp_id);

		foreach($gp_result as $key => $head_pre)
		{
			$gp_result[$key]->sub = $CI->ion_auth_model->user_sub_privilege($gp_id,$head_pre->perm_id);
		}

	    return $gp_result;
	}

	
	function getCurrentSekolah($option=null){

		$CI =& get_instance();
		$CI->load->model('dash/master/sekolah_model');
		$user_id = $CI->session->userdata('user_id');

		$sekolah = $CI->sekolah_model->getByUserId($user_id);

		dd($sekolah);
		


		die();

		// $CI->load->model('dash/publikasi/akd/Akd_master_model');

		// if($option==null){
		// 	$page = $CI->Akd_master_model->getList();
		// }else{
		// 	$page = $CI->Akd_master_model->getListAkdAndChild($option);
		// }



		
		// return $page;
	}

	function group_permission($all=null){
		$CI =& get_instance();

		$gp_id = $CI->session->userdata("group_id");
		$user_id =  $CI->session->userdata("user_id");

		$CI->load->model('users/users_groups');
		$gp = $CI->users_groups->getList(["a.user_id"=>$user_id]);

		$d=[];
		if(count($gp)>0){
			foreach ($gp as $k => $v) {
				$d[] = $v->group_id;
			}	
		}

		$gp_result = $CI->ion_auth_model->group_all_permission_by_group_in_id($d);

		// if($all==null){
		// 	$gp_result = $CI->ion_auth_model->group_all_permission_by_group_in_id($d);
		// }else{
		// 	$gp_result = $CI->ion_auth_model->group_all_permission_by_group_id();
		// }
		
		

	    return $gp_result;
	}


	function has($val)
	{
		if ($val) 
		{
			return true;
		}
		return false;
	}

	/**
	 * Slugify Helper
	 *
	 * Outputs the given string as a web safe filename
	 */
	if ( ! function_exists('slugify'))
	{
		function slugify($string, $replace = array(), $delimiter = '-', $locale = 'en_US.UTF-8', $encoding = 'UTF-8') {
			if (!extension_loaded('iconv')) {
				throw new Exception('iconv module not loaded');
			}
			// Save the old locale and set the new locale
			$oldLocale = setlocale(LC_ALL, '0');
			setlocale(LC_ALL, $locale);
			$clean = iconv($encoding, 'ASCII//TRANSLIT', $string);
			if (!empty($replace)) {
				$clean = str_replace((array) $replace, ' ', $clean);
			}
			$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
			$clean = strtolower($clean);
			$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
			$clean = trim($clean, $delimiter);
			// Revert back to the old locale
			// setlocale(LC_ALL, $oldLocale);
			return $clean;
		}
	}


/* End of file custom_helpers.php */
/* Location: ./application/helpers/custom_helpers.php */