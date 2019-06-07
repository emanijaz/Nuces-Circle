<?php require_once("../model/addProfile_model.php") ?>
<?php

	// echo "calling add_experience";
	 add_experience();
	 add_education();
	 add_course();
	 add_lang();
	 add_lisc();
	 add_skills1();

?>


<?php


	function add_experience(){

		if(isset($_POST['exp_btn']))
		{
			echo "in add experience controller";
			$title= $_POST['title'];
			$company = $_POST['company'];
			$location= $_POST['location'];
			$from_year =  $_POST['exp_from_year'];
			$to_year =  $_POST['exp_to_year'];
			$industry =  $_POST['industry'];
			$headline =  $_POST['headline'];
			$description =  $_POST['exp_desc'];
			if(isset($title) && isset($company) && isset($location) && isset($from_year) && isset($to_year) && isset($industry))
			{
				$result=addProfile_model::add_experience($title, $company, $location, $from_year, $to_year, $industry, $headline, $description);

				echo '<script>alert("'.$result.'")</script>';
				if($result == "experience added successfully"){

					header("Location: ../controller/showProfileController.php");

				}
				else{ // record already exist
						$errorMessage = "'Record already exist.";
			header("Location: ../controller/showProfileController?error=" . $errorMessage );

				}

			}
			else
			{
				$errorMessage = "'Please provide all fields'";
			header("Location: ../controller/showProfileController?error=" . $errorMessage );
			}

			
			
			
			
		}

	}

	function add_education(){

		if(isset($_POST['edu_btn']))
		{
			//echo "in add education controller";
			$school= $_POST['school'];
			$from_year =  $_POST['edu_from_year'];
			$to_year =  $_POST['edu_to_year'];
			$degree =  $_POST['degree'];
			$field=  $_POST['studyField'];
			$activities=  $_POST['activities'];
			$description =  $_POST['edu_desc'];
			$grade =  $_POST['grade'];

			// echo $activities;

			if(isset($school) && isset($degree) && isset($field) && isset($from_year) && isset($to_year) && isset($grade))
			{
				$result=addProfile_model::add_education($school,$from_year, $to_year, $degree, $field, $activities, $description, $grade);

				echo '<script>alert("'.$result.'")</script>';
				if($result == "education added successfully"){

					header("Location: ../controller/showProfileController.php");

				}
				else{ // record already exist
						$errorMessage = "'Record already exist.";
			header("Location: ../view/profile_view.php?error=" . $errorMessage );

				}

			}
			else
			{
				$errorMessage = "'Please provide all fields'";
			header("Location: ../view/profile_view.php?error=" . $errorMessage );
			}

			
			
			
			
		}

	}


	function add_course(){

		if(isset($_POST['course_btn']))
		{
			// echo "in add education controller";
			$course_name= $_POST['course_name'];
			$course_num =  $_POST['course_number'];
			$course_ass=  $_POST['course_association'];

			if(isset($course_name) && isset($course_num) && isset($course_ass))
			{
				$result=addProfile_model::add_course($course_name, $course_num ,$course_ass);

				echo '<script>alert("'.$result.'")</script>';
				if($result == "course added successfully"){

					header("Location: ../controller/showProfileController.php");

				}
				else{ // record already exist
						$errorMessage = "'Record already exist.";
			header("Location: ../view/profile_view.php?error=" . $errorMessage );

				}

			}
			else
			{
				$errorMessage = "'Please provide all fields'";
			header("Location: ../view/profile_view.php?error=" . $errorMessage );
			}

			
		}
	}

	function add_lisc(){

		if(isset($_POST['lisc_btn']))
		{
			//echo "in add education controller";
			$lisc_name= $_POST['lisc_name'];
			$issue_org =  $_POST['issuing_organization'];
			$from_year=  $_POST['lisc_from_year'];
			$to_year=  $_POST['lisc_to_year'];
			$cred_id=  $_POST['credential_id'];
			$cred_url=  $_POST['credential_url'];

			if(isset($lisc_name) && isset($issue_org) && isset($from_year) && isset($to_year) && isset($cred_id) && isset($cred_url))
			{
				$result=addProfile_model::add_lisc($lisc_name, $issue_org , $from_year, $to_year, $cred_id, $cred_url );

				echo '<script>alert("'.$result.'")</script>';
				if($result == "liscence added successfully"){

					header("Location: ../controller/showProfileController.php");

				}
				else{ // record already exist
						$errorMessage = "'Record already exist.";
			header("Location: ../view/profile_view.php?error=" . $errorMessage );

				}

			}
			else
			{
				$errorMessage = "'Please provide all fields'";
			header("Location: ../view/profile_view.php?error=" . $errorMessage );
			}

			
		}
	}


	function add_lang(){

		if(isset($_POST['lang_btn']))
		{
			//echo "in add education controller";
			$lang= $_POST['language'];
			$prof =  $_POST['lang_proficiency'];

			if(isset($lang) && isset($prof))
			{
				$result=addProfile_model::add_lang($lang, $prof );

				echo '<script>alert("'.$result.'")</script>';
				if($result == "language added successfully"){

					header("Location: ../controller/showProfileController.php");

				}
				else{ // record already exist
						$errorMessage = "'Record already exist.";
			header("Location: ../view/profile_view.php?error=" . $errorMessage );

				}

			}
			else
			{
				$errorMessage = "'Please provide all fields'";
			header("Location: ../view/profile_view.php?error=" . $errorMessage );
			}

			
		}
	}

	function add_skills1(){

		if(isset($_POST['skill1_btn']))
		{
			//echo "in add education controller";
			$skill1= $_POST['skill1'];
			$skill2 =  $_POST['skill2'];
			$skill3 =  $_POST['skill3'];
			$skill4 =  $_POST['skill4'];
			$skill5=  $_POST['skill5'];
			$skill6=  $_POST['skill6'];
			$skill7 =  $_POST['skill7'];
			$skill8 =  $_POST['skill8'];

			$s_arr = array();
			$s_count = 0;
			
			if($skill1 != ""){ $s_arr[$s_count++] = $skill1 ;}
			if($skill2 != ""){ $s_arr[$s_count++] = $skill2 ;}
			if($skill3 != ""){ $s_arr[$s_count++] = $skill3 ;}
			if($skill4 != ""){ $s_arr[$s_count++] = $skill4 ;}
			if($skill5 != ""){ $s_arr[$s_count++] = $skill5 ;}
			if($skill6 != ""){ $s_arr[$s_count++] = $skill6 ;}
			if($skill7 != ""){ $s_arr[$s_count++] = $skill7 ;}
			if($skill8 != ""){ $s_arr[$s_count++] = $skill8 ;}


			if(isset($skill1) && isset($skill2) && isset($skill3) && isset($skill4) && isset($skill5) && isset($skill6) && isset($skill7) && isset($skill8)){

				// $result=addProfile_model::add_skill1($skill1, $skill2 , $skill3 , $skill4 , $skill5 , $skill6 , $skill7, $skill8);
				$result=addProfile_model::add_skill1($s_arr, $s_count);
				echo '<script>alert("'.$result.'")</script>';
				
				if($result == "skills added successfully"){
					$success_msg = "'skills added successfully.";
					header("Location: ../controller/showProfileController.php?success=" . $success_msg);

				}
				else{ // record already exist
						$errorMessage = "'Record already exist.";
			header("Location: ../view/profile_view.php?error=" . $errorMessage );

				}

			}


		}

	}

?>