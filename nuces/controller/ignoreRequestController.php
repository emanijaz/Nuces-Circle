<?php require_once("../model/ignoreRequest_model.php") ?>
<?php
if(!isset($_SESSION))  
    { 

        session_start(); 
    } 
?>
<?php


		 ignoreRequest();

?>

<?php


	function ignoreRequest(){

		$num_requests = $_SESSION['num_requests'];
	//	echo $num_recomm;
		//$result=showConnection_model::getConnection();
		for($i=0 ; $i<$num_requests; $i++ ){
			if(isset($_POST['ignore_btn'.$i]))  // if respective connection button is pressed
			{
			//	echo $i;
				$request_from = $_POST['email_ignore'.$i];
				$result = ignoreRequest_model::removePending($request_from);
				
					echo '<script>alert("'.$result.'")</script>';
				//	break;

					header("Location: ../controller/showConnectionController.php");
			}
		}
		
	}
?>