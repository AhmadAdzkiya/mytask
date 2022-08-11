<?php
/**
*
*/
class Page_model extends CI_Model
{
	public $tables = [];
	public $primeTabel = "";
	

	function __construct()
	{
		parent::__construct();
		$this->tables = $this->config->item('tables', 'ion_auth');
		$this->primeTabel = $this->tables['page_front_master'];
		
	}

	function getList($where=null){
		if($where){
			$this->db->where($where);
		}else{

		}
		$tabel = $this->primeTabel." a";
		
		$this->db->select("*" )
         ->from($tabel)
         ->order_by("a.urutan","ASC")
         ->order_by("a.nama","ASC");
		$result = $this->db->get();
		
		return $result->result_object();
	}


	function update($array,$id){
		$this->db->where($this->primeTabel.'.id', $id);
    	return $this->db->update($this->primeTabel, $array);
	}

	function delete($id){
		$this->db->where('id', $id);
    	return $this->db->delete($this->primeTabel);   
	}

	function deleteBy($where){
		$this->db->where($where);
    	return $this->db->delete($this->primeTabel);   
	}

	function save($data){
		return $this->db->insert($this->primeTabel, $data);
	}

	function findBy($where){
		return $this->db->select("*")
		->from($this->primeTabel." a")
		->where($where)
		->get()
		->result_object();
	}

	function insertBatch($users){
		return  $this->db->insert_batch($this->primeTabel,$users);
	}


}



