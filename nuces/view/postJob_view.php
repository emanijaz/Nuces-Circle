
<!DOCTYPE html>

<html>
<head>
	<title>Post Job</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/postJob_view.css">


</head>
<body>

<nav id="nav" class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">      
      	<span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                    
      </button>
      <a class="navbar-brand" href="#">Nuces Circle</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
       
	     <ul class="nav navbar-nav navbar-right">
	       <li><a href="../controller/showConnectionController.php"><span class="glyphicon glyphicon-user"></span> Network</a></li>
	      <li><a href="../controller/showRecruitingController.php"><span class="glyphicon glyphicon-briefcase"></span> Jobs</a></li>
	      <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Messages</a></li>
	      <li><a href="../controller/newsFeedController.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
	      <li><a href="#"><span class="glyphicon glyphicon-bell"></span> Notifications</a></li>
	      <li><a href="../controller/showProfileController.php"><span class=""></span> Me</a></li>
	      <li><a href="../controller/logoutController.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
	    
	    </ul>
    </div>
  </div>
</nav>

	<div id="container" class="container">
	<div id="inner_div" class="well well-lg">
		<!-- <div><h2>POST JOB FORM!</h2></div> -->
		<form method="POST" name="post_job_form" action="../controller/postJobController.php" >
				  <div class="form-row">
				    <div class="form-group col-md-6">
				      <label class="asterisk" for="">Job Title</label>
				      <input type="text" class="form-control" id="inputTitle" required pattern="[A-Za-z ]+" maxlength="30" placeholder="Job Title" name="inputTitle" required/>
				    </div>
				    <div class="form-group col-md-6">
				      <label class="asterisk" for="">Company</label>
				      <input type="text" class="form-control" id="inputCompany" required pattern="[A-Za-z0-9 ]+" placeholder="Company name" name="inputCompany" maxlength="30" required/>
				    </div>
				  </div>
				  <div class="form-group">
				    <label id="loc_label" for="inputAddress"><b>Location</b></label>
					    <div class="form-row">
								    <div class="form-group col-md-6">
								      <label class="asterisk" for="inputCity">City</label>
								      <input type="text" class="form-control" maxlength="30" id="inputCity" name="inputCity" required pattern="[A-Za-z ]+" required >
								    </div>
								    <div class="form-group col-md-4">
								      <label for="inputState">State</label>
								      <select id="inputState" class="form-control" name="inputState">
								        <option selected>Choose...</option>
								        <option>Punjab</option>
								        <option>California</option>
								        <option>Washington</option>
								        <option>Georgia</option>
								        <option>New York</option>
								        <option>Arizona</option>
								        <option>Alaska</option>
								        <option>Orizon</option>
								       
								      </select>
								    </div>
								    <div class="form-group col-md-2">
								      <label for="inputZip">Zip</label>
								      <input maxlength="10" type="text" class="form-control" id="inputZip" required pattern="[0-9]{1,9}+" name="inputZip"/>
								    </div>
					  	</div>
				  </div>
				

				 <div class="form-row">
								    <div class="form-group col-md-6">
								      <label for="">Employment Type</label>
								      <select id="inputEmploymentType" class="form-control" name="empType">
								        <option selected>Choose one...</option>
								        <option>Full Time</option>
								        <option>Part Time</option>
								        <option>Contract</option>
								        <option>Temporary</option>
								        <option>Volunteer</option>
								        <option>Internship</option>
								        <option>Trainees</option>
								      </select>
								    </div>
								    <div class="form-group col-md-6">
								      <label for="">Seniority Level</label>
								      <select id="inputSeniorityLevel" class="form-control" name="senLevel">
								        <option selected>Choose one...</option>
								        <option>Director</option>
								        <option>Executive</option>
								        <option>Mid-Senior Level</option>
								        <option>Entry Level</option>
								        <option>Internship</option>
								        <option>Partner</option>
								        <option>Vice President</option>
								        <option>Chair Person</option>
								      </select>
								    </div>
				 </div>

				 <div class="form-row">
								    <div class="form-group col-md-6">
								      <label for="">Discipline</label>
								      <select id="inputDiscipline" class="form-control" name="inputDiscipline">
								        <option selected>Choose one...</option>
								        <option></option>
								        <option>Accounting/Auditing</option>
								        <option>Administrative</option>
								        <option>Advertising</option>
								        <option>Analyst</option>
								        <option>Art/Creative</option>
								        <option>Business Development</option>
								        <option>Consulting</option>
								        <option>Developer</option>
								      </select>
								    </div>
								    <div class="form-group col-md-6">
								      <label for="">Experience Required</label>
								      <select id="inputExperienceRequired" class="form-control" name="inputExp">
								        <option selected>Choose one...</option>
								        <option>1 year Experience</option>
								        <option>2 year Experience</option>
								        <option>3 year experience</option>
								        <option>No Experience</option>
								       
								      </select>
								    </div>
				 </div>

				 <div class="form-row">
					<div id="job_desc_area" class="form-group">
									      <label for="comment">Job Description</label>
									      <textarea maxlength="200" class="form-control" rows="10" cols="90" id="comment" name="jobDescription"></textarea>
    				</div>
				 </div>
				 <div class="form-row">
				 	<p>Add skills keywords to make your job more visible to right candidates. (Select upto 4 tags)</p>
				 	<label for="">Tags</label>
				 	<div class="form-group">
				 		
				 		
				 		
				 				 <div class="form-group col-md-2">
				 					
								      <select class="form-control " name="inputTags1">
								        <option selected id="done">Choose...</option>
								        <option id="tag1">C++</option>
								        <option id="tag2">Python</option>
								        <option id="tag3">Machine Learning</option>
								        <option id="tag4">Java</option>
								        <option id="tag5">Big Data</option>
								        <option id="tag6">Artificial Intelligence</option>
								        <option id="tag7">Microsoft Excel</option>
								        <option id="tag8">Jquery</option>
								        <option id="tag9">Entrpreneurship</option>
								        <option id="tag10">Amazon</option>
								        <option id="tag11">Ruby on Rails</option>
								      </select>
								  </div>
				 				 <div class="form-group col-md-2">

								      <select class="form-control" name="inputTags2">
								        <option selected id="done">Choose...</option>
								        <option id="tag1">C++</option>
								        <option id="tag2">Python</option>
								        <option id="tag3">Machine Learning</option>
								        <option id="tag4">Java</option>
								        <option id="tag5">Big Data</option>
								        <option id="tag6">Artificial Intelligence</option>
								        <option id="tag7">Microsoft Excel</option>
								        <option id="tag8">Jquery</option>
								        <option id="tag9">Entrpreneurship</option>
								        <option id="tag10">Amazon</option>
								        <option id="tag11">Ruby on Rails</option>
								      </select>
								  </div>

				 				 <div class="form-group col-md-2">
								      <select class="form-control" name="inputTags3">
								        <option selected id="done">Choose...</option>
								        <option id="tag1">C++</option>
								        <option id="tag2">Python</option>
								        <option id="tag3">Machine Learning</option>
								        <option id="tag4">Java</option>
								        <option id="tag5">Big Data</option>
								        <option id="tag6">Artificial Intelligence</option>
								        <option id="tag7">Microsoft Excel</option>
								        <option id="tag8">Jquery</option>
								        <option id="tag9">Entrpreneurship</option>
								        <option id="tag10">Amazon</option>
								        <option id="tag11">Ruby on Rails</option>
								      </select>
								   </div>


				 				 <div class="form-group col-md-2">
								      <select class="form-control" name="inputTags4">
								        <option selected id="done">Choose...</option>
								        <option id="tag1">C++</option>
								        <option id="tag2">Python</option>
								        <option id="tag3">Machine Learning</option>
								        <option id="tag4">Java</option>
								        <option id="tag5">Big Data</option>
								        <option id="tag6">Artificial Intelligence</option>
								        <option id="tag7">Microsoft Excel</option>
								        <option id="tag8">Jquery</option>
								        <option id="tag9">Entrpreneurship</option>
								        <option id="tag10">Amazon</option>
								        <option id="tag11">Ruby on Rails</option>
								      </select>
								  </div>
				 	</div>
				 </div>
				 <div class="row"></div>
				 <div class="form-row">
				 	<!-- <div class="form-group"> -->
				 		<button id="postjob_btn" type="submit" id="jobpost_btn" class="btn btn-primary" name="postJob_btn">Post Job</button>
				 	<!-- </div> -->
				 </div>
				 
  
</form>
	</div>
</div>
</body>
</html>