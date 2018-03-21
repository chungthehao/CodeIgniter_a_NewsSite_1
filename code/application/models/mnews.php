<?php
class Mnews extends CI_Model{
	protected $_tableName = 'news';
	public function __construct(){
		parent::__construct();
	}
	public function insertNews($insertData){
		$this->db->insert($this->_tableName,$insertData);
	}
	public function countAll(){
		return $this->db->count_all($this->_tableName);
	}
	public function listNews($quantity,$offset){
		$this->db->select('news_id,news_title,news_author,username,cate_title');
		$this->db->join('user','user.id = news.user_id');
		$this->db->join('cate_news','cate_news.cate_id = news.cate_id');
		$this->db->limit($quantity,$offset);
		$this->db->order_by('news_id','desc');
		return $this->db->get($this->_tableName)->result_array();
	}
	public function deleteNews($newsId){
		$this->db->where('news_id',$newsId);
		$this->db->delete($this->_tableName);
	}
	public function getNewsById($newsId){
		$this->db->where('news_id',$newsId);
		return $this->db->get($this->_tableName)->row_array();
	}
	public function updateNews($updateData,$newsId){
		$this->db->where('news_id',$newsId);
		$this->db->update($this->_tableName,$updateData);
	}
	public function getNews(){
		$this->db->select('news_id,news_title,news_info,news_img');
		$this->db->limit(7); // 7 tin mới nhất
		$this->db->order_by('news_id','desc');
		return $this->db->get($this->_tableName)->result_array();

	}
	public function listOtherNews($currentNewsId,$currentCateId){
		$this->db->select('news_id,cate_id,news_title');
		$this->db->where('news_id <',$currentNewsId);
		$this->db->where('cate_id =',$currentCateId);
		return $this->db->get($this->_tableName)->result_array();
	}
	public function getNewsByCateId($cateId){
		$this->db->select('news_id,news_title,news_info,news_img,cate_title');
		$this->db->join('cate_news','cate_news.cate_id = news.cate_id');
		$this->db->order_by('news_id','desc');
		$this->db->where('news.cate_id =',$cateId);
		return $this->db->get($this->_tableName)->result_array();
	}
}