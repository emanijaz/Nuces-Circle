<?php

// defined('BASEPATH') OR exit('No direct script access allowed');

require_once("DataAccessHelper.php"); 
if(!isset($_SESSION))  
    { 
        session_start(); 
    } 

class applyJob_model 
{ 

	public static function applyJob($job_id)
	{
		$dbhandle=DataAccessHelper::getConnection();

		$email = $_SESSION['email'];

		$sql = "select * from jobApplied where jid =? AND userEmail = ?";
		$stmt = 	mysqli_stmt_init($dbhandle);

		if(!mysqli_stmt_prepare($stmt, $sql)){

			echo "SQL statement failed";
		}
		else{
			mysqli_stmt_bind_param($stmt, "ss",$job_id, $email);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($result->num_rows > 0) {
				return "'Already applied before";
			}
			else
			{
				$sql = "select * from job where id =?";
				$stmt = mysqli_stmt_init($dbhandle);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					
					echo "SQL error";
				}
				else{

					mysqli_stmt_bind_param($stmt, "s",$job_id);
					mysqli_stmt_execute($stmt);
					$result1 = mysqli_stmt_get_result($stmt);
					$row=mysqli_fetch_array($result1);
					if($row['uemail'] == $email){
						return "Can't apply to job";  // recruiter is applying to his own job
					}
					else{
						$sql1 = "INSERT INTO jobApplied (jid, userEmail) VALUES(?, ?)";
						$stmt = 	mysqli_stmt_init($dbhandle);

						if(!mysqli_stmt_prepare($stmt, $sql1)){

							echo "SQL statement failed";
						}
						else{
								mysqli_stmt_bind_param($stmt, "ss",$row['id'], $email);
								mysqli_stmt_execute($stmt);
								return "'Applied Successfully'";
						}

					}
					

				}
				
				
				
			}
		}


		// $result = mysqli_query($dbhandle,"select * from jobApplied where jid ='$job_id' AND userEmail = '$email'") or die("Failed to query database".mysqli_error($dbhandle));
		// if($result->num_rows > 0){
		// 	return "'Already applied before";
		
		// }
		// else{


		// 	$result1 = mysqli_query($dbhandle,"select * from job where id ='$job_id'") or die("Failed to query database".mysqli_error($dbhandle));
		// 	$row=mysqli_fetch_array($result1);
		// 	mysqli_query($dbhandle,"INSERT INTO jobApplied (jid, userEmail) VALUES('".$row['id']."', '$email')") or die("Failed to query database".mysqli_error($dbhandle));

		// 	return "'Applied Successfully'";


			
		// }
	}
}


?>