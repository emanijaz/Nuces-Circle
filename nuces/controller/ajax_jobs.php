<?php require_once("../model/ajaxJobsData_model.php") ?>
<?php


		getJobsData();

?>


<?php


	function getJobsData(){


	$results= ajaxJobsData_model::getjobs();
	for($i=0; $i<count($results['data_title']); $i++){

		echo $results['data_title'][$i], '<br>';
		echo $results['data_tech'][$i], '<br>';

	}

		// foreach($results['data_title'] as $result) 
		// {
  //   		echo $result, '<br>';
		// }
		// foreach($results['data_tech'] as $result) 
		// {
  //   		echo $result, '<br>';
		// }
	}



?>