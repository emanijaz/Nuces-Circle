<?php require_once("../model/users_model.php") ?>
<?php

	//if ($_REQUEST["action"] == "search"){
		Signup();
	//}
	
?>


<?php

	function Signup(){
		// echo '<script>alert('"in Signup"')</script>';

		if(isset($_POST['sign_btn']))
		{

			$pw = $_POST['password'];
			$email = $_POST['email'];
			$fname = $_POST['fname'];
			$lname =  $_POST['lname'];

			$result=users_model::register($fname, $lname, $email, $pw);
			echo '<script>alert("'.$result.'")</script>';
			if($result == 'sign up successful'){
				$signup['successful']=$result;
				$_SESSION['email'] = $email; 
				$successMessage = "'Signup successful'";
				header("Location: ../controller/newsFeedController.php?error=" . $successMessage );

			}
			else{ // already registered 
					echo '<script>alert("user already exist")</script>';
					$errorMessage = "'Email already exist. Enter another email!'";
					header("Location: ../view/index.php?error=" . $errorMessage );
			}
			
			
			
		}


	}

?>


