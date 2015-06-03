<?php

class DbConnectionTEST{
	
	/**
	 * Get DB connection
	 *
	 * @return PDO
	 */
	public static function connect()
	{
		$dbUri  = 'mysql:host=127.0.0.1;dbname=php_support_system';
		$dbUser = 'root';
		$dbPass = '';
		// Connect, and set error mode to Exceptions
		$dbh = new PDO($dbUri, $dbUser, $dbPass, array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		));
		
		return $dbh;
	}

}

/**
 * Get DB connection
 *
 * @return PDO
 */
function getDbConnection()
{
	$dbUri  = 'mysql:host=127.0.0.1;dbname=php_support_system';
	$dbUser = 'root';
	$dbPass = '';
		
	// Connect, and set error mode to Exceptions
	$dbh = new PDO($dbUri, $dbUser, $dbPass, array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	));
	
	return $dbh;
}


/**
 * Get contacts list from DB
 *
 * Returns an array of the form (contact ID => contact name)
 *
 * @return array|null 
		(	Returns null in case of database/sql error. 
			Returns an empty array if no contacts exist.	)
 */
function get_all_customers()
{
    $dbh = getDbConnection();
	$sql = "SELECT u.*, count(t.status) tasksNum
			FROM users u
			LEFT JOIN tasks t
			ON u.id = t.userId
			WHERE u.userType = 'customer' AND NOT(t.status='closed')
			group by u.id
			ORDER BY t.status, u.name";
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

	
    $dbh = getDbConnection();
	$sql = "SELECT tasks.taskType , tasks.subject , tasks.content ,  tasks.creationDate , tasks.status, tasks.id taskId
			FROM users JOIN tasks 
			ON users.id = tasks.userId
			where tasks.status NOT LIKE '%closed%'
			and tasks.userId = " . $customerId;

			
    $stmt = $dbh->prepare($sql);
 
	if ($stmt->execute()){
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
			where tasks.Id = " . $taskId;

	$sql2 = "SELECT m.*, u.* 
			FROM messages m JOIN users u
			ON u.id = m.userId 
			where m.taskId = " . $taskId;
			
		
    $stmt1 = $dbh->prepare($sql1);
    $stmt2 = $dbh->prepare($sql2);

 
	if ($stmt1->execute()){
		$result1 = $stmt1->fetch(PDO::FETCH_ASSOC);
		if(!empty($result1)){
			if ($stmt2->execute()){
				$result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);}
			else{$result2 = array();}	
			
			$finalResult = array_merge($result1, array("messages" => $result2));
			return json_encode($finalResult, JSON_PRETTY_PRINT);
		}

	}
	
	//else:
	return null;
}


function loginValidation($email, $password){
	$password = password_hash($password, PASSWORD_DEFAULT);
	
	$dbh = getDbConnection();
	$sql = "SELECT u.id, u.name ,u.userType
			FROM users u
			where u.password = '" . $password . "' and u.email = '" . $email ."'";

			
    $stmt = $dbh->prepare($sql);
 
	if ($stmt->execute()){
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
	}
	if(!empty($result)){return $result;} else {return false;}
    
}




function registerInDB($name, $email, $password, $phone){

	$email= strtolower($email);

        
    $password = password_hash($password, PASSWORD_DEFAULT);
    $userType = 'customer';

	$stmt = $dbh->query("insert into users (name, email,phone_num , password , userType) values ('$name','$email','$phone','$password','$userType')");
    if(!empty($stmt)){
        return TRUE;} 
        else {
            return FALSE;}
}


//var_dump(loginValidation("cohen@gmail.com","1234"));

//$hash = '$1$toHVx1uW$KIvW9yGZZSU/1YOidHeqJ/';

/*if (password_verify('rasmuslerdorf', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}

// Output: Password is valid!




//var_dump(get_Task_With_Messages(1));
//var_dump(json_decode(get_Task_With_Messages(1)));
//print_r (get_Task_With_Messages(1));
*/
//var_dump(get_Task_With_Messages(1));