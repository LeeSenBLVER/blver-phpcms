<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("blverlayout","top"); ?>
<?php include template("blverlayout","header"); ?>
<?php
	if($_POST['name']){
		echo 'FUCK';
	}
?>
<div class="contact-content">
	 <div class="container">
		     <div class="contact-info">
				 <h2>联系作者</h2>
				 <p>向作者提出建议和意见。（您的个人信息将会严格保密）</p>
		     </div>
			 <div class="contact-details">				 
				 <form>
					 <input type="text" placeholder="姓名" id="name" required/>
					 <input type="text" placeholder="邮箱地址" id="email" required/>
					 <textarea placeholder="向作者提出建议和意见" id="content"></textarea>
					 <input type="submit" value="提交" id="submit" />
				 </form>
			  </div>
		  <div class="contact-details">
<!-- 			  <div class="col-md-6 contact-map">
				 <h4>FIND US HERE</h4>
				 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d803187.8113675824!2d-120.11910914056458!3d38.15292455846902!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb9fe5f285e3d%3A0x8b5109a227086f55!2sCalifornia%2C+USA!5e0!3m2!1sen!2sin!4v1423829283333" frameborder="0" style="border:0"></iframe>
			  </div>
			  <div class="col-md-6 company_address">		 
					<h4>GET IN TOUCH</h4>
					<p>500 Lorem Ipsum Dolor Sit,</p>
					<p>22-56-2-9 Sit Amet, Lorem,</p>
					<p>USA</p>
					<p>Phone:(00) 222 666 444</p>
					<p>Fax: (000) 123 456 78 0</p>
					<p>Email: <a href="mailto:info@example.com">info@mycompany.com</a></p>
					<p>Follow on: <a href="#">Facebook</a>, <a href="#">Twitter</a></p>
			 </div>
 -->			  <div class="clearfix"></div>
	     </div>		 


			 
	 </div>
</div>
<script type="text/javascript">
	$(function(){
		$('#submit').on('click', function(){
			var formdata = {};
			formdata.name = $('#name').val();
			formdata.email = $('#email').val();
			formdata.content = $('#content').val();
			formdata.inputtime = Date.parse(new Date());
			$.ajax({
				type : 'POST',
				url : '/getcontact.php',
				data : formdata,
				beforeSend : function(){
					if(formdata.name == ''){
						layer.msg('请输入您的姓名');
						return false;
					}else if(formdata.email == ''){
						layer.msg('请输入您的联系邮箱');
						return false;
					}else if(formdata.content == ''){
						layer.msg('请输入留言内容');
						return false;
					}
				},
				complete : function(){

				},
				success : function(){
					layer.msg('感谢您的反馈 :)')
				},
				error : function(){

				}
			})
			return false;
		})
	})
</script>
<?php include template("blverlayout","footer"); ?>	
