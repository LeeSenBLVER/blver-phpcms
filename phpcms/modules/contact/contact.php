<?php 
	defined('IN_PHPCMS') or exit('No permission resources.'); 
	class contact{
		private $db;
		function __construct(){
			$this->db = pc_base::load_model('contact_model');
		}
		public function init(){
			$result = $this->db->select();
			var_dump($result);
		}
		public function show(){
			$var = 'go die';
			echo $var;
		}
	}
?>
