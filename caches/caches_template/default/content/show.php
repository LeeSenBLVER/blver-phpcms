<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("blverlayout","top"); ?>
<?php include template("blverlayout","header"); ?>
<style type="text/css">
	.good{ width: 30px; height: 33px; margin: 40px auto 0; background:url(/statics/blver/images/ic_vote_checked.png) no-repeat; position: relative;}
	.good.flag{ background:url(/statics/blver/images/ic_vote_normal.png) no-repeat;}
	.good>a{ display: block; width: 30px; height: 33px; }
	#count-good{ position: absolute; left: 33px; top: 6px; color: #b3abab;}
</style>
<div class="single">
	 <div class="container">
		  <div class="col-md-8 single-main">				 
			  <div class="single-grid">
			  <div class="content-form">
			  	<h3><?php echo $title;?></h3>
			  	<p class="content-description"><a href="<?php echo $CATEGORYS[$catid]['url'];?>"><?php echo $CATEGORYS[$catid]['catname'];?></a> / <?php echo $inputtime;?> / 阅读：<span id="hits"></span>
<script language="JavaScript" src="<?php echo APP_PATH;?>api.php?op=count&id=<?php echo $id;?>&modelid=<?php echo $modelid;?>"></script></p>
			  </div>
			  		
					<?php echo $content;?>
			  </div>
			  <div class="good"><a href="#" id="good" data-id="<?php echo $id;?>"></a><span id="count-good"></span></div>
			  <script>
			  	$(function(){
		  			var info = {};
		  			info.status = 0;
		  			info.id = $('#good').data('id');
		  			function sendajax(){
		  				var ms = info;
			  			$.ajax({
			  				type : 'post',
			  				url : '/index.php?m=good&c=good&a=good',
			  				data : ms,
			  				dataType : 'JSON',
			  				success : function(data){
			  					replaceajax(data);
			  				},
			  				error : function(err){
			  					console.log('error');
			  				}
			  			});
		  			}
		  			function replaceajax(data){
		  				if(data.flag == 0){
		  					$('#good').parent('.good').removeClass('flag');
		  				}else if(data.flag == 1){
		  					$('#good').parent('.good').addClass('flag');
		  				}
		  				$('#count-good').html(data.count);
		  			}
		  			sendajax();
			  		$('#good').on('click', function(){
			  			info.status = 1;
			  			sendajax();
			  			return false;
			  		});
			  	})
			  </script>
			 <!--PC版-->
<div id="SOHUCS" sid="<?php echo $catid;?>_<?php echo $id;?>"></div>
<script charset="utf-8" type="text/javascript" src="http://changyan.sohu.com/upload/changyan.js" ></script>
<script type="text/javascript">
window.changyan.api.config({
appid: 'cysFNkHud',
conf: 'prod_1246ffbf55ddc24e5d4cdc319f1266ef'
});
</script>

		  </div>

<?php include template("blverlayout","sidebar"); ?>
			  <div class="clearfix"></div>
		  </div>
	  </div>
<?php include template("blverlayout","footer"); ?>
