<?php


require_once("DataAccessHelper.php"); 
if(!isset($_SESSION))  
    { 
        session_start(); 
    } 

class ajaxJobsData_model 
{ 

	public static function getjobs()
	{
		$dbhandle=DataAccessHelper::getConnection();

		$result = mysqli_query($dbhandle,"select * from job ") or die("Failed to query database".mysqli_error($dbhandle));

		$jobsData = array();
		$jobTitles = array();
		$jobTech = array();
		$index = 0;


		if($result->num_rows > 0){

			$numrows = $result->num_rows;
			while($numrows > 0){

						$row=mysqli_fetch_array($result);
						$result1 = mysqli_query($dbhandle,"select * from jobTags where jid='".$row["id"]."' ") or die("Failed to query database".mysqli_error($dbhandle));
						$tags = "";
						$numrows1 = $result1->num_rows;
						while($numrows1 > 0){
							$row1=mysqli_fetch_array($result1);
							$tags = $tags .$row1['tags'].', ';
							$numrows1--;
						}
						$jobTitles[$index] = $row['jobTitle'];
						$jobTech[$index] = $tags;
						$index++;
						$numrows = $numrows -1;
					
				}

				$jobsData['data_title'] = $jobTitles;
				$jobsData['data_tech'] = $jobTech;

		}

		return $jobsData;
	}
}

?>