

<?php require_once 'include/dal.php';?>
<?php if(!isset($_SESSION)){session_start();} ?>
<?php //require_once('login/session.php');?>


		<?php 
		/*if(!empty($_GET["taskId"])){$taskId = htmlspecialchars($_GET["taskId"]);}
			else {$taskId = 1;}


	
	
		

	
	*/
	
      
			
		if(isset($_POST["order"]) and $_POST["order"] == "readMessages" and isset($_POST["taskId"])){
			echo get_Task_With_Messages($_POST["taskId"]);
		}
		else{	
			echo"{}";
		}
	
//	
		
		if(isset($_SESSION['user_id']) and isset($_POST["order"]) and $_POST["order"] == "addMessage" and isset($_POST["taskId"]) and isset($_POST["messageContent"]))
		{
				addMessageDB($_POST["taskId"], $_SESSION['user_id'], $_POST["messageContent"]);
				//echo "ADD";
		}	
		else{
			//echo "ERR";
		}
		
	
		if(isset($_SESSION['user_id']) and isset($_POST["order"]) and $_POST["order"] == "addMessage" and isset($_POST["taskId"]) and isset($_POST["messageContent"]))
		{
				addMessageDB($_POST["taskId"], $_SESSION['user_id'], $_POST["messageContent"]);
				//echo "ADD";
		}	
		else{
			//echo "ERR";
		}
		

			/*
		if(isset($_POST["order"]) and $_POST["order"] == "updateTaskStatus" and isset($_POST['taskId']) and isset($_POST["status"]))
		{
				update_task_status($_POST["taskId"], $_POST["status"]);
				//echo "ADD";
		}	
		else{
			//echo "ERR";
		}
	
	*/
	
	
	

?>