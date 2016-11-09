<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE HTML xmlns:wb="http://open.weibo.com/wb">
<html>
<head>
	<title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
	<link href="/statics/blver/css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="/statics/blver/css/style.css" rel='stylesheet' type='text/css' />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="<?php echo $SEO['keyword'];?>" />
	<meta name="description" content="<?php echo $SEO['description'];?>">

	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!----webfonts---->
		<link href='http://fonts.googleapis.com/css?family=Oswald:100,400,300,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,300italic' rel='stylesheet' type='text/css'>
		<!----//webfonts---->
		  <script src="/statics/js/jquery-1.11.3.min.js"></script>
		<!--end slider -->
		<!--script-->
<script type="text/javascript" src="/statics/blver/js/move-top.js"></script>
<script type="text/javascript" src="/statics/blver/js/easing.js"></script>
<script type="text/javascript" src="/statics/layer/layer.js"></script>
<!--/script-->
<script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
<!---->
<style>
	.WB_follow_ex .follow_text{width:40px!important;}
</style>
</head>
<body>