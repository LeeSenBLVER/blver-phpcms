<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("blverlayout","top"); ?>
<?php include template("blverlayout","header"); ?>
<!--main-->
<div class="content">
     <div class="container">
         <div class="content-grids">
             <div class="col-md-8 content-main">
                 <div class="content-grid">
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=cf1701802d88bb617938667aad4056a9&sql=SELECT+%2A+from+my_lists+where+status%3D99+and+catid+in%289%2C10%2C11%2C12%2C13%2C14%2C15%29+order+by+id+DESC&num=20&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * from my_lists where status=99 and catid in(9,10,11,12,13,14,15) order by id DESC LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
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
