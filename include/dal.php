<?php

/**
 * Get DB connection
 *
 * @return PDO
 */
function getDbConnection()
{
	$dbUri  = 'mysql:host=localhost:3306;dbname=php_support_system';
	$dbUser = 'supportUser';
	$dbPass = 'kfs2015';
		
	// Connect, and set error mode to Exceptions
	$dbh = new PDO($dbUri, $dbUser, $dbPass, array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	));
    /*
    try {
        $dbh = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    */
	
	return $dbh;
}


/**
 * Get contacts list from DB
 *
 * Returns an array of the form (contact ID => contact name)
 *
 * @return array|null 
		(	Returns null in c	ase of database/sql error. 
			Returns an empty array if no contacts exist.	)
 */
function get_all_customers()
{
    $dbh = getDbConnection();
	$sql = "SELECT u.*, SUM(if(t.status != 'closed', 1, 0)) tasksNum
			FROM users u
			LEFT JOIN tasks t
			ON u.id = t.userId
			WHERE u.userType = 'customer' 
			group by u.id
			ORDER BY tasksNum DESC, u.name";
    $stmt = $dbh->prepare($sql);
 
	if ($stmt->execute()){
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		/*
		foreach($result as $data){
			$customersList[] = $data;
		}*/
		if (isset($customersList)){return $customersList;}
		else {return $result;}

	}
	else{
		return null;
	}
}



function get_all_Open_Tasks($customerId){
	
	if(!is_numeric($customerId)){
		$customerId = -1;
	};

	//--tasks.status NOT LIKE '%closed%' and
    $dbh = getDbConnection();
	$sql = "SELECT tasks.taskType , tasks.subject , tasks.content ,  tasks.creationDate , tasks.status, tasks.id taskId, if(tasks.status NOT LIKE '%closed%',1,0) AS sortOrder
			FROM users JOIN tasks 
			ON users.id = tasks.userId
			where tasks.userId = ?
			ORDER BY sortOrder DESC, tasks.creationDate DESC"	
			;

			
    $stmt = $dbh->prepare($sql);
 
	if ($stmt->execute(array($customerId))){
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if (isset($customersList1)){return $customersList1;}
		else {return $result;}

	}
	else{
		return null;
	}
}




function get_Task_With_Messages($taskId){
	
	if(!is_numeric($taskId)){
		$taskId = -1;
	};

	$dbh = getDbConnection();
	
	$sql1 = "SELECT tasks.taskType , tasks.subject, tasks.content, tasks.creationDate, tasks.status, users.id, users.name
			FROM users JOIN tasks 
			ON users.id = tasks.userId
			where tasks.Id = ?";

	$sql2 = "SELECT m.*, u.* 
			FROM messages m JOIN users u
			ON u.id = m.userId 
			where m.taskId = ?";
			
		
    $stmt1 = $dbh->prepare($sql1);
    $stmt2 = $dbh->prepare($sql2);

 
	if ($stmt1->execute(array($taskId))){
		$result1 = $stmt1->fetch(PDO::FETCH_ASSOC);
		if(!empty($result1)){
			if ($stmt2->execute(array($taskId))){
				$result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);}
			else{$result2 = array();}	
			
			$finalResult = array_merge($result1, array("messages" => $result2));
			return json_encode($finalResult);//, JSON_PRETTY_PRINT);
		}

	}
	
	//else:
	return null;
}



function loginValidation($email, $password){
	
	$dbh = getDbConnection();
	$sql = "SELECT u.id, u.name ,u.userType, u.password
			FROM users u
			where u.email = '" . $email ."'";

			
    $stmt = $dbh->prepare($sql);
 
	if ($stmt->execute()){
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
	}
	if(!empty($result)& password_verify($password, $result['password'])){
		unset($result['password']);
		;return $result;
	} 
	else {
		return false;
	}
    
}







function registerInDB($name, $email, $password, $phone){

	//$email= strtolower($email);

$dbh = getDbConnection();        
    $password = password_hash($password, PASSWORD_DEFAULT);
    $userType = 'customer';
$stmt = $dbh->query("insert into users (name, email,phone , password , userType) values ('$name','$email','$phone','$password','$userType')");
    if(!empty($stmt)){
        return TRUE;} 
        else {
            return FALSE;}
}



function addMessageDB($taskId, $userId, $messageContent){

	$dbh = getDbConnection();        
		
	$stmt = $dbh->query("insert into messages (taskId, userId, messageContent) values ('$taskId','$userId','$messageContent')");
		if(!empty($stmt)){
			return TRUE;} 
			else {
				return FALSE;}
}


function create_task ($userId , $subject ,$content,$taskType ){
$dbh = getDbConnection(); 
$stmt = $dbh->query("insert into tasks (taskType, userId, subject , content ) values ('$taskType','$userId','$subject','$content' )");
	   if(!empty($stmt)){
        return TRUE;} 
        else {
            return FALSE;}


}



function update_task_status($taskId, $status)
{	
    $dbh = getDbConnection();
	$sql = 	"UPDATE tasks SET status=? WHERE Id= ?";
    $stmt = $dbh->prepare($sql);
	
	if ($stmt->execute(array($status, $taskId))){
		return true;
	}
	else{
		return false;
	}	
}


