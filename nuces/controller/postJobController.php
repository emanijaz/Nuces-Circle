<?php require_once("../model/postJob_model.php") ?>
<?php

	// echo "calling add_experience";
	 postJob();
?>

<?php

	// $myArray = json_decode($_POST['tags_array']);
	// echo '<script> alert("'.$myArray[0].'")</script>';
  
	function postJob(){

		if(isset($_POST['postJob_btn']))
		{

			$tags = array();
			$tags_count = 0;
			$title= $_POST['inputTitle'];
			$company = $_POST['inputCompany'];
			$city= $_POST['inputCity'];
			$state =  $_POST['inputState'];

			$zip =  $_POST['inputZip'];
			$empType =  $_POST['empType'];
			$senLevel =  $_POST['senLevel'];
			$discipline =  $_POST['inputDiscipline'];
			$experience =  $_POST['inputExp'];
			$desc =  $_POST['jobDescription'];
			$tags[$tags_count++] = $_POST['inputTags1'];
			$tags[$tags_count++] = $_POST['inputTags2'];
			$tags[$tags_count++] = $_POST['inputTags3'];
			$tags[$tags_count++] = $_POST['inputTags4'];

	// 		$myArray = json_decode($_POST['tags_array']);
	// echo '<script> alert("'.$myArray[0].'")</script>';
			
  			// $tag = $_POST['tag0'];
  			// echo '<script> alert("'.$tag.'")<script>';
			if(isset($title) && isset($company) && isset($city) && isset($state) && isset($zip) && isset($empType) && isset($senLevel)
			&& isset($discipline) && isset($experience) && isset($desc) && isset($tags))
			{
				$result=postJob_model::postJob($title, $company, $city, $state, $zip, $empType, $senLevel, $discipline, $experience, $desc, $tags );

				echo '<script>alert("'.$result.'")</script>';
				if($result == "Job posted successfully"){
					$successMessage = "'Job posted successfully";
					header("Location: ../controller/showRecruitingController.php?sucess=" . $successMessage);

				}
				else{ // record already exist
						$errorMessage = "'Job already posted.";
			header("Location: ../controller/showRecruitingController.php?error=" . $errorMessage );

				}

			}
			else
			{
				$errorMessage = "'Please provide all fields'";
			header("Location: ../controller/showRecruitingController.php?error=" . $errorMessage );
			}

			}



		}


?>