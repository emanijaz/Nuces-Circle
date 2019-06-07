<?php require_once("../model/users_model.php") ?>
<?php

	//if ($_REQUEST["action"] == "search"){
		Login();
	//}
	
?>


<?php

	function Login(){
	//	echo "login controller called";

		$pw = $_POST['password'];
		$email = $_POST['email'];
		if ( isset($email) && isset($pw) ){

		$result=users_model::login($email,$pw);
		if($result=="Success")
		{
			header("Location: ../controller/newsFeedController.php");
			
		}
		
		else  // login not successful
		{
			
			$errorMessage = "'invalid email or password'";
			header("Location: ../view/index.php?error=" . $errorMessage );
		}
			
		



		}
		
	}

	

?>


