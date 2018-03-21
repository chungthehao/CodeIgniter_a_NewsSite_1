<?php
class Mcategorie extends CI_Model{
	protected $_tableName = 'cate_news';
	public function __construct(){
		parent::__construct();
	}
	public function listAllCate(){
		return $this->db->get($this->_tableName)->result_array();
	}
	public function countAll(){
		return $this->db->count_all($this->_tableName);
	}
	public function listCate($quantity,$offset){
		$this->db->limit($quantity,$offset);
		return $this->db->get($this->_tableName)->result_array();
	}
	public function deleteCate($cateId){
		$this->db->where('cate_id =',$cateId);
		$this->db->delete($this->_tableName);
	}
	public function insertCate($data){
		$this->db->insert($this->_tableName,$data);
	}
	public function getCateById($cateId){
		$this->db->where('cate_id =',$cateId);
		return $this->db->get($this->_tableName)->row_array();
	}
	public function checkCateName($cateName,$cateId){
		$this->db->where('cate_id !=',$cateId);
		$this->db->where('cate_title =',$cateName);
		if(empty($this->db->get($this->_tableName)->row_array())){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	public function updateCate($updateData,$cateId){
		$this->db->where('cate_id =',$cateId);
		$this->db->update($this->_tableName,$updateData);
	}
}