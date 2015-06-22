<?php require_once '\include/dal.php';?>
<?php
session_start(); 
if(isset($_SESSION["user_id"]) && isset($_POST["subject"])&& isset($_POST["content"])&& isset($_POST["taskType"])){
	$userId=$_SESSION['user_id'];
	 $subject=$_POST['subject'];
	$content=$_POST['content'];
	$taskType=$_POST['taskType'];
	create_task ($userId , $subject ,$content,$taskType );
	
}
header("location: customer_	home.php");
?>
