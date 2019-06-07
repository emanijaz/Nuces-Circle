<?php
if(!isset($_SESSION))  
    { 
        session_start(); 
    } 
?>

<!DOCTYPE html>
<html>
<head>
	<title>News Feed</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../assets/newsFeed.css">
<script type="text/javascript" src="../assets/newsFeed.js"></script>
  <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
<!-- or -->
<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.js"></script>


</head>

<body onload="func()">

<nav id="nav_style" class="navbar navbar-inverse">
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
	      <!-- <li><a href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=775l5172zoo4du&redirect_uri=http%3A%2F%2Flocalhost%2Fnuces%2Fcall.php&state=fooobar&scope=r_liteprofile%20r_emailaddress%20w_member_social">
				Linked in
			</a></li> -->
			<!-- <li><a href="../view/fbindex.php">
				Facebook
			</a></li> -->

			
	    
	    </ul>
    </div>
  </div>
</nav>


<div id="well_box" class="well well-lg" >
	<div  class="container">
		<div class="row">
			
			<div class="col-md-12 main">
				<div class="col-md-2"></div>
				<div class="col-md-8">
						<div class="col-md-3">
							<span>
				
							<button  onclick="document.getElementById('box-wrapper-status').style.display='block'" class="btn btn-primary"><a id="write_post"  ><span class="glyphicon glyphicon-edit"></span></a>Start a post</button>
							

							</span>
						</div>
						<div class="col-md-6"><span><em><p>Write an article on Linkedin ?</p><p>start writing a post.</p></em></span></div>
						<div class="col-md-3">
							
						</div>
						
						
					
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</div>
</div>
<hr/>

<div  class="well well-lg" >
	<!-- <div class="container"> -->
	<div class="row">
		
		<div id="posts" class="col-md-12 main" >
			<!-- <div class="col-md-2"></div> -->
			<div id="post_box" class="col-md-8">

				

				<?php echo $_SESSION["newsfeeds"][0];?>
				



			</div>
			<!-- <div class="col-md-2"></div> -->
			
		</div>  <!-- end of col-12 main -->

		<div class="col-md-12 main">
			<div class="col-md-2"></div>
				<div id="previousStatuses_box" class="col-md-8">

						<div class="row">
							<span>
						
									<button data-toggle="collapse" data-target="#previousStatuses" class="btn btn-primary"><a id="prev_post"><span id="span_prev_post"></span></a>See Previous statuses</button>
									

							</span> 
						</div>
						<hr>
						<div  id= "previousStatuses" class="collapse" class="row">
							<?php echo $_SESSION["newsfeeds"][1];?>
					
								
						</div>
						<hr>

				</div>
			<div class="col-md-2"></div>
		</div>



	</div>
<!-- 	</div>
 -->	<!--  end of container -->
	

</div>   <!-- end of well -->



<div id="box-wrapper-status" class="modal">
	      				
	    				<div class="modal-content">
	    				<form method="Post" action="../controller/postStatusController.php">
	    					<div >
	    						<textarea id="myTextField" class="form-control" name="postStatusText" rows="5" cols="10" placeholder="What are you thinking? "></textarea>
	    							<div id="submit_button_div">
	    								<button type="submit" name="postStatus_btn" class="btn btn-primary">Post</button>
	    							</div>
	    					
		    					
	    					</div> 
	    				</form>
	    					
	    				</div>
	    				
</div>


</body>
</html>