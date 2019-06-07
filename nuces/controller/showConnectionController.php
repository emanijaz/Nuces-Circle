<?php require_once("../model/showConnection_model.php") ?>
<?php

	getConnectionsContent();

?>

<?php


	function getConnectionsContent(){

		$result=showConnection_model::getConnection();

		// echo $result->num_rows;
		$_SESSION['connection'] = $result;
	
		header("Location: ../view/connections_view.php");


		}

	
?>