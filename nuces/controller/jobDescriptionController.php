<?php require_once("../model/jobDescription_model.php") ?>
<?php

	 jobDescription();
?>

<?php

function jobDescription(){

		$total_jobs = $_SESSION['total_jobs'];
		for($i=1 ; $i<=$total_jobs; $i++ )
		{
			if(isset($_POST['jobDesc_btn'.$i]))  // if respective connection button is pressed
			{
				$job_id= $_POST['job'.$i];
				// echo '<script>alert("'.$job_id.'")</script>';
				$job_desc = jobDescription_model::showJobDescription($job_id);
				$_SESSION['job_desc'] = $job_desc;
				header("Location: ../view/jobDescription_view.php");
			}
		}
	
}

?>