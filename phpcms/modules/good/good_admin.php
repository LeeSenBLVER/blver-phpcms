<?php  
	defined('IN_PHPCMS') or exit('No permission resources.');
	pc_base::load_app_class('admin','admin',0);
	class good_admin extends admin{
		private $db;
		public function __construct(){
			$this->db = pc_base::load_model('good_model');
		}
		public function init(){
			$result = $this->db->select();
			include $this->admin_tpl('good_admin_list');
		}
	}
?>