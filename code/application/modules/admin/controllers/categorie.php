<?php
/*
 * AdminController có làm thêm các việc sau:
 * - Lấy đường dẫn template ứng với module dựa vào URL.
 * - Chỉ cho admin đi tiếp (trừ t/h verify).
 */
class Categorie extends AdminController{
	public function __construct(){
		parent::__construct();			
	}
	public function index(){
		$this->load->helper('menu'); // helper tự tạo!
		$this->load->model('Mcategorie');
		$this->_data['title'] = 'List all Categorie';
		$this->_data['whatView'] = 'categorie/index_view';

		// $config['base_url'] = base_url().'admin/categorie/index';
		// $config['total_rows'] = $this->Mcategorie->countAll();
		// $config['per_page'] = 4;
		// $config['uri_segment'] = 4;
		// $this->load->library('pagination',$config);
		// $this->_data['page_links'] = $this->pagination->create_links();

		// $offset = $this->uri->segment(4);// Mới vô chưa có thì nó == FALSE
		// $this->_data['cateInfoArr'] = $this->Mcategorie->listCate($config['per_page'],$offset);
		
		$this->_data['cateInfoArr'] = $this->Mcategorie->listAllCate();
		$this->_data['mess'] = $this->session->flashdata('flash_mess');

		$this->load->view($this->_data['templatePath'],$this->_data);
	}
	public function del(){
		$cateId = $this->uri->segment(4);
		$this->load->model('Mcategorie');
		$this->Mcategorie->deleteCate($cateId);
		$this->session->set_flashdata('flash_mess','You have just successfully <b>deleted</b> a categorie!');
		redirect(base_url().'admin/categorie/index');
	}
	// Dùng AJAX để thêm chuyên mục
	public function add(){
		$name = $this->input->post('name');
		$parent = $this->input->post('parent');
		if($name != ''){
			$this->load->model('Mcategorie');
			$insertData = array(
				'cate_title' => $name,
				'cate_parent' => $parent,
			);
			$this->Mcategorie->insertCate($insertData);
			echo 'success';
		}else{
			echo 'fail';
		}
	}
	public function reload(){
		$this->load->model('Mcategorie');
		$this->_data['cateInfoArr'] = $this->Mcategorie->listAllCate();

		$this->load->view('categorie/reload_view',$this->_data);
	}
	public function edit(){
		$cateId = $this->uri->segment(4);

		$this->load->helper('menu'); // helper tự tạo!
		$this->load->model('Mcategorie');

		if($this->input->post('ok')){
			$cateName = $this->input->post('txtcate');
			if($cateName == ''){
				$this->_data['mess'] = 'Please enter your cate name!';
			}else{
				$cateParent = $this->input->post('cate-list');
				if($this->Mcategorie->checkCateName($cateName,$cateId) == FALSE){
					$this->_data['mess'] = 'Your cate name has already taken, please try another!';
				}else{
					$updateData = array(
						'cate_title' => $cateName,
						'cate_parent' => $cateParent,
					);
					$this->Mcategorie->updateCate($updateData,$cateId);
					$this->session->set_flashdata('flash_mess','You have just successfully <b>Edited</b> a categorie!');
					redirect(base_url().'admin/categorie/index');
				}
			}
		}

		$this->_data['cateInfo'] = $this->Mcategorie->getCateById($cateId);
		$this->_data['cateInfoArr'] = $this->Mcategorie->listAllCate();
		$this->_data['title'] = 'Edit a Categorie';
		$this->_data['whatView'] = 'categorie/edit_view';

		$this->load->view($this->_data['templatePath'],$this->_data);
	}
}