<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
Author Salman Iqbal
Company Parexons
Date 26/1/2017
*/

class Users_modal extends CI_Model 
{
	public $tables = [];
	public $db = null;
	

	public function __construct(){
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
	}

	// get All Users
	public function all_users()
	{
		$this->db->order_by('id','desc');
		$this->db->limit(5);
		$query = $this->db->get($this->tables['users']);
		return $query->result();
	}

	//Count Users
	public function count_users()
	{
		$this->db->select('*');
		$this->db->from($this->tables['users']);
		return $this->db->count_all_results();
	}

	public function recent_users()
	{
		$this->db->where('date', date('Y-m-d'));
		$query = $this->db->get($this->tables['users']);
		return $count = $query->num_rows();
	}

	public function findBy($where=null)
	{
		if($where){
			$this->db->where($where);
		}
		$this->db->select("a.*")
		->from($this->tables['users']." a")
		->join($this->tables['users_groups']." c","a.id=c.user_id")
		->join($this->tables['groups']." b","c.group_id=b.id")
		->order_by('last_login',"DESC");
		
		$query = $this->db->get();
	// echo $this->db->last_query();
		return $query->result_object(); 

	}

	public function recent_login_users($where=null)
	{
		if($where){
			$this->db->where($where);
		}
		$this->db->select("a.id, username, email")
		->from($this->tables['users']." a")
		->join($this->tables['users_groups']." c","a.id=c.user_id")
		->join($this->tables['groups']." b","c.group_id=b.id")
		->order_by('last_login',"DESC");
		
		$query = $this->db->get();
	// echo $this->db->last_query();
		return $query->result_object(); 


	}

	public function weekly_data()
	{
		$this->db->select('id');
		$this->db->from($this->tables['users']);
		$this->db->where('DATE > DATE_SUB(NOW(), INTERVAL 1 WEEK)');
		return $this->db->count_all_results();
	}

	public function get_user_privileges($id)
	{
		$this->db->select('*')
				 ->from($this->tables['groups'] )
				 ->join($this->tables['group_perm'], $this->tables['groups'].".id = ".$this->tables['group_perm'].".group_id")
				 ->join($this->tables['permissions'], $this->tables['permissions'].".perm_id = ".$this->tables['group_perm'].".perm_id")
				 ->where($this->tables['group_perm'].'.group_id',$id);
		$query = $this->db->get();
		return $query->result(); 
	}

	public function remove_from_privileges($privilege_ids=false, $group_id=false)
	{
		// group id is required
		if(empty($group_id))
		{
			return FALSE;
		}

		// if privilege id(s) are passed remove privilege from the group(s)
		
		if(!is_array($privilege_ids))
		{
			$privilege_ids = array($privilege_ids);
		}

		foreach($privilege_ids as $privilege_id)
		{
			$this->db->select('*')
					 ->from($this->tables['group_perm'])
					 ->join($this->tables['groups'], $this->tables['groups'].".id = ".$this->tables['group_perm'].".group_id")
					 ->join($this->tables['permissions'], $this->tables['permissions'].".perm_id = ".$this->tables['group_perm'].".perm_id")
					 ->where($this->tables['group_perm'].'.group_id',$group_id);
					 // ->where('group_perm.perm_id',$privilege_id);
			$this->db->delete();		 	
		}

		return TRUE;
	}
	public function get_group_users($group)
	{
		$this->db->select('email')
		         ->from($this->tables['groups'] )
		         ->join($this->tables['users_groups'], $this->tables['groups'].'.id = '.$this->tables['users_groups'].'.group_id')
		         ->join($this->tables['users'] ,$this->tables['users'].'.id = '.$this->tables['users_groups'].'.user_id')
		         ->where($this->tables['groups'].'groups.id',$group);
		$query = $this->db->get();
		return $query->result();
	}

	function update($array,$id){
		$this->db->where($this->tables['users'].'.id', $id);
    	return $this->db->update($this->tables['users'], $array);
	}

}

/* End of file Users_modal.php */
/* Location: ./application/models/Users_modal.php */