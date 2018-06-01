<?php
/*
 * AdminController có làm thêm các việc sau:
 * - Lấy đường dẫn template ứng với module dựa vào URL.
 * - Chỉ cho admin đi tiếp (trừ t/h verify).
 */
class Index extends AdminController{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->_data['title'] = 'Welcome Page';
		$this->_data['whatView'] = 'index/index_view';
		$this->_data['user'] = $this->session->userdata('sess_username');
		$this->load->view($this->_data['templatePath'],$this->_data);
	}
}