<?php
class AdminController extends MY_Controller{
	protected $_data;
	public function __construct(){
		parent::__construct();
		$module = $this->uri->segment(1);
		$this->_data['module'] = $module;
		$this->_data['templatePath'] = "$module/template";

		if($this->uri->segment(2)!='verify' && $this->session->userdata('sess_level')!=2){
			redirect(base_url().'admin/verify/login');
		}
	}
}