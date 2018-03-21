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

		public function setMenu($menu){
			foreach($menu as $v){
				$this->_data[$v['cate_parent']][] = $v;
			}
		}
		public function callMenu($id_dang_echo=0){
			if(isset($this->_data[$id_dang_echo])){
				$this->_result .= $this->_open;
				foreach($this->_data[$id_dang_echo] as $k => $v){				
					if(isset($this->_data[$v['cate_id']])){ // Nếu cái hiện tại có con thì k chuyển link
						$this->_result .= $this->_openitem."<a class='link' href='javascript:void(0)'>$v[cate_title]</a>";
					}else{
						$CI =& get_instance();
						$CI->load->helper('seourl');
						$urlCateTitle = unicode($v['cate_title']);
						$this->_result .= $this->_openitem."<a href='".$this->_baseurl."/$v[cate_id]-$urlCateTitle.htm'>$v[cate_title]</a>";
					}
					$this->callMenu($v['cate_id']);
					$this->_result .= $this->_closeitem;				
				}
				$this->_result .= $this->_close;
			}
			return $this->_result;
		}
	}
?>