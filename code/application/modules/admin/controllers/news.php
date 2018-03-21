<?php
class News extends AdminController{
	public function __construct(){
		parent::__construct();
		$username = $this->session->userdata('sess_username');
		session_start();
		$_SESSION['KCFINDER']['disabled'] = FALSE;
		$_SESSION['KCFINDER']['uploadURL'] = base_url()."uploads/$username";
	}
	public function index(){
		$this->_data['title'] = 'List all news';
		$this->_data['whatView'] = 'news/index_view';
		$this->load->model('Mnews');

		$config['base_url'] = base_url().'admin/news/index';
		$config['total_rows'] = $this->Mnews->countAll();
		$config['per_page'] = 3;
		$config['uri_segment'] = 4;
		$this->load->library('pagination',$config);
		$this->_data['page_links'] = $this->pagination->create_links();

		$offset = $this->uri->segment(4);// Mới vô chưa có thì nó == FALSE
		$this->_data['newsInfoArr'] = $this->Mnews->listNews($config['per_page'],$offset);
		$this->_data['mess'] = $this->session->flashdata('flash_mess');
		$this->load->view($this->_data['templatePath'],$this->_data);
	}
	public function del(){
		$newsId = $this->uri->segment(4);
		$this->load->model('Mnews');
		$this->Mnews->deleteNews($newsId);
		$this->session->set_flashdata('flash_mess','You have just successfully <b>deleted</b> a news!');
		redirect(base_url().'admin/news/index');
	}
	public function add(){
		$this->load->helper('menu');
		$this->load->model('Mcategorie');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txttitle','News Title','required');
		$this->form_validation->set_rules('txtauthor','News Author','required');
		$this->form_validation->set_rules('txtinfo','News Info','required');
		$this->form_validation->set_rules('txtdetail','News Detail','required');

		if($this->form_validation->run() == TRUE){
			$insertData = array(
					'news_title'	=>	$this->input->post('txttitle'),
					'news_author'	=>	$this->input->post('txtauthor'),
					'news_info'		=>	$this->input->post('txtinfo'),
					'news_full'		=>	$this->input->post('txtdetail'),
					'cate_id'		=>	$this->input->post('cate-list'),
					'user_id'		=>	$this->session->userdata('sess_id'),
			);
			$flag = TRUE; // Không up hình hoặc up thành công thì TRUE
			if($_FILES['img']['name'] != ''){// ngta có chọn hình thì có tên
				$config['upload_path'] = 'uploads/main';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '2000';
				$config['max_width']  = '1920';
				$config['max_height']  = '1200';
				$this->load->library('upload', $config);
				if($this->upload->do_upload('img') == FALSE){// up thất bại
					$this->_data['error'] = $this->upload->display_errors();
					$flag = FALSE;
				}else{// up thành công
					$img = $this->upload->data();
					$insertData['news_img'] = $img['file_name'];
				}
			}
			if($flag == TRUE){
				$this->load->model('Mnews');
				$this->Mnews->insertNews($insertData);
				$this->session->set_flashdata('flash_mess','Thêm tin thành công!');
				redirect(base_url().'admin/news');
			}
		}

		$this->_data['cateInfoArr'] = $this->Mcategorie->listAllCate();
		$this->_data['title'] = 'Add a News';
		$this->_data['whatView'] = 'news/add_view';

		$this->load->view($this->_data['templatePath'],$this->_data);
	}
	public function edit(){
		$newsId = $this->uri->segment(4);
		$this->load->model('Mnews');

		$this->load->library('form_validation');
		$this->form_validation->set_rules('txttitle','News Title','required');
		$this->form_validation->set_rules('txtauthor','News Author','required');
		$this->form_validation->set_rules('txtinfo','News Info','required');
		$this->form_validation->set_rules('txtdetail','News Detail','required');
		if($this->form_validation->run() == TRUE){
			$updateData = array(
					'news_title'	=>	$this->input->post('txttitle'),
					'news_author'	=>	$this->input->post('txtauthor'),
					'news_info'		=>	$this->input->post('txtinfo'),
					'news_full'		=>	$this->input->post('txtdetail'),
					'cate_id'		=>	$this->input->post('cate-list'),
			);
			$flag = TRUE; // Không up hình hoặc up thành công thì TRUE
			if($_FILES['img']['name'] != ''){// ngta có chọn hình thì có tên
				$config['upload_path'] = 'uploads/main';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '2000';
				$config['max_width']  = '1920';
				$config['max_height']  = '1200';
				$this->load->library('upload', $config);
				if($this->upload->do_upload('img') == FALSE){// up thất bại
					$this->_data['error'] = $this->upload->display_errors();
					$flag = FALSE;
				}else{// up thành công
					$img = $this->upload->data();
					$updateData['news_img'] = $img['file_name'];
				}
			}
			if($flag == TRUE){
				$this->Mnews->updateNews($updateData,$newsId);
				$this->session->set_flashdata('flash_mess','Sửa tin thành công!');
				redirect(base_url().'admin/news');
			}
		}

		$this->_data['newsInfo'] = $this->Mnews->getNewsById($newsId);

		$this->load->helper('menu');
		$this->load->model('Mcategorie');
		$this->_data['cateInfoArr'] = $this->Mcategorie->listAllCate();
		$this->_data['title'] = 'Edit a News';
		$this->_data['whatView'] = 'news/edit_view';

		$this->load->view($this->_data['templatePath'],$this->_data);
	}
}