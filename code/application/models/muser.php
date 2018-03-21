<?php
class Muser extends CI_Model{
	protected $_tableName = 'user';
	public function __construct(){
		parent::__construct();
	}
	public function listAllUser(){
		return $this->db->get($this->_tableName)->result_array();
	}
	public function listUser($quantity,$offset){
		$this->db->limit($quantity,$offset);
		return $this->db->get($this->_tableName)->result_array();
	}
	public function countAll(){
		return $this->db->count_all($this->_tableName);
	}
	public function checkUsername($username,$id){
		if($id == FALSE){
			$this->db->where('username',$username);
		}else{
			$this->db->where(array('username ='=>$username,'id !='=>$id));
		}
		$row = $this->db->get($this->_tableName)->num_rows();
		return $row == 0 ? TRUE : FALSE; 
	}
	public function checkEmail($email,$id){
		if($id == FALSE){
			$this->db->where('email',$email);
		}else{
			$this->db->where(array('email ='=>$email,'id !='=>$id));
		}
		$row = $this->db->get($this->_tableName)->num_rows();
		return $row == 0 ? TRUE : FALSE; 
	}
	public function insertUser($userInfo){
		$this->db->insert($this->_tableName,$userInfo);
	}
	public function deleteUser($userId){
		$this->db->where('id',$userId);
		$this->db->delete($this->_tableName);
	}
	public function getUserInfo($userId){
		$this->db->where('id',$userId);
		return $this->db->get($this->_tableName)->row_array();
	}
	public function updateUser($updateData,$userId){
		$this->db->where('id',$userId);
		$this->db->update($this->_tableName,$updateData);
	}
	public function checkLogin($u,$p){
		$this->db->where(array('username ='=>$u,'password ='=>$p));
		return $this->db->get($this->_tableName)->row_array();
	}
}