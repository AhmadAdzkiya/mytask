<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_groups extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->tables = $this->config->item('tables', 'ion_auth');
		$this->tbl_users_groups = $this->tables["users_groups"];
		
	}


	public function check_group($table,$group_name)
	{
		$this->db->where('name', $group_name);
		$query = $this->db->get($table);
		if ($query->num_rows() > 0)
		{
          return TRUE;
        }
        else
        {
          return FALSE;
        }
	}


	public function update($id,$data,$table)
	{
		if (empty($id)) return FALSE;
		$this->db->where($id);
		$this->db->update($table,$data);
		return TRUE;
	}

	function getList($where){
		if($where){
			$this->db->where($where);
		}

		$this->db->select("a.*" )
		 ->from($this->tbl_users_groups." a");
		$result = $this->db->get();
		
		return $result->result_object();
	}



}

/* End of file Users_groups.php */
/* Location: ./application/models/Users_groups.php */