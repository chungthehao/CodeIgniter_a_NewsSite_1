<?php
class User extends AdminController{
	public function __construct(){
		parent::__construct();			
	}
	public function index(){
		$this->_data['title'] = 'List all user';
		$this->_data['whatView'] = 'user/index_view';
		$this->load->model('Muser');

		$config['base_url'] = base_url().'admin/user/index';
		$config['total_rows'] = $this->Muser->countAll();
		$config['per_page'] = 5;
		$config['uri_segment'] = 4;
		$this->load->library('pagination',$config);
		$this->_data['page_links'] = $this->pagination->create_links();

		$offset = $this->uri->segment(4);// Mới vô chưa có thì nó == FALSE
		$this->_data['userInfoArr'] = $this->Muser->listUser($config['per_page'],$offset);
		$this->_data['mess'] = $this->session->flashdata('flash_mess');
		$this->load->view($this->_data['templatePath'],$this->_data);
	}
	public function add(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->CI =& $this;

		$this->form_validation->set_rules('txtname','Username','required|min_length[4]|callback_check_user');
		$this->form_validation->set_rules('txtpass','Password','required|matches[txtpass2]');
		$this->form_validation->set_rules('txtemail','Email','required|valid_email|callback_check_email');
		if($this->form_validation->run()){
			$this->load->model('Muser');
			$insertData = array(
				'username' => $this->input->post('txtname'),
				'email' => $this->input->post('txtemail'),
				'password' => md5($this->input->post('txtpass')),
				'level' => $this->input->post('level'),
			);
			$this->Muser->insertUser($insertData);
			// Thư viên session đã được autoload
			$this->session->set_flashdata('flash_mess','You have just successfully added a user!');
			redirect(base_url().'admin/user/index');
		}

		$this->_data['title'] = 'Add a User';
		$this->_data['whatView'] = 'user/add_view';
		$this->load->view($this->_data['templatePath'],$this->_data);
	}
	public function check_user($u){
		$id = $this->uri->segment(4);
		$this->load->model('Muser');
		if($this->Muser->checkUsername($u,$id) == FALSE){
			$this->form_validation->set_message('check_user','Your Username has already taken, please try another!');
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function check_email($e){
		$id = $this->uri->segment(4);
		$this->load->model('Muser');
		if($this->Muser->checkEmail($e,$id) == FALSE){
			$this->form_validation->set_message('check_email','Your Email has already taken, please try another!');
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function del(){
		$userId = $this->uri->segment(4);
		$this->load->model('Muser');
		$this->Muser->deleteUser($userId);
		$this->session->set_flashdata('flash_mess','You have just successfully <b>deleted</b> a user!');
		redirect(base_url().'admin/user/index');
	}
	public function edit(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->CI =& $this;

		$userId = $this->uri->segment(4);
		$this->load->model('Muser');

		$this->form_validation->set_rules('txtname','Username','required|min_length[4]|callback_check_user');
		$this->form_validation->set_rules('txtpass','Password','matches[txtpass2]');
		$this->form_validation->set_rules('txtemail','Email','required|valid_email|callback_check_email');
		if($this->form_validation->run()){
			$updateData = array(
				'username' => $this->input->post('txtname'),
				'email' => $this->input->post('txtemail'),
				'level' => $this->input->post('level'),
			);
			if($this->input->post('txtpass') != ''){
				$updateData['password'] = md5($this->input->post('txtpass'));
			}
			$this->Muser->updateUser($updateData,$userId);
			// Thư viên session đã được autoload
			$this->session->set_flashdata('flash_mess','You have just successfully edited a user!');
			redirect(base_url().'admin/user/index');
		}

		$this->_data['userInfo'] = $this->Muser->getUserInfo($userId);
		$this->_data['title'] = 'Edit a User';
		$this->_data['whatView'] = 'user/edit_view';

		$this->load->view($this->_data['templatePath'],$this->_data);
	}
}