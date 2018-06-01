<?php
	if( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Menu{
		protected $_open = "<ul class='sub-menu'>";
		protected $_close = "</ul>";
		protected $_openitem = "<li>";
		protected $_closeitem = "</li>";

		protected $_baseurl;

		protected $_data;
		protected $_result = '';

		// public function __construct($config=''){
		// 	if($config != ''){
		// 		$this->setOpen($config['open']);
		// 		$this->setClose($config['close']);
		// 		$this->setOpenitem($config['openitem']);
		// 		$this->setCloseitem($config['closeitem']);
		// 		$this->setBaseurl($config['baseurl']);
		// 	}
		// }
		public function __construct($config=''){
			if($config != ''){
				$this->setOption($config);
			}
		}

		/*
		 * Ví dụ này để đọc lại code dễ hơn
		 * VD: ở MainController $config['baseurl'] = base_url().'news/viewCate';
		 * $k sẽ là 'baseurl', $v là base_url().'news/viewCate'
		 * $this->$method($v) <=> $this->setBaseurl(base_url().'news/viewCate')
		 */
		public function setOption($config){
			foreach($config as $k => $v){
				$method = "set".ucfirst($k);
				$this->$method($v);
			}
		}
		public function setOpen($tag){
			$this->_open = $tag;
		}
		public function setClose($tag){
			$this->_close = $tag;
		}
		public function setOpenitem($tag){
			$this->_openitem = $tag;
		}
		public function setCloseitem($tag){
			$this->_closeitem = $tag;
		}

		public function setBaseurl($url){
			$this->_baseurl = $url;
		}

		/*
		 * method setMenu sắp xếp lại theo cha - con:
		 * - $menu là 1 mảng các records
		 * - Mỗi record là 1 mảng có 3 key (3 fields): cate_id, cate_title, cate_parent
		 * - Việc của method này là sắp xếp lại thành mảng $this->_data chuyên mục được phân cấp theo cha - con
		 * - Được gọi ở MainController trước khi tạo ra $this->_data['menu'] để đổ menu trái
		 */
		public function setMenu($menu){
			foreach($menu as $v){
				$this->_data[$v['cate_parent']][] = $v;
			}
		}

		/*
		 * Method CallMenu tạo ra menu trái dựa vào kq mà setMenu đã tạo
		 * - Method này tạo ra cái thẻ ul, li lồng nhau
		 * - Và menu con sẽ có link
		 */
		public function callMenu($id_dang_echo=0){
			if(isset($this->_data[$id_dang_echo])){
				$this->_result .= $this->_open;
				foreach($this->_data[$id_dang_echo] as $k => $v){				
					if(isset($this->_data[$v['cate_id']])){ // Nếu cái hiện tại có con thì k chuyển link
						$this->_result .= $this->_openitem."<a class='link' href='javascript:void(0)'>$v[cate_title]</a>";
					}else{
						/*
						 * Do ko phải đang dùng helper trong controller
						 * Mà dùng trong library tự tạo
						 */
						$CI =& get_instance();
						$CI->load->helper('seourl');
						$urlCateTitle = unicode($v['cate_title']);
						// Chú ý: ở MainController đã setUrl như vậy
						// $config['baseurl'] = base_url().'news/viewCate';
						$this->_result .= $this->_openitem."<a href='".$this->_baseurl."/$v[cate_id]-$urlCateTitle.htm'>$v[cate_title]</a>";
					} // hết else
					// Gọi lại method
					$this->callMenu($v['cate_id']);
					$this->_result .= $this->_closeitem;				
				} // hết foreach
				$this->_result .= $this->_close;
			} // hết if
			return $this->_result;
		}
	}
?>