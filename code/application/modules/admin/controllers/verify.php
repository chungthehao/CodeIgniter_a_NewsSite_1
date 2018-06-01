<?php
/*
 * AdminController có làm thêm các việc sau:
 * - Lấy đường dẫn template ứng với module dựa vào URL.
 * - Chỉ cho admin đi tiếp (trừ t/h verify).
 */
class Verify extends AdminController{
	public function __construct(){
		parent::__construct();
	}
	public function login(){
		
		if($this->input->post('ok')){
			$u = $this->input->post('txtname');
			$p = md5($this->input->post('txtpass'));
			$this->load->model('Muser');
			$userInfo = $this->Muser->checkLogin($u,$p);
			if(!empty($userInfo)){
				$this->session->set_userdata('sess_username',$userInfo['username']);
				$this->session->set_userdata('sess_level',$userInfo['level']);
				$this->session->set_userdata('sess_id',$userInfo['id']);
				$this->session->set_flashdata('flash_mess','Login Success!');
				redirect(base_url().'admin/index');
			}else{
				$this->_data['error'] = 'Wrong Username or Password!';
			}
		}

		$this->_data['title'] = 'Login Page';
		$this->_data['whatView'] = 'verify/login_view';
		$this->load->view($this->_data['templatePath'],$this->_data);
	}
	public function logout(){
		session_start();
		session_destroy();
		$this->session->sess_destroy(); // session của CI (thực ra là cookie)
		redirect(base_url().'admin/verify/login');
	}
}