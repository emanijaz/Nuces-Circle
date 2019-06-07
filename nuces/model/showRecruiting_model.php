<?php

// defined('BASEPATH') OR exit('No direct script access allowed');

require_once("DataAccessHelper.php"); 
if(!isset($_SESSION))  
    { 
        session_start(); 
    } 

class showRecruiting_model 
{ 

	public static function getjobs()
	{
		$dbhandle=DataAccessHelper::getConnection();

		$result = mysqli_query($dbhandle,"select * from job ") or die("Failed to query database".mysqli_error($dbhandle));

		$job_html = "";
		$count_job  = 1;
		$_SESSION['total_jobs'] = $result->num_rows ;


		if($result->num_rows > 0){

			$numrows = $result->num_rows;
			while($numrows > 0){

					$job_html = $job_html.'<div class="row">';
					while ($count_job<=3 && $numrows > 0) {

						$row=mysqli_fetch_array($result);
						$result1 = mysqli_query($dbhandle,"select * from jobTags where jid='".$row["id"]."' ") or die("Failed to query database".mysqli_error($dbhandle));
						$tags = "";
						$numrows1 = $result1->num_rows;
						while($numrows1 > 0){
							$row1=mysqli_fetch_array($result1);
							$tags = $tags .$row1['tags'].', ';
							$numrows1--;
						}
						

								$job_html = $job_html . '<a href="">
									<div style="height: auto; border-right: 1px solid  #3b444b; border-radius: 1px;" class="col-md-4">
											<div class="row">
												<div style="overflow: hidden;" class="container">
													<div style="display: inline-block;">
														<img class="img-responsive " src="connect.jpg" alt="pic" width="120" height="345" style="border-radius: 5px"> 

														
													</div>

												</div>
											</div>
											<div style="height: 10px"  class="row"></div>	
											<div class="row">
												<div style="overflow: hidden;" class="container">
													<div style="display: inline-block;">
														<div class="position" ><b><p>'.$row['jobTitle'].'</p></b></div>
														<div class="headline"><b>'.$row['company'].'</b></div>
														<div class="headline"><b>'.$row['city'].'  '.$row['state'].'</b></div>
														<div style="height: 30px; color:black; overflow: auto;" class="headline">Technologies: <b class="tech">'.$tags.'</b></div>
													</div>

												</div>
												
											</div>
											<div style="height: 10px"  class="row"></div>	
											<div class="row">
												<div style="overflow: hidden;" class="container">
													<div style="display: inline-block;">
													<form method="POST" action="../controller/jobDescriptionController.php">
														<input style="display:none" name="job'.$row['id'].'" value="'.$row['id'].'">
														<button type="submit" name="jobDesc_btn'.$row['id'].'"  class="btn btn-primary">View</button>
														</input>
													</form>
													</div>

												</div>
											</div>
											<div style="height: 10px"  class="row"></div>	
									</div>
								</a>';


						$count_job += 1;
						$numrows = $numrows -1;
					}

					$job_html = $job_html .'</div><hr style="border-top: 1px solid #C0C0C0;"><div class="row"> ';
					$count_job = 1;
				//	$numrows = $numrows -1;
				}
			return $job_html;
		}
		else
		{
			$job_html = "<h3>No jobs to display</h3>";
			return $job_html;
		}
	}
}


?>