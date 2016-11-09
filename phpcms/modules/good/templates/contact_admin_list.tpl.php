<?php  
	defined('IN_ADMIN') or exit('No permission resources.'); 
	include $this->admin_tpl('header', 'admin');
?>
<style type="text/css">
	.lists{ padding: 0 50px; }
	.lists h3{ height: 28px; line-height: 28px; font-size: 16px; font-weight: normal; margin-top: 10px;}
	.lists h3 span{ color:#be0900; padding-right: 20px; }
	.lists h3 i{ font-size: 14px; padding-left: 20px; }
	.lists h3 em{ font-size: 12px; padding-left: 20px;  color:#666;}
	.lists p{ padding-left: 30px; line-height: 26px; padding-bottom: 20px; border-bottom: 1px solid #efefef;}
</style>
<?php
	$str = '<div class="lists">';
	foreach($result as $k=>$v){
		$k++;
		$str.="<h3><span>$k</span>$v[name]<i>$v[email]</i><em>$v[inputtime]</em></h3>";
		$str.="<p>$v[content]</p>";
	}
	$str.='</div>';
	echo $str;

?>