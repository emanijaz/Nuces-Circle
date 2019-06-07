<?php require_once("../model/sendRequest_model.php") ?>
<?php
if(!isset($_SESSION))  
    { 

        session_start(); 
    } 
?>
<?php


		 sendRequest();

?>

<?php


	function sendRequest(){
		$num_recomm = $_SESSION['num_recomm'];
	//	echo $num_recomm;
		//$result=showConnection_model::getConnection();
		for($i=0 ; $i<$num_recomm; $i++ ){
			if(isset($_POST[$i]))  // if respective connection button is pressed
			{
			//	echo $i;
				$send_to = $_POST['email_recomm'.$i];
				$result = sendRequest_model::addPending($send_to);
				$Message = "'".$result."'";
					echo '<script>alert("'.$result.'")</script>';
				//	break;

					header("Location: ../controller/showConnectionController.php?msg=" . $Message );
			}
		}
		
		//echo '<script>alert("im in send request controller")</script>';
	
		// 


		}

	
?>