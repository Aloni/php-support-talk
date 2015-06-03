
<?php require_once '/../include/dal.php';?>

	<?php
    session_start(); 
    if($_GET["logout"]=='1'){session_destroy();}

	if(isset($_POST["email"]) && isset($_POST["password"])){
		$email = $_POST["email"];
		$password = $_POST["password"];

        $loginValidation = array("id"=>"5", "name" => "Aric Levi", "user_type"=>"worker");//loginValidation($email, $password);

		if($loginValidation){
            //session_start();
            // Store Session Data
            $_SESSION['user_id']= $loginValidation["id"];
            $_SESSION['name']= $loginValidation["name"];
            $_SESSION['user_type']= $loginValidation["userType"];
            echo $_SESSION['user_id'];
            
		}
        else{
            echo "Invalid password or email";
        }
	}
    else{
            //echo "Wellcome";
        }


	?>


<?php
    session_start();
    
    if(isset($_SESSION['user_id'])){
        header("location: ../index.php");
        echo isset($_SESSION['user_id']);
    }
?>




<!DOCTYPE html>
<html>
<head>
    <link href="login-register.css" rel="stylesheet" type="text/css">
</head>
<body>
  

	<div id="login-tb" class="testbox">
	  <h1>Log-In</h1>

	  <form action="login.php" method="post">
		  <hr>


	  <input type="text" name="email" id="email" placeholder="Email" required/>
	  <input type="password" name="password" id="password" placeholder="Password" required/>

	   <!----p>By clicking login, you agree on our <a href="#">terms and condition</a>.</p>-->
	   <input type="submit" name="submit" id="submit" value="Log-In"/>
	  </form>
	   <a href="register.php" class="linkbttn">Register</a>
	</div>



</body>
</html>

