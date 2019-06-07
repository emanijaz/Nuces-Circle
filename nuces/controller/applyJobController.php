<?php require_once("../model/applyJob_model.php") ?>
<?php

	 applyJob();
?>

<?php

function applyJob(){


	$total_jobs = $_SESSION['total_jobs'];
		for($i=1 ; $i<=$total_jobs; $i++ )
		{
			echo "inside  for loop controller";
			if(isset($_POST['applyJob_btn'.$i]))  // if respective connection button is pressed
			{

				echo "inside controller";

				$job_id= $_POST['job'.$i];
				$msg = applyJob_model::applyJob($job_id);
				header("Location: ../view/recruiting_view.php?msg=" . $msg);
			}
		}

}