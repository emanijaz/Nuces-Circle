<?php
if(!isset($_SESSION))  
    { 
        session_start(); 
        
    } 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Job Description</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../assets/jobDescription_view.css">


</head>
<body>
<div style="" id="main_container" class="container">
	<div class="row">
		<div class="col-md-12 main">

				<!-- logo of company -->
				<div class="row">
					<div class="col-md-8"></div>
					<div class="col-md-4">
						<div id="img_container" style="" class="container">
									<div id="img_div">
										<img id="img" class="img-responsive " src="connect.jpg" alt="pic" width="120" height="345"> 
									</div>

						</div>
					</div>
				</div>
				
					
					<?php echo $_SESSION['job_desc'][0]  ?>

					
					<?php echo $_SESSION['job_desc'][1]  ?>
					
		</div>
	</div>
</div>
		

</div>


</body>
</html>