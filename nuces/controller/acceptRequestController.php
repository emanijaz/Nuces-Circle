<?php require_once("../model/acceptRequest_model.php") ?>
<?php
if(!isset($_SESSION))  
    { 

        session_start(); 
    } 
?>
<?php


		 acceptRequest();

?>

<?php


	function acceptRequest(){

		$num_requests = $_SESSION['num_requests'];
	//	echo $num_recomm;
		//$result=showConnection_model::getConnection();
		for($i=0 ; $i<$num_requests; $i++ ){
			if(isset($_POST['accept_btn'.$i]))  // if respective connection button is pressed
			{
			//	echo $i;
				$request_from = $_POST['email_accept'.$i];
				$result = acceptRequest_model::addConnections($request_from);
				
					echo '<script>alert("'.$result.'")</script>';
				//	break;

					header("Location: ../controller/showConnectionController.php");
			}
		}
		
	}
?>