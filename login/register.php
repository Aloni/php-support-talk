<?php require_once '/../include/dal.php';?>


<?php
if (isset($_POST['name'])&& isset($_POST['email'])&& isset($_POST['phone'])&&isset($_POST['password'])){    
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone_num'];
    $password = $_POST['password'];

    $success= registerInDB($name, $email, $password, $phone);
    if($success){
        header("location: login/login.php");
    }
    else{
        echo "Invalid email"
    }
}
?>





<!DOCTYPE html>
<html>
    <head>
        <link href="login-register.css" rel="stylesheet" type="text/css">
    </head>
    <body>
  

        <div id="register-tb" class="testbox">
          <h1>Registeration</h1>

          <form action="#" method="POST">
	        <hr>
          <input type="text" name="name" id="name" placeholder="Name" required/>
          <input type="text" name="email" id="email" placeholder="Email" required/>
          <input type="text" name="phone" id="phone" placeholder="Phone" required/>
          <input type="password" name="password" id="password" placeholder="Password" required/>

           <!--p>By clicking Register, you agree on our <a href="#">terms and condition</a>.</p-->
           <input type="submit" name="submit" id="submit" value="Register" />
          </form>
           <a href="login.php" class="linkbttn">Log-In</a>
        </div>


    </body>
</html>
