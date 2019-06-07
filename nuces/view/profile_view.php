<?php
if(!isset($_SESSION))  
    { 
    	
        session_start();
        // if($_SESSION['visited'] == 0){
        // 	$_SESSION['visitied'] == 1;
        // } 
        // else{
        // 	return;
        // }
    } 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile Editing</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	
    <script type="text/javascript" src="../assets/profile_editing.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../assets/profile_view.css">
   

  	
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
	      <li><a href=""><span class="glyphicon glyphicon-envelope"></span> Messages</a></li>
	      <li><a href="../controller/newsFeedController.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
	      <li><a href=""><span class="glyphicon glyphicon-bell"></span> Notifications</a></li>
	      <li><a href="../controller/showProfileController.php"><span class=""></span> Me</a></li>
    	  <li><a href="../controller/logoutController.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
    </div>
  </div>
</nav>
<div id="main" class="col">
	<div id="container" class="container">
  		
  		<div id="intro_well"  class="well well-lg">
  		
  			<div class="row">
  					<div class="col-md-9">
				

					<?php echo $_SESSION['profile'][5]  ?>
					</div>

					<div class="col-md-3">
	  					<div style="" class="container">
									<div>
										<img id="img" class="img-responsive " src=<?php echo $_SESSION['profile'][7]  ?>.jpg alt="pic" width="120" height="345" > 

										
									</div>

						</div>
					</div>
  			</div>
  		</div>

  		
  		<div id="exp_well" class="well well-lg">
  			
  				<div class="col">
    				<div id="exp" class="row">
      				<h4><b>Experience </b><span id="exp_span" style=""><a href="#"><span class="glyphicon glyphicon-plus-sign" onclick="document.getElementById('modal-wrapper-experience').style.display='block'"></span></a></span></h4>

      				<?php echo $_SESSION['profile'][0]  ?>
      				</div>
    				<hr >

    				<div  id="edu" class="row">
      				<h4><b>Education</b> <span id="edu_span" style=""><a href="#"><span class="glyphicon glyphicon-plus-sign" onclick="document.getElementById('modal-wrapper-education').style.display='block'"></span></a></span></h4>

      				<?php echo $_SESSION['profile'][1]  ?>
    				</div>
    				<hr >

    				<div style="position: relative;" id="lisc&cert" class="row">
      				<h4><b>Liscense and Certifications</b> <span id="lisc_span"  ><a href="#"><span class="glyphicon glyphicon-plus-sign" onclick="document.getElementById('modal-wrapper-lisc&cert').style.display='block'"></span></a></span></h4>

      				<?php echo $_SESSION['profile'][4]  ?>
    				</div>
  					<!-- </div> -->
			
  				</div>
  		</div>
  		<div  id="accomp_well" class="well well-lg">
  			<h3 id="accomp_head" style=""><b>Accomplishments</b></h3>
      		<hr id="accomp_hr"  style="">
  				<div class="col">
    				<!-- <div  class="row">
      				<h4>Accomplishments<span style="float: right; width: 10px; margin-right: 30px;"><a href="#"><span class="glyphicon glyphicon-plus-sign"></span></a></span></h4>
      				</div> -->
      				
    				<div style="" id="courses" class="row">
      				<h4><b>Courses </b><span id="courses_span" style=""><a href="#"><span class="glyphicon glyphicon-plus-sign" onclick="document.getElementById('modal-wrapper-course').style.display='block'"></span></a></span></h4>

      				<?php echo $_SESSION['profile'][2]  ?>
      				</div>
    				<hr style="">

    				<div style="position: relative;" id="lang" class="row">
      				<h4><b>Languages</b><span id="lang_span" style=""><a href="#"><span class="glyphicon glyphicon-plus-sign" onclick="document.getElementById('modal-wrapper-language').style.display='block'"></span></a></span></h4>

      				<?php echo $_SESSION['profile'][3]  ?>
    				</div>
    				<hr style="">

    				
  					<!-- </div> -->
			
      			</div>
  		</div>
  		<div id="skills_well" class="well well-lg">
  				<div class="col">
    				<div id="skills" class="row">

      				<h4><b>Add Skills </b><span id="skills_span" style=""><a href="#"><span class="glyphicon glyphicon-plus-sign" onclick="document.getElementById('modal-wrapper-skills1').style.display='block'"></span></a></span></h4>

      				<?php echo $_SESSION['profile'][6]  ?>
      				</div>
      			</div>
  		</div>
  	
	</div>

   
</div>


<div id="modal-wrapper-skills1" class="modal">
	      				<!-- <form style="animation: zoom 0.6s" class="modal-content" name="exp_form" action="javascript:validate_exp_form()"
	      				accept-charset="utf-8"> -->
	      				<form  class="modal-content form" name="skills1_form" method="POST" action="../controller/addProfileController.php"
	      				accept-charset="utf-8">
			      				<div class="container">
			      					 <span onclick="document.getElementById('modal-wrapper-skills1').style.display='none'" class="close" >&times;</span>
								<label for =""><b>Skill 1</b></label><br />
								<input maxlength="30" id="skill1" type="text" name="skill1" required pattern="[A-Za-z0-9 ]+" placeholder="Ex: Machine Learning" ><br /><br />

								<label for =""><b>Skill 2</b></label><br />
								<input maxlength="30" id="skill2" type="text" name="skill2" required pattern="[A-Za-z0-9 ]+" placeholder="" ><br /><br />

								<label for =""><b>Skill 3</b></label><br />
								<input maxlength="30" id="skill3" type="text" name="skill3" required pattern="[A-Za-z0-9 ]+" placeholder=""><br /><br />

								<label for =""><b>Skill 4</b></label><br />
								<input maxlength="30" id="skill4" type="text" name="skill4" required pattern="[A-Za-z0-9 ]+" placeholder="" ><br /><br />

									
								<label for =""><b>Skill 5</b></label><br />
								<input maxlength="30" id="skill5" type="text" name="skill5" required pattern="[A-Za-z0-9 ]+" placeholder="" ><br /><br />

									
								<label for =""><b>Skill 6</b></label><br />
								<input maxlength="30" id="skill6" type="text" name="skill6" required pattern="[A-Za-z0-9 ]+" placeholder="" ><br /><br />

								<label for =""><b>Skill 7</b></label><br />
								<input maxlength="30" id="skill7" type="text" name="skill7" required pattern="[A-Za-z0-9 ]+" placeholder="" ><br /><br />

								<label for =""><b>Skill 8</b></label><br />
								<input maxlength="30" id="skill8" type="text" name="skill8" required pattern="[A-Za-z0-9 ]+" placeholder=""><br /><br />

									
									
							      	<button  type="submit" class="my_button" name='skill1_btn'>Upload</button>
								</div> 
			    				
	    				</form>
 </div>


<!-- Add expereince -->
<div id="modal-wrapper-experience" class="modal">
	      				<!-- <form style="animation: zoom 0.6s" class="modal-content" name="exp_form" action="javascript:validate_exp_form()"
	      				accept-charset="utf-8"> -->
	      				<form  class="modal-content form" name="exp_form" method="POST" action="../controller/addProfileController.php"
	      				accept-charset="utf-8">
			      				<div class="container">
			      					 <span onclick="document.getElementById('modal-wrapper-experience').style.display='none'" class="close" >&times;</span>
									<label for ="title"><b>Title</b></label><br />
									<input maxlength="30" id="title" type="text" name="title" placeholder="Ex: Manager" required pattern="[A-Za-z ]+" required><br /><br />

									<label for ="company"><b>Company</b></label><br />
									<input maxlength="30" id="company" type="text" name="company" placeholder="Ex: Microsoft" required pattern="[A-Za-z0-9 ]+" required><br /><br />

									<label for ="location"><b>Location</b></label><br />
									<input maxlength="30" id="location" type="text" name="location" placeholder="Ex: London, United Kingdom" required pattern="[A-Za-z ]+" required><br /><br />

									<label for ="from_year"><b>From Year</b></label><br />
									<input id="exp_from_year" type="date" name="exp_from_year" placeholder="MM/DD/YYYY" required><br /><br />

									<label for ="to_year"><b>To Year(or expected)</b></label><br />
									<input id="exp_to_year" type="date" name="exp_to_year" placeholder="MM/DD/YYYY" required><br /><br />

									<label for ="industry"><b>Industry</b></label><br />
									<input maxlength="30" id="industry" type="text" name="industry" placeholder=""><br /><br />

									<!-- <label for ="headline"><b>Headline</b></label><br /> -->
									<!-- <textarea id="headline" rows="4" cols="50">
									
									</textarea> <br /><br /> -->
									<div class="text_size" style=""  class="form-group">
									      <label for="comment">Headline:</label>
									      <textarea maxlength="200" class="form-control" rows="4" cols="950" id="headline" name="headline"></textarea>
    								</div>
									<!-- <label for ="Description"><b>Description</b></label><br /> -->
									<!-- <textarea id="description" rows="4" cols="50">
									
									</textarea>  -->
									<div  class="text_size" style="" class="form-group">
									      <label for="comment">Description:</label>
									      <textarea  maxlength="200" class="form-control" rows="4" cols="50" id="exp_description" name="exp_desc"></textarea>
    								</div>
									<br /><br />

							      	<button  type="submit" class="my_button" name='exp_btn'>Upload</button>
								</div> 
			    				
	    				</form>
 </div>
 <!--  Add Education form pop up -->
 <div id="modal-wrapper-education" class="modal">
	      				<form method="POST" class="modal-content form" name="edu_form" action="../controller/addProfileController.php">
			      				<div class="container">
			      					 <span onclick="document.getElementById('modal-wrapper-education').style.display='none'" class="close" >&times;</span>
									<label for ="school"><b>School</b></label><br />
									<input  maxlength="30" id="school" type="text" name="school" placeholder="Ex: Boston University" required pattern="[A-Za-z ]+" required><br /><br />

									<label for ="from_year"><b>From Year</b></label><br />
									<input id="edu_start_date" type="date" name="edu_from_year" placeholder="MM/DD/YYYY" required><br /><br />

									<label for ="to_year"><b>To Year(or expected)</b></label><br />
									<input id="edu_end_date" type="date" name="edu_to_year" placeholder="MM/DD/YYYY" required><br /><br />

									<label for ="Degree"><b>Degree</b></label><br />
									<input  maxlength="30" id="degree" type="text" name="degree" placeholder="Ex: Masters" required pattern="[A-Za-z ]+" required><br /><br />

									<label for ="Field"><b>Field of Study</b></label><br />
									<input  maxlength="30" id="field" type="text" name="studyField" placeholder="Ex: Computer Science" required pattern="[A-Za-z ]+" required><br /><br />

									<label for ="Grade"><b>Grade</b></label><br />
									<input id="grade" type="number" min="1" max="4" name="grade" placeholder="" required><br /><br />


								
									<div class="text_size" style="" class="form-group">
									      <label for="comment">Activities and Socities</label>
									      <textarea  maxlength="200" class="form-control" rows="4" cols="50" id="activities" name="activities"></textarea>
    								</div>

									<div class="text_size" style="" class="form-group">
									      <label for="comment">Semester Projects Description</label>
									      <textarea maxlength="200" class="form-control" rows="4" cols="50" id="description" name="edu_desc"></textarea>
    								</div>


							      	<button type="submit" class="my_button" name="edu_btn" >Upload</button>

								</div> 
			    				
	    				</form>
    				</div>

<!--  Add liscence and certifications form pop up -->
 <div id="modal-wrapper-lisc&cert" class="modal">
	      				<form method="POST" class="modal-content form" name="lisc_form" action="../controller/addProfileController.php" accept-charset="utf-8">
			      				<div class="container">
			      					 <span onclick="document.getElementById('modal-wrapper-lisc&cert').style.display='none'" class="close">&times;</span>
									<label><b>Name</b></label><br />
									<input  maxlength="30" id="lisc_name" type="text" name="lisc_name" placeholder="Ex: Intro to Computer Science" required pattern="[A-Za-z ]+" required><br /><br />


									<label for =""><b>Issuing Organization</b></label><br />
									<input maxlength="30" id="issue_org" type="text" name="issuing_organization" placeholder="Ex: DataCamp" required pattern="[A-Za-z ]+" required><br /><br />

									<label for ="from_year"><b>Issue Date </b></label><br />
									<input id="lisc_from_year" type="date" name="lisc_from_year" placeholder="(MM/DD/YYYY)" required><br /><br />

									<label for ="to_year"><b>Expiration Date </b></label><br />
									<input id="lisc_to_year" type="date" name="lisc_to_year" placeholder="(MM/DD/YYYY)" required><br /><br />


									<label for =""><b>Credential Id</b></label><br />
									<input maxlength="30" id="cred_id" type="text" name="credential_id" placeholder="" required><br /><br />

									<label for =""><b>Credential URL</b></label><br />
									<input maxlength="30" id="cred_url" type="text" name="credential_url" placeholder=""><br /><br />



							      	<button type="submit"; class="my_button" name="lisc_btn">Upload</button>

								</div> 
			    				
	    				</form>
</div>
  <!-- add course -->
<div id="modal-wrapper-course" class="modal">
	      				<form  method="POST"  class="modal-content form" name="course_form" action="../controller/addProfileController.php" accept-charset="utf-8">
			      				<div class="container">
			      					 <span onclick="document.getElementById('modal-wrapper-course').style.display='none'" class="close">&times;</span>
									<label><b>Course name</b></label><br />
									<input maxlength="30" id="course_name" type="text" name="course_name" placeholder="Ex: Data Structures" required pattern="[A-Za-z ]+" required><br /><br />


									<label><b>Course number</b></label><br />
									<input maxlength="10" id="course_number" type="text" name="course_number" placeholder="Ex: CS-403" required pattern="[A-Za-z]{1,4}-[0-9]{1,7}" required><br /><br />

									
									<label><b>Associated with</b></label><br />
									<input maxlength="30" id="course_association" type="text" name="course_association" required pattern="[A-Za-z ]+" placeholder=""><br /><br />


							      	<button type="submit"; class="my_button" name="course_btn" >Upload</button>

								</div> 
			    				
	    				</form>
</div>


<!-- add language -->
<div id="modal-wrapper-language" class="modal">
	      				<form method="POST" class="modal-content form" name="lang_form" action="../controller/addProfileController.php" accept-charset="utf-8">
			      				<div class="container">
			      					 <span onclick="document.getElementById('modal-wrapper-language').style.display='none'" class="close">&times;</span>
									<label><b>Language</b></label><br />
									<input  maxlength="30" id="language" type="text" name="language" required pattern="[A-Za-z]+"  placeholder="Ex: English" required><br /><br />


									<!-- <label for =""><b>Proficiency</b></label><br />
									<input id="proficiency" type="text" name="proficiency" placeholder="" ><br /><br /> -->
									<label><b>Proficiency</b></label><br />
									<select id="lang_proficiency" name="lang_proficiency">
										<option>Beginner</option>
										<option>Proficiency</option>
										<option>Expert</option>
										<option>A1</option>
										<option>A2</option>
										<option>B1</option>
										<option>B2</option>
										<option>C1</option>
									</select>

									
							      	<button type="submit"; class="my_button" name="lang_btn">Upload</button>

								</div> 
			    				
	    				</form>
</div>



<!-- add skills -->
<!-- <div id="modal-wrapper-skills" class="modal">
						<h1>Add Skills</h1>
	      				<form  style="animation: zoom 0.6s" class="modal-content" action="">
			      				<div class="container">
			      					 <span onclick="document.getElementById('modal-wrapper-skills').style.display='none'" class="close">&times;</span>
			      					 
									<label for ="skills"><b>Skills</b></label><br />
									
									<div id="skills_search" style="width: 350px; height:100px; border-right: 30px "></div>

									<div>
									<button class="skill_button" value='C++' onclick="add_skills_inSearchBar(this);">C++</button>
									<button class="skill_button" value='Javascript' onclick="add_skills_inSearchBar(this);">Javascript</button>
									<button class="skill_button" value='Ruby' onclick="add_skills_inSearchBar(this);">Ruby</button>
									
									<button class="skill_button" value='HTML' onclick="add_skills_inSearchBar(this);">HTML</button>
									</div>
									<div>
									<button class="skill_button" value='Machine Learning' onclick="add_skills_inSearchBar(this);">Machine Learning</button>
									<button class="skill_button" value='Microsoft Excel' onclick="add_skills_inSearchBar(this);">Microsoft Excel</button>
									</div>
									<div>
									<button class="skill_button" value='My_SQL' onclick="add_skills_inSearchBar(this);">My_SQL</button>
									
									
									<button class="skill_button" value='Entrpreneurship' onclick="add_skills_inSearchBar(this);">Entrpreneurship</button>
									<button class="skill_button" value='Visual Studio' onclick="add_skills_inSearchBar(this);">Visual Studio</button>
									<button class="skill_button" value='Spark' onclick="add_skills_inSearchBar(this);">Spark</button>
									</div>
									
									
									
																			
							      	<button value="upload" onclick="add_skills_inSearchBar(this);" onclick="document.getElementById('modal-wrapper-skills').style.display='none'" type="submit"; class="my_button" >Upload</button>

								</div> 
			    				
	    				</form>
</div>
 -->

</body>


</html>