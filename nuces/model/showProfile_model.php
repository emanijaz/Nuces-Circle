<?php

require_once("DataAccessHelper.php"); 
if(!isset($_SESSION))  
    { 
        session_start(); 
    } 

class showProfile_model
{ 
	public static function getProfile()
	{
		$dbhandle=DataAccessHelper::getConnection();

		$email = $_SESSION['email']; // get current logged in person email 
		$exp_html = ""; $edu_html =""; $course_html=""; $lisc_html="" ;$lang_html=""; $self_html = "" ; $skill_html="";
		$profileArr = array();

		$self = mysqli_query($dbhandle,"select * from Users WHERE email = '$email'") or die("Failed to query database".mysqli_error($dbhandle));


		$exp = mysqli_query($dbhandle,"select * from experience WHERE email = '$email'") or die("Failed to query database".mysqli_error($dbhandle));

		$edu = mysqli_query($dbhandle,"select * from education WHERE email = '$email'") or die("Failed to query database".mysqli_error($dbhandle));

		$course = mysqli_query($dbhandle,"select * from course WHERE email = '$email'") or die("Failed to query database".mysqli_error($dbhandle));

		$lang = mysqli_query($dbhandle,"select * from language WHERE email = '$email'") or die("Failed to query database".mysqli_error($dbhandle));

		$lisc = mysqli_query($dbhandle,"select * from liscence WHERE email = '$email'") or die("Failed to query database".mysqli_error($dbhandle));

		$skills = mysqli_query($dbhandle,"select * from interest WHERE uemail = '$email'") or die("Failed to query database".mysqli_error($dbhandle));



		
		if ($exp->num_rows > 0) {  // getting expereince content from db 
			$numrow=$exp->num_rows ;

			while($numrow!=0)
    		{
				$row1=mysqli_fetch_array($exp);
				$exp_html = $exp_html.'<div style="padding: 10px 20px 10px 40px; background-color: #e5e5e5; border: 1px solid #e5e5e5; border-radius: 10px; margin: 10px 20px 0px 20px;"><div><h4><b>'.$row1['title'].'</b></h4></div><div><h4>'.$row1['company'].'</h4></div><div><h5><span>'.$row1['from_year'].'</span>&nbsp&nbsp to &nbsp&nbsp<span>'.$row1['to_year'].'</span></h5></div></div>' ;
				
				$numrow  = $numrow - 1;
			}

			$profileArr[0] = $exp_html;
			
		}
		else{

			$profileArr[0] = $exp_html;
		}


		if ($edu->num_rows > 0) {  // getting education content from db
			$numrow=$edu->num_rows ;

			while($numrow!=0)
    		{
				$row1=mysqli_fetch_array($edu);

				$edu_html = $edu_html.'<div style="padding: 10px 20px 10px 40px; background-color: #e5e5e5; border: 1px solid  #e5e5e5; border-radius: 10px;margin: 10px 20px 0px 20px;"><div><h4><b>'.$row1['school'].'</b></h4></div><div><h4>'.$row1['field_of_study'].'</h4></div><div><h5><span>'.$row1['from_year'].'</span>&nbsp&nbsp to &nbsp&nbsp<span>'.$row1['to_year'].'</span></h5></div><div><p>Activities and Socities : '.$row1['activities'].'</p></div></div>' ;
				
				$numrow  = $numrow - 1;
			}

			$profileArr[1] = $edu_html;
			
		}
		else{

			$profileArr[1] = $edu_html;
		}


		if ($course->num_rows > 0) {  // getting course content from db
			$numrow=$course->num_rows ;

			while($numrow!=0)
    		{
				$row1=mysqli_fetch_array($course);

				$course_html = $course_html.'<div style="padding: 10px 20px 10px 40px; background-color: #e5e5e5; border: 1px solid  #e5e5e5; border-radius: 10px; margin: 10px 20px 0px 20px;"><div class="row"><div class="col-md-3"><b>'.$row1['courseName'].'</b></div><div class="col-md-9">'.$row1['courseNumber'].'</span></div></div></div>' ;
				
				$numrow  = $numrow - 1;
			}

			$profileArr[2] = $course_html;
			
		}
		else{

			$profileArr[2] = $course_html;
		}


		if ($lang->num_rows > 0) {  // getting language content from db
			$numrow=$lang->num_rows ;

			while($numrow!=0)
    		{
				$row1=mysqli_fetch_array($lang);

				$lang_html = $lang_html.'<div style="padding: 10px 20px 10px 40px; background-color: #e5e5e5; border: 1px solid  #e5e5e5; border-radius: 10px; margin: 10px 20px 0px 20px;"><div class="row"><div class="col-md-3"><b>'.$row1['langName'].'</b></div><div class="col-md-9">'.$row1['proficiency'].'</span></div></div></div>' ;
				
				$numrow  = $numrow - 1;
			}

			$profileArr[3] = $lang_html;
			
		}
		else{

			$profileArr[3] = $lang_html;
		}


		if ($lisc->num_rows > 0) {  // getting liscence certificates content from db
			$numrow=$lisc->num_rows ;

			while($numrow!=0)
    		{
				$row1=mysqli_fetch_array($lisc);

				$lisc_html = $lisc_html.'<div style="padding: 10px 20px 10px 40px; background-color: #e5e5e5; border: 1px solid  #e5e5e5; border-radius: 10px; margin: 10px 20px 0px 20px;"><div><h4><b>'.$row1['liscName'].'</b></h4></div><div><h4>'.$row1['issue_organization'].'</h4></div><div><h5><span>'.$row1['from_year'].'</span>&nbsp&nbsp to &nbsp&nbsp<span>'.$row1['to_year'].'</span></h5></div><div>'.$row1['cred_id'].'</div></div>' ;
				
				$numrow  = $numrow - 1;
			}

			$profileArr[4] = $lisc_html;
			
		}
		else{

			$profileArr[4] = $lisc_html;
		}


		if ($skills->num_rows > 0) {  // getting skill content from db
			$numrow=$skills->num_rows ;

			while($numrow!=0)
    		{
				$row1=mysqli_fetch_array($skills);

				$skills_html = $skills_html.'<div class="row" style="margin-bottom:20px;"><span style=" margin-right: 10px; margin-left:20px; padding: 5px 10px 5px 10px; background-color: #e5e5e5; border: 1px solid  #e5e5e5; border-radius:10px;"><span><b>'.$row1['interests'].'</b></span></span></div>' ;
				
				$numrow  = $numrow - 1;
			}

			$profileArr[6] = $skills_html;
			
		}
		else{

			$profileArr[6] = $skills_html;
		}



		if ($self->num_rows > 0) { 
			$row1=mysqli_fetch_array($self);
			$exp = mysqli_query($dbhandle,"select * from experience WHERE email = '$email'") or die("Failed to query database".mysqli_error($dbhandle));

			if ($exp->num_rows > 0) { 
					$row2=mysqli_fetch_array($exp);
		 			$self_html = $self_html.'<div>
						<h2><b>'.$row1['firstName'].'  '.$row1['lastName'].'</b></h2>
					</div>
					<div>
						<h4><b>'.$row2['headline'].'</b></h4>
						<div><em>Pakistan</em></div>
					</div>
					<div>
						<h5><em>Email : '.$row1['email'].'</em></h5>
					</div>
					<div>
					
					</div>';

			}
			else{
				$self_html = $self_html.'<div>
						<h2><b>'.$row1['firstName'].'  '.$row1['lastName'].'</b></h2>
					</div>
					<div>
						<h4><b>Add some profile headline here!</b></h4>
						
					</div>
					<div>
						<h5><em>Email : '.$row1['email'].'</em></h5>
					</div>
					<div>
					
					</div>';

			}
			
				$profileArr[5] = $self_html;	
				$profileArr[7] = $row1['firstName'];
		}


		return $profileArr;

	}
}

?>