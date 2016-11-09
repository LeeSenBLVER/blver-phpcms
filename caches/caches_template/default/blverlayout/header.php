<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!---header---->			
<div class="header">  
	 <div class="container">
		  <div class="logo">
			  <a href="index.html"><img src="/statics/blver/images/logo.jpg" title="" /></a>
		  </div>
			 <!---start-top-nav---->
			 <div class="top-menu">
				 <div class="search">
					 <form id="myForm" action="/index.php" method="get" target="_blank">
				        <input type="hidden" name="m" value="search"/>
		                <input type="hidden" name="c" value="index"/>
		                <input type="hidden" name="a" value="init"/>
		                
		                <input type="hidden" name="typeid" value="53" id="typeid"/>
		                <input type="hidden" name="siteid" value="<?php echo $siteid;?>" id="siteid"/>
		                <input  name="q" type="text" class="text" id="search" placeholder="键入你感兴趣的内容" />
		                <input type="submit" class="btn" id="submit-search" name="submit" value="" />

					</form>
				<script type="text/javascript">
				$(document).ready(function(){
						function delHtmlTag(str)
						{
						        var str=str.replace(/<\/?[^>]*>/gim,"");//去掉所有的html标记
						        var result=str.replace(/(^\s+)|(\s+$)/g,"");//去掉前后空格
						        return  result.replace(/\s/g,"");//去除文章中间空格
						}
				      $("#submit-search").on("click",function(){
				      		var con = delHtmlTag($('#search').val());
							if(con == ''){
								layer.msg('请输入搜索内容');
						 	return false;
							}
						});
				});
				</script>
				 </div>
				  <span class="menu"> </span> 
 					<ul>
 						<li <?php if(!$catid) { ?>class="active"<?php } ?>><a href="<?php echo APP_PATH;?>">首页</a></li>
 						<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=f2bf86d34a88456084103ae33f14c8b0&action=category&num=8&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'8',));}?>
					      <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
					                     <li <?php if($catid==$r[catid]) { ?>class="active"<?php } ?>><a href="<?php echo $r['url'];?>"><span><?php echo $r['catname'];?></span></a></li>     
					      <?php $n++;}unset($n); ?>
					    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
 						<div class="clearfix"> </div>
 					</ul>
			 </div>
			 <div class="clearfix"></div>
					<script>
					$("span.menu").click(function(){
						$(".top-menu ul").slideToggle("slow" , function(){
						});
					});
					</script>
				<!---//End-top-nav---->					
	 </div>
</div>
<!--/header-->