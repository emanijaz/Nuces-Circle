<?php

// defined('BASEPATH') OR exit('No direct script access allowed');

require_once("DataAccessHelper.php"); 
if(!isset($_SESSION))  
    { 
        session_start(); 
    } 



class postJob_model 
{ 

	public static function postJob($title, $company, $city, $state, $zip, $empType, $senLevel, $discipline, $experience, $desc, $tags)
	{
		$dbhandle=DataAccessHelper::getConnection();

		$email = $_SESSION['email'];
		$sql = "SELECT * FROM job WHERE jobTitle=? AND company=? AND city=? AND state=? AND zip=? AND employmentType=? AND seniorityLevel =? AND discipline=? AND experienceRequired=? AND jobDescription=?";

		$stmt = 	mysqli_stmt_init($dbhandle);

		if(!mysqli_stmt_prepare($stmt, $sql)){

			echo "SQL statement failed";
		}
		else{


			mysqli_stmt_bind_param($stmt, "ssssssssss", $title, $company, $city, $state, $zip, $empType, $senLevel, $discipline, $experience, $desc);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($result->num_rows > 0) {
				return "Job already posted";
			}
			else
			{
				$sql = "INSERT into job (id, jobTitle, company, city, state, zip, employmentType, seniorityLevel, discipline, experienceRequired, jobDescription,  logo, uemail) VALUES (?, ?, ?, ?, ?,?, ?,?,?, ?, ?, ?, ?)";
				$stmt = 	mysqli_stmt_init($dbhandle);

				if(!mysqli_stmt_prepare($stmt, $sql)){

					echo "SQL statement failed";
				}
				else{
					$auto_job = "";
					$job_logo = "logo";
					mysqli_stmt_bind_param($stmt, "sssssssssssss",$auto_job, $title, $company, $city, $state, $zip, $empType, $senLevel, $discipline, $experience, $desc ,$job_logo, $email);
					mysqli_stmt_execute($stmt);
					$sql = "SELECT * FROM job WHERE jobTitle=? AND company=? AND city=? AND state=? AND zip=? AND employmentType=? AND seniorityLevel =? AND discipline=? AND experienceRequired=? AND jobDescription=?";

					$stmt = 	mysqli_stmt_init($dbhandle);

					if(!mysqli_stmt_prepare($stmt, $sql)){

						echo "SQL statement failed";
					}
					else{


						mysqli_stmt_bind_param($stmt, "ssssssssss", $title, $company, $city, $state, $zip, $empType, $senLevel, $discipline, $experience, $desc);
						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);
						$row = mysqli_fetch_array($result);
						for($i = 0; $i<count($tags) ; $i++){

								$jobid = $row['id'] ;
								$tag = $tags[$i];

								if($tags[$i] != "" && $tags[$i] != "Choose..."){

									$sql = "SELECT * from jobTags where jid = ? AND tags = ? ";
									$stmt = 	mysqli_stmt_init($dbhandle);

									if(!mysqli_stmt_prepare($stmt, $sql)){

										echo "SQL statement failed";
									}
									else{

											mysqli_stmt_bind_param($stmt, "ss", $jobid, $tag);
											mysqli_stmt_execute($stmt);
											$result = mysqli_stmt_get_result($stmt);
											if ($result->num_rows > 0) {
												return "Tag already exist";
											}
											else
											{
												$sql = "INSERT into jobTags(jid, tags) VALUES (?,?)";
												$stmt = 	mysqli_stmt_init($dbhandle);

												if(!mysqli_stmt_prepare($stmt, $sql)){

													echo "SQL statement failed";
												}
												else{
													mysqli_stmt_bind_param($stmt, "ss", $jobid, $tag);
													mysqli_stmt_execute($stmt);
												}

											}
									}

									// $r = mysqli_query($dbhandle,"SELECT * from jobTags where jid = '$jobid' AND tags = '$tag'  ")or die("Failed to query database 4".mysqli_error($dbhandle));
									// if($r->num_rows <=0){
									
									// 	mysqli_query($dbhandle,"INSERT into jobTags(jid, tags) VALUES ('$jobid','$tag')")or die("Failed to query database 5".mysqli_error($dbhandle));
									// }
									
								}
								
						}


					}


				}


			}



		}





	// 	$result = mysqli_query($dbhandle,"SELECT * FROM job WHERE jobTitle='$title' AND company='$company' AND city='$city' AND state='$state' AND zip='$zip' AND employmentType='$empType' AND seniorityLevel ='$senLevel' AND discipline='$discipline' AND experienceRequired='$experience' AND jobDescription='$desc'") or die("Failed to query database 1".mysqli_error($dbhandle));

	// 	if($result->num_rows > 0){
	// 		return "Job already posted";
	// 	}
	// 	else{
	// 		mysqli_query($dbhandle,"INSERT into job (id, jobTitle, company, city, state, zip, employmentType, seniorityLevel, discipline, experienceRequired, jobDescription,  logo, uemail) VALUES ('', '$title', '$company', '$city', '$state','$zip', '$empType','$senLevel', '$discipline', '$experience', '$desc', 'logo', '$email')") or die("Failed to query database 2".mysqli_error($dbhandle));
	// 		$result = mysqli_query($dbhandle,"SELECT * FROM job WHERE jobTitle='$title' AND company='$company' AND city='$city' AND state='$state' AND zip='$zip' AND employmentType='$empType' AND seniorityLevel ='$senLevel' AND discipline='$discipline' AND experienceRequired='$experience' AND jobDescription='$desc' AND uemail = '$email'") or die("Failed to query database 3".mysqli_error($dbhandle)); 
	// 		$row=mysqli_fetch_array($result);

	// 		for($i = 0; $i<count($tags) ; $i++){

	// 			$jobid = $row['id'] ;
	// 			$tag = $tags[$i];

	// 			if($tags[$i] != "" && $tags[$i] != "Choose..."){
	// 				$r = mysqli_query($dbhandle,"SELECT * from jobTags where jid = '$jobid' AND tags = '$tag'  ")or die("Failed to query database 4".mysqli_error($dbhandle));
	// 				if($r->num_rows <=0){
					
	// 					mysqli_query($dbhandle,"INSERT into jobTags(jid, tags) VALUES ('$jobid','$tag')")or die("Failed to query database 5".mysqli_error($dbhandle));
	// 				}
					
	// 			}
				
	// 		}
	// 		return "Job posted successfully";

	// 	}

	 }
}
?>