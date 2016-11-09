<?php  
	defined('IN_PHPCMS') or exit('No permission resources.');
	pc_base::load_app_class('admin','admin',0);
	class contact_admin extends admin{
		private $db;
		public function __construct(){
			$this->db = pc_base::load_model('contact_model');
		}
		public function init(){
			$result = $this->db->select();
			include $this->admin_tpl('contact_admin_list');
		}
	}
?>