<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("blverlayout","top"); ?>
<?php include template("blverlayout","header"); ?>
<!--main-->
<div class="content">
     <div class="container">
         <div class="content-grids">
             <div class="col-md-8 content-main">
                 <div class="content-grid">
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=03cb09fe5748b4ea16bf635027b3c01a&action=lists&catid=%24catid&order=id+DESC&num=20\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$catid,'order'=>'id DESC','limit'=>'20',));}?>    
    <?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>    
                     <div class="content-grid-info">
                         <?php if($val[thumb] != '') { ?><a href="<?php echo $val['url'];?>" title="<?php echo $val['title'];?>"><img src="<?php echo $val['thumb'];?>" alt="<?php echo $val['title'];?>"/></a><?php } ?>
                         <div class="post-info">
                         <h4><a href="<?php echo $val['url'];?>"><?php echo $val['title'];?></a>  <?php echo date("Y-m-d H:i:s ",$val[inputtime]);?> </h4>
                         <p><?php echo $val['description'];?></p>
                         <a href="<?php echo $val['url'];?>"><span></span>了解更多</a>
                         </div>
                     </div>
    <?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                 </div>
              </div>
              <!-- 右侧的栏目 -->
<?php include template("blverlayout","sidebar"); ?>
              <div class="clearfix"></div>
          </div>
      </div>
</div>
<?php include template("blverlayout","footer"); ?>