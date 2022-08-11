<?php
/**
*
*/
class Page_model extends CI_Model
{
	public $tables = [];
	public $primeTabel ="";
	

	function __construct()
	{
		parent::__construct();
		$this->tables = $this->config->item('tables', 'ion_auth');
		$this->primeTabel = $this->tables["page_front_master"];
		
	}


	function getList($where=null){
		if($where){
			$this->db->where($where);
		}else{

		}

		$this->db->select("*" )
		 ->from($this->primeTabel)
		 ->order_by("nama","ASC");
		$result = $this->db->get();

		
		return $result->result_object();
	}


	function findBy($where){
		return $this->db->select("*")
		->from($this->primeTabel." a")
		->where($where)
		->order_by("a.nama","ASC")
		->get()
		->result_object();
	}


	function update($array,$id){
		$this->db->where($this->primeTabel.'.id', $id);
    	return $this->db->update($this->tables["page_front_master"], $array);
	}

	function delete($id){
		$this->db->where('id', $id);
    	return $this->db->delete($this->primeTabel);   
	}

	function save($data){
		return $this->db->insert($this->primeTabel, $data);
	}

	

	function insertBatch($users){
		return  $this->db->insert_batch($this->primeTabel,$users);
	}


}



