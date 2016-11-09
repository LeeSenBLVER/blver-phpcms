<?php 
	$catid = $_POST['catid'];
	$con = mysqli_connect("bdm25184096.my3w.com","bdm25184096","a123456789");
	mysqli_select_db($con,"bdm25184096_db");
	mysqli_query($con,"set names 'utf8'");
	$dataname = "my_contact";
	$name = strip_tags($_POST['name']);
	$email = strip_tags($_POST['email']);
	$content = strip_tags($_POST['content']);
	$inputtime = strip_tags($_POST['inputtime']);
	$sql = "INSERT INTO ".$dataname."(name,email,content,inputtime) VALUES('".$name."','".$email."','".$content."','".$inputtime."')";
	mysqli_query($con, $sql);
	exit;
 ?>