<?php

// defined('BASEPATH') OR exit('No direct script access allowed');

require_once("DataAccessHelper.php"); 
if(!isset($_SESSION))  
    { 
        session_start(); 
    } 



class addProfile_model
{ 

	public static function add_experience($title, $company, $location, $from_year, $to_year, $industry, $headline, $description)
	{

		// echo "in add experience model";
		$email = $_SESSION['email'];
		$dbhandle=DataAccessHelper::getConnection();

		$sql = "select * from experience WHERE email = ? AND title = ? AND company =? AND location=? AND from_year=? AND to_year=? AND industry=? AND headline=? AND description=? ;";

		$stmt = 	mysqli_stmt_init($dbhandle);

		if(!mysqli_stmt_prepare($stmt, $sql)){

			echo "SQL statement failed";
		}
		else
		{
			mysqli_stmt_bind_param($stmt, "sssssssss",$email, $title, $company, $location, $from_year , $to_year, $industry, $headline, $description);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($result->num_rows > 0){
					return "Record already exists!";
			}
			else{

				// mysqli_stmt_bind_param($stmt, "sssssssss",$email, $title, $company, $location, $from_year , $to_year, $industry, $headline, $description);
				// mysqli_stmt_execute($stmt);
				// $result = mysqli_stmt_get_result($stmt);
				// if ($result->num_rows > 0) {
				// 		return "Record alreasy exist!";
				// }
				// else{

				// }
				$sql = "INSERT INTO experience (email,title,company, location,from_year,to_year, industry, headline, description) VALUES (?, ? , ?, ?, ?, ? , ?, ?, ?)";
				$stmt = mysqli_stmt_init($dbhandle);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					
					echo "SQL error";
				}
				else{
					mysqli_stmt_bind_param($stmt, "sssssssss",$email, $title, $company, $location, $from_year , $to_year, $industry, $headline, $description);
					mysqli_stmt_execute($stmt);
					
					return "experience added successfully";

				}


			}

		// $result = mysqli_query($dbhandle,"select * from experience WHERE email = '$email' AND title ='$title' AND company ='$company' AND location='$location' AND from_year='$from_year' AND to_year='$to_year' AND industry='$industry' AND headline='$headline' AND description='$description' ;") or die("Failed to query database".mysqli_error($dbhandle));
		//echo $result->num_rows;
		// if ($result->num_rows > 0) {
		// 	return "Record already exists!";
		// }
		// else{
		// 	mysqli_query($dbhandle,"INSERT INTO experience (email,title,company, location,from_year,to_year, industry, headline, description) VALUES ('$email', '$title' , '$company', '$location', '$from_year', '$to_year', '$industry', '$headline', '$description')");

		// 	return "experience added successfully";
		 }
	}


	public static function add_education($school,$from_year, $to_year, $degree, $field, $activities, $description, $grade)
	{

		// echo "in add education model";
		$email = $_SESSION['email'];
		$dbhandle=DataAccessHelper::getConnection();


		$sql = "select * from education WHERE email = ? AND school =? AND degree =? AND field_of_study=? AND from_year=? AND to_year=? AND grade=? AND activities=? AND project_description=? ;";

		$stmt = 	mysqli_stmt_init($dbhandle);

		if(!mysqli_stmt_prepare($stmt, $sql)){

			echo "SQL statement failed";
		}
		else
		{
			mysqli_stmt_bind_param($stmt, "sssssssss",$email, $school , $from_year, $to_year, $degree, $field, $grade,$activities, $description);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($result->num_rows > 0){
					return "Record already exists!";
			}
			else{


			$sql = "INSERT INTO education (email,school,from_year,to_year, degree, field_of_study, grade, activities, project_description) VALUES (?, ? , ?, ?, ?, ? , ?, ?, ?)";
				$stmt = mysqli_stmt_init($dbhandle);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					
					echo "SQL error";
				}
				else{

					mysqli_stmt_bind_param($stmt, "sssssssss",$email, $school , $from_year, $to_year, $degree, $field, $grade,$activities, $description);
					mysqli_stmt_execute($stmt);
					return "education added successfully";

				}
			}
		}

		// $result = mysqli_query($dbhandle,"select * from education WHERE email = '$email' AND school ='$school' AND degree ='$degree' AND field_of_study='$field' AND from_year='$from_year' AND to_year='$to_year' AND grade='$grade' AND activities='$activities' AND project_description='$description' ;") or die("Failed to query database".mysqli_error($dbhandle));
		//echo $result->num_rows;
		// if ($result->num_rows > 0) {
		// 	return "Record already exists!";
		// }
		// else{
		// 	mysqli_query($dbhandle,"INSERT INTO education(email,school,from_year,to_year, degree, field_of_study, grade, activities, project_description) VALUES ('$email', '$school' , '$from_year', '$to_year', '$degree', '$field', '$grade', '$activities', '$description')");

		// 	return "education added successfully";
		// }
	}


	public static function add_course($course_name, $course_number, $association)
	{

		// echo "in add course model";
		$email = $_SESSION['email'];
		$dbhandle=DataAccessHelper::getConnection();

		$sql = "select * from course WHERE email = ? AND courseName =? AND courseNumber = ? AND association=?;";
		$stmt = 	mysqli_stmt_init($dbhandle);

		if(!mysqli_stmt_prepare($stmt, $sql)){

			echo "SQL statement failed";
		}
		else
		{
			mysqli_stmt_bind_param($stmt, "ssss",$email, $course_name, $course_number, $association);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($result->num_rows > 0){
					return "Record already exists!";
			}
			else{
				$sql = "INSERT INTO course (email,courseName,courseNumber,association) VALUES (?, ? , ?, ?)";
					$stmt = mysqli_stmt_init($dbhandle);
					if(!mysqli_stmt_prepare($stmt, $sql)){
						
						echo "SQL error";
					}
					else{

						mysqli_stmt_bind_param($stmt, "ssss",$email, $course_name, $course_number, $association);
						mysqli_stmt_execute($stmt);
						return "course added successfully";

					}
			}




			// $result = mysqli_query($dbhandle,"select * from course WHERE email = '$email' AND courseName ='$course_name' AND courseNumber ='$course_number' AND association='$association';") or die("Failed to query database".mysqli_error($dbhandle));
			// //echo $result->num_rows;
			// if ($result->num_rows > 0) {
			// 	return "Record already exists!";
			// }
			// else{
			// 	mysqli_query($dbhandle,"INSERT INTO course(email,courseName,courseNumber,association) VALUES ('$email', '$course_name' , '$course_number','$association')");

			// 	return "course added successfully";
			 }
		
	}


	public static function add_lisc($lisc_name, $issue_org, $from_year, $to_year, $cred_id, $cred_url)
	{

		// echo "in add liscence model";
		$email = $_SESSION['email'];
		$dbhandle=DataAccessHelper::getConnection();
		$sql = "select * from liscence WHERE email = ? AND liscName = ? AND issue_organization =? AND from_year=? AND to_year=? AND cred_id=? AND cred_url=? ;";

		$stmt = 	mysqli_stmt_init($dbhandle);

		if(!mysqli_stmt_prepare($stmt, $sql)){

			echo "SQL statement failed";
		}
		else
		{
			mysqli_stmt_bind_param($stmt, "sssssss",$email, $lisc_name, $issue_org, $from_year, $to_year,  $cred_id, $cred_url);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($result->num_rows > 0){
					return "Record already exists!";
			}
			else{
				$sql = "INSERT INTO liscence(email,liscName,issue_organization,from_year, to_year, cred_id,cred_url) VALUES (?, ? , ?, ?,?,?,?)";
					$stmt = mysqli_stmt_init($dbhandle);
					if(!mysqli_stmt_prepare($stmt, $sql)){
						
						echo "SQL error";
					}
					else{

						mysqli_stmt_bind_param($stmt, "sssssss",$email, $lisc_name, $issue_org, $from_year, $to_year,  $cred_id, $cred_url);
						mysqli_stmt_execute($stmt);
						return "liscence added successfully";

					}
			}
		}

		// $result = mysqli_query($dbhandle,"select * from liscence WHERE email = '$email' AND liscName ='$lisc_name' AND issue_organization ='$issue_org' AND from_year='$from_year' AND to_year='$to_year' AND cred_id='$cred_id' AND cred_url='$cred_url' ;") or die("Failed to query database".mysqli_error($dbhandle));
		// //echo $result->num_rows;
		// if ($result->num_rows > 0) {
		// 	return "Record already exists!";
		// }
		// else{
		// 	mysqli_query($dbhandle,"INSERT INTO liscence(email,liscName,issue_organization,from_year, to_year, cred_id,cred_url) VALUES ('$email', '$lisc_name' , '$issue_org','$from_year' ,'$to_year' ,'$cred_id' ,'$cred_url')");

		// 	return "liscence added successfully";
		// }
	}



	public static function add_lang($lang_name, $prof)
	{

		// echo "in add language model";
		$email = $_SESSION['email'];
		$dbhandle=DataAccessHelper::getConnection();

		$sql = "select * from language WHERE email = ? AND langName =? AND proficiency =?;" ;

		$stmt = 	mysqli_stmt_init($dbhandle);

		if(!mysqli_stmt_prepare($stmt, $sql)){

			echo "SQL statement failed";
		}
		else
		{
			mysqli_stmt_bind_param($stmt, "sss",$email, $lang_name, $prof);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($result->num_rows > 0){
					return "Record already exists!";
			}
			else{
				$sql = "INSERT INTO language(email,langName,proficiency) VALUES (?, ? , ?)";
					$stmt = mysqli_stmt_init($dbhandle);
					if(!mysqli_stmt_prepare($stmt, $sql)){
						
						echo "SQL error";
					}
					else{

						mysqli_stmt_bind_param($stmt, "sss",$email, $lang_name, $prof);
						mysqli_stmt_execute($stmt);
						return "language added successfully";

					}
			}
		}

		// $result = mysqli_query($dbhandle,"select * from language WHERE email = '$email' AND langName ='$lang_name' AND proficiency ='$prof';") or die("Failed to query database".mysqli_error($dbhandle));
		// //echo $result->num_rows;
		// if ($result->num_rows > 0) {
		// 	return "Record already exists!";
		// }
		// else{
		// 	mysqli_query($dbhandle,"INSERT INTO language(email,langName,proficiency) VALUES ('$email', '$lang_name' , '$prof')");

		// 	return "language added successfully";
		// }
	}

	public static function add_skill1($s_arr, $s_count)
	{
		$email = $_SESSION['email'];
		$dbhandle=DataAccessHelper::getConnection();

		for($i= 0; $i<$s_count; $i++){



			$sql = "select * from interest WHERE uemail = ? AND interests =?;";

			$stmt = 	mysqli_stmt_init($dbhandle);

			if(!mysqli_stmt_prepare($stmt, $sql)){

				echo "SQL statement failed";
			}
			else
			{
				mysqli_stmt_bind_param($stmt, "ss",$email,$s_arr[$i] );
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				if($result->num_rows > 0){
						return "Record already exists!";
				}
				else{
					$sql = "INSERT INTO interest(uemail,interests) VALUES (?,? )";
						$stmt = mysqli_stmt_init($dbhandle);
						if(!mysqli_stmt_prepare($stmt, $sql)){
							
							echo "SQL error";
						}
						else{

							mysqli_stmt_bind_param($stmt, "ss",$email, $s_arr[$i]);
							mysqli_stmt_execute($stmt);
							// return "language added successfully";

						}
				}
			}
			// $result = mysqli_query($dbhandle,"select * from interest WHERE uemail = '$email' AND interests ='".$s_arr[$i]."';") or die("Failed to query database".mysqli_error($dbhandle));
			// if($result-> $num_rows <= 0){
			// 	mysqli_query($dbhandle,"INSERT INTO interest(uemail,interests) VALUES ('$email', '".$s_arr[$i]."' )");
			

			// }
		}

		
		return "skills added successfully";
	}
}
?>