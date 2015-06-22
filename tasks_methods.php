<?php require_once 'include/dal.php';?>
<?php if(!isset($_SESSION)){session_start();} ?>
<?php //require_once('login/session.php');?>


<?php 
		
/************* htmlspecialchars ******************
/*htmlspecialchars($_GET["taskId"]);}
/*
****/



if(isset($_POST["order"]) && isset($_POST["taskId"]) && isset($_SESSION['user_id'])){ 
	
    switch($_POST["order"]){
        case "addMessage":
            if(isset($_POST["messageContent"])){

                return addMessageDB(    $_POST["taskId"], 
                                        $_SESSION['user_id'], 
                                        $_POST["messageContent"]);
            }else{
                //err message
                
            }
            break;

        case "updateTaskStatus":
            if(isset($_POST["status"])){		
		            update_task_status($_POST["taskId"],$_POST["status"]);
            }	
            else{
	            //err message
            }
            break;

        case "readMessages":
            echo get_Task_With_Messages($_POST["taskId"]);
            break;
        
        default:
            //err message


    }		


}else{
    //err message
    
}	
	

?>