<?php

require_once("DataAccessHelper.php"); 
if(!isset($_SESSION))  
    { 
        session_start(); 
    } 




class jobDescription_model 
{ 

	public static function showJobDescription($job_id)
	{

		$display_results = array();
		$dr_count = 0;
		$dbhandle=DataAccessHelper::getConnection();
		$email = $_SESSION['email'];


		$result = mysqli_query($dbhandle,"select * from job WHERE id='$job_id' ") or die("Failed to query database".mysqli_error($dbhandle));
		$job_tags_result = mysqli_query($dbhandle,"select * from jobTags WHERE jid='$job_id' ") or die("Failed to query database".mysqli_error($dbhandle));
		$user_interest = mysqli_query($dbhandle,"select * from interest WHERE uemail='$email' ") or die("Failed to query database".mysqli_error($dbhandle));

		$candidates_applied = mysqli_query($dbhandle,"select * from jobApplied WHERE jid='$job_id' ") or die("Failed to query database".mysqli_error($dbhandle)); 



		$jobDesc_html = "";
		$heading_html = "";
		$relevency_html = "";
		$candidates_html = "";

		$recruiter="";

		if($result->num_rows > 0){
			$row1=mysqli_fetch_array($result);
			$recruiter = $row1['uemail'];
			$jobDesc_html = $jobDesc_html.'<div class="row">
					<div class="col-md-3">
						<h3><b>'.$row1['jobTitle'].'</b></h3>
						<h4><b>'.$row1['company'].'</b></h4>
						<b>'.$row1['city'].' '.$row1['state'].'</b>
					</div>
					<div style="margin-top: 40px;" class="col-md-3">
						<form method="POST" action="../controller/applyJobController.php">
						<input style="display:none" name="job'.$row1['id'].'" value="'.$row1['id'].'">
						<button style="text-align: center;" type="submit" name="applyJob_btn'.$row1['id'].'"  class="btn btn-primary" >Apply</button>
						</input>
						</form>
					</div>
					<div class="col-md-3"></div>
				</div>

				<hr style="border-top: 1px solid #C0C0C0;">

				<div class="row">
				<div class="col-md-8">
						<h4><b>Job Title</b></h4>
						<p>'.$row1['jobTitle'].'</p>
						<h4><b>Company Name</b></h4>
						<p>'.$row1['company'].'</p>
						<h4><b>Location</b></h4>
						<p>'.$row1['city'].' '.$row1['state'].'</p>
						<h4><b>Job Details</b></h4>
						<p>
							<ul>
								<li><h5><b>Employment Type</b></h5>
									<p style="padding-left: 10px">'.$row1['employmentType'].'</p> </li>

								<li><h5><b>Seniority Level</b></h5>
									<p style="padding-left: 10px">'.$row1['seniorityLevel'].'</p></li>

								<li><h5><b>Discipline</b></h5>
									<p style="padding-left: 10px">'.$row1['discipline'].'</p></li>

								<li><h5><b>Experience Required</b></h5>
									<p style="padding-left: 10px">'.$row1['experienceRequired'].'</p></li>

								<li><h5><b>Job Description</b></h5>
									<p style="padding-left: 10px">'.$row1['jobDescription'].'</p></li>
							</ul>
						
						</p>
						
					</div>';

			$display_results[$dr_count++] = $jobDesc_html; 
		}
		else{

			$display_results[$dr_count++] = ""; 
		}
		$candidates_html = $candidates_html .'<div class="col-md-4">';
		if($recruiter == $email){
			$candidates_html = $candidates_html .'<h4><b>Candidates Applied</b></h4>
						
						<div>
							<button style="" type="button" class="btn btn-primary" data-toggle="collapse" data-target="#CandidatesList">Show Candidates List</button>
						</div>';
			if($candidates_applied ->num_rows > 0 ) // display candidstaes applied
			{
				echo '<script>alert("yes matched!. Cand matched '.$candidates_applied ->num_rows .'")</script>';
				$candidates_html = $candidates_html .'<div id="CandidatesList" class="collapse" style="padding-top: 30px;">
				<ol style="overflow-y: scroll; height: 500px;">';
				for($i=0 ; $i< $candidates_applied ->num_rows; $i++)
				{

					$row = mysqli_fetch_array($candidates_applied );
					$user_res =  mysqli_query($dbhandle,"select * from Users WHERE email='".$row['userEmail']."' ") or die("Failed to query database".mysqli_error($dbhandle));

					$row1 = mysqli_fetch_array($user_res);

					$user_exp = mysqli_query($dbhandle,"select * from experience WHERE email='".$row['userEmail']."' ") or die("Failed to query database".mysqli_error($dbhandle));

					if($user_exp ->num_rows > 0 ){ // user has experience
						$row2 = mysqli_fetch_array($user_exp);
						$candidates_html = $candidates_html .'<li>
										<h5><b>'.$row1['firstName'].'  '.$row1['lastName'].'</b></h5>
										<h5>'.$row2['headline'].'</h5>
									</li>';
					}
					else{
						$candidates_html = $candidates_html .'<li>
										<h5><b>'.$row1['firstName'].'  '.$row1['lastName'].'</b></h5>
										<h5>Nuces Circle Member</h5>
									</li>';
					}

				

				}

				$candidates_html = $candidates_html .'</ol></div>';
				// $display_results[$dr_count++] = $candidates_html;  // needs to be changed 


			}
			else{
				$candidates_html = "No candidates list to  show";
				// $display_results[$dr_count++] = $candidates_html;  // needs to be changed 
			}
		}
		$candidates_html = $candidates_html .'<div style="padding-top: 30px;">';
		if($user_interest->num_rows > 0 &&  $job_tags_result->num_rows > 0){  // display matched relevancy 
			
			echo '<script>alert("user interests matched ")</script>';
			$job_tags_rows = $job_tags_result->num_rows;
			$user_interest_rows = $user_interest->num_rows ;

			// echo "job tags row ".$job_tags_rows;
			// echo "user interest row ".$user_interest_rows; 
			$match_interest = array();
			$count = 0;
			for($i=0 ; $i< $job_tags_rows; $i++){
				
				$job_tag_row = mysqli_fetch_array($job_tags_result);
				$user_interest = mysqli_query($dbhandle,"select * from interest WHERE uemail='$email' ") or die("Failed to query database".mysqli_error($dbhandle));

				//echo  $job_tag_row['tags'] ;

				for($j=0 ; $j < $user_interest_rows ; $j++)
				{
					$user_interest_row = mysqli_fetch_array($user_interest);
					// echo $user_interest_row ['interests'] ;
					if(rtrim(ltrim(strtolower($user_interest_row ['interests']))) ==  rtrim(ltrim(strtolower($job_tag_row['tags'])))){
						//echo "matches   ";
						$match_interest[$count++] =  $job_tag_row['tags'];
					
					}

				}
			}
			
			$candidates_html = $candidates_html .'<div><h5><b>How this job matches your skills?</b></h5>
									<h5>Relevency to Job</h5>
									<p><ul>';
			while($count >0 ){


				$candidates_html = $candidates_html .'
											<li>'.$match_interest[$count-1].'</li>';
				$count--;
			}
			$candidates_html = $candidates_html .'</ul>
									</p></div>';
			

			// $display_results[$dr_count++] = $candidates_html;  // needs to be changed 


		}
		else{
			$relevency_html = "No Matched interests with this job";
			// $display_results[$dr_count++] = $relevency_html;  // needs to be changed 
		}
		$candidates_html = $candidates_html .'</div></div>';
		$display_results[$dr_count++] = $candidates_html;


		return $display_results;
	}

}


?>