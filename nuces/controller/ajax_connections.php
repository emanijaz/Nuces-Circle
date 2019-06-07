<?php require_once("../model/ajaxConnectionsData_model.php") ?>
<?php


		getConnData();

?>


<?php


	function getConnData(){


	$results= ajaxConnectionsData_model::getConn();
	// echo '<script>alert("no of rows are in controller : '.count($results['data_name']).'")</script>';
	for($i=0; $i<count($results['data_name']); $i++){

		echo $results['data_name'][$i], '<br>';
		echo $results['data_headline'][$i], '<br>';
		echo $results['data_Grad'][$i], '<br>';

	}

	}



?>