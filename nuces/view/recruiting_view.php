<?php
if(!isset($_SESSION))  
    { 
        session_start(); 
        
    } 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Recruiting</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	
    <script type="text/javascript" src="../assets/recruiting.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="../assets/recruiting_view.css">


</head>
<body onload="load1()">

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
        <div class="col-md-3">
  			
  			<span><div  id="J_search_widget"></div></span>
  		</div>
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
	<div class="row">
		<!-- <div class="col-md-2"></div> -->
		<div class="col-md-8"></div>
		<div class="col-md-4">
			<div class="col-md-8"><span><div id="emp_span" ><b>Looking for an employee?</b></div></span></div>
			<div class="col-md-4">
				<span>
				<a href="../view/postJob_view.php">
				<button  type="button" class="btn btn-primary"><a id="post_job_link" href="../view/postJob_view.php" target="_blank"><span id="post_job_span"  class="glyphicon glyphicon-edit"></span></a>Post Job</button></a>

				</span>
			</div>
			
		</div>
	</div>
	<hr>
	<div  id="job_list"  class="well well-lg">
		

		<?php 
		echo $_SESSION['jobs'];
		
		?>

	</div>
</div>
</body>
</html>