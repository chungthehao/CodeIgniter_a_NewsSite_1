<?php
class News extends MainController{
	public function __construct(){
		parent::__construct();
		$this->load->helper('seourl');
	}
	public function index(){
		$this->_data['title'] = 'News Page';
		$this->_data['whatView'] = 'news/index_view';
		$this->load->model('Mnews');
		$this->_data['newsArr'] = $this->Mnews->getNews();
		$this->load->view($this->_data['templatePath'],$this->_data);
	}
	public function showDetail(){
		$newsId = $this->uri->segment(3);
		
		$this->load->model('Mnews');
		$newsInfo = $this->Mnews->getNewsById($newsId);
		$this->_data['title'] = $newsInfo['news_title'];
		$this->_data['newsInfo'] = $newsInfo;
		$this->_data['whatView'] = 'news/showDetail_view';
		$this->_data['otherNews'] = $this->Mnews->listOtherNews($newsId,$newsInfo['cate_id']);
		
		$this->load->view($this->_data['templatePath'],$this->_data);
	}
	public function viewCate(){
		$cateId = $this->uri->segment(3);

		$this->_data['whatView'] = 'news/viewCate_view';
		$this->load->model('Mnews');
		$newsArr = $this->Mnews->getNewsByCateId($cateId);
		if( ! empty($newsArr)){
			$this->_data['title'] = $newsArr[0]['cate_title'];
		}else{
			$this->_data['title'] = 'Categorie Title';
		}
		$this->_data['newsArr'] = $newsArr;
		$this->load->view($this->_data['templatePath'],$this->_data);
	}
}