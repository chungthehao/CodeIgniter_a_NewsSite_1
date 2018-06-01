<?php
/*
 * MainController làm thêm các việc sau:
 * - Lấy path template tương ứng với module default.
 * - Chuẩn bị sẵn menu trái (vì controller nào của module này đều có menu trái cả).
 */
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