<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?>              <div class="col-md-4 content-right">
                 <div class="recent">
                     <h3>热点文章</h3>
                     <ul>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=0899f0626569b404e4c5a67c24b45181&action=position&posid=18&order=id+DESC&num=30\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'18','order'=>'id DESC','limit'=>'30',));}?>    
    <?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>    
                     <li><a href="<?php echo $val['url'];?>" title="<?php echo $val['title'];?>"><?php echo str_cut($val[title],22);?></a></li>
    <?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                     </ul>
                 </div>
                 <div class="comments">
                     <h3>关于作者</h3>
                     <ul>
                     <wb:follow-button uid="3172292581" type="red_3" width="100%" height="24" ></wb:follow-button>
                     </ul>
                 </div>
                 <div class="clearfix"></div>
              </div>