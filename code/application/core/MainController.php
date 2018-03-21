<?php
class MainController extends MY_Controller{
	protected $_data;
	public function __construct(){
		parent::__construct();
		// $module = $this->uri->segment(1);
		$module = $this->router->fetch_module();
		$this->_data['module'] = $module;
		$this->_data['templatePath'] = "$module/template";
		// Controller nào của module default cũng cần left menu cả nên
		// để nó ở core luôn
		$config['baseurl'] = base_url().'news/viewCate';
		$this->load->library('menu',$config);
		$this->load->model('Mcategorie');
		$this->menu->setMenu($this->Mcategorie->listAllCate());
		$this->_data['menu'] = $this->menu->callMenu();
	}
}