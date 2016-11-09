<?php 
	defined('IN_PHPCMS') or exit('No permission resources.'); 
	class good{
		private $db;
		function __construct(){
			$this->db = pc_base::load_model('good_model');
		}
		public function init(){
			//$result = $this->db->select();
		}
		public function good(){
			$json = array();
			pc_base::load_app_func('global');
			$ip = ip();
			$newsid = $_POST['id'];
			$status = $_POST['status'];
			$userinfo = [];
			$userinfo['newsid'] = $_POST['id'];
			$userinfo['ip'] = $ip;
			$this->good_db = pc_base::load_model('good_model');
			$info = $this->good_db->select($where=" newsid = '$newsid' AND ip = '$ip' ",$data = '*',$sql);
			$num = count($info);
			if($status == 1 && $num > 0){
				$this->good_db->delete($where=" newsid = '$newsid' AND ip = '$ip' ");
				$json['flag'] = 0;
			}elseif($status == 1 && $num == 0){
				$this->good_db->insert($userinfo, array('newsid'=>'$newsid'));
				$json['flag'] = 1;
			}
			if($status == 0 && $num > 0){
				$json['flag'] = 1;
			}elseif($status == 0 && $num == 0){
				$json['flag'] = 0;
			}
			$more = $this->good_db->select($where=" newsid = '$newsid' ",$data = '*',$sql);
			$total = count($more);
			$json['count'] = $total;
			echo json_encode($json);
		}
	}
?>
