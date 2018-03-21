<?php
class Home extends MainController{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->_data['title'] = 'Home Page';
		$this->_data['whatView'] = 'home/index_view';
		$this->load->view($this->_data['templatePath'],$this->_data);
	}
}