<?php 

class MY_Model extends CI_Model {
	protected $_table_name = '';
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = '';
	public $rules = array();
	protected $_timestamps = FALSE;
	
	function __construct(){
		parent::__construct();
	}

	public function array_from_post($fields) {
		$data = array();
		foreach ($fields as $field) {
			if (strrpos($field, 'date') !== FALSE) {
				$data[$field] =  DateTime::createFromFormat('d/m/Y', $this->input->post($field))->format('Y-m-d');
			}
			else {
			$data[$field] = htmlentities($this->input->post($field),ENT_QUOTES, 'UTF-8');
			}
		}
		return $data;
	}

	public function get($id = NULL, $single = FALSE){
		if ($id != NULL) {
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->where($this->_primary_key, $id);
			$method = 'row';
		}
		else if ($single == TRUE) {
			$method = 'row';
		}
		else {
			$method = 'result';
		}
		if ( !count($this->db->ar_orderby) ) {
			$this->db->order_by($this->_order_by);
		}
		return $this->db->get($this->_table_name)->{$method}();

	}//close get

	public function get_by($where, $single = FALSE){
		$this->db->where($where);
		return $this->get(NULL, $single);

	}

	public function save($data, $id = NULL)  {
		//Set timestamps
		if ($this->_timestamps == TRUE) {
			$now = date('Y-m-d H:i:s');
			//assume we have an id if not, make a created date
			$id || $data['created'] = $now;
			$data['modified'] = $now;
		}

		//Insert
		if ($id === NULL) {
			// if $data[id] is set, nullify it, if it is not set, fine.
			!isset($data[$this->_primary_key])  || $data[$this->_primary_key] = NULL;
			$this->db->set($data);
			$this->db->insert($this->_table_name);
			$id = $this->db->insert_id();

		}
		//Update
		else {
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->set($data);
			$this->db->where($this->_primary_key, $id);
			$this->db->update($this->_table_name);
		}
		return $id;
	}//close save

	public function delete($id)  {
		$filter = $this->_primary_filter;
		$id = $filter($id);

		if (!$id) {
			return FALSE;
		}
		$this->db->where($this->_primary_key, $id);
		$this->db->limit(1);
		$this->db->delete($this->_table_name);
	}


}
