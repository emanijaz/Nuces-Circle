<?php

require_once("DataAccessHelper.php"); 
if(!isset($_SESSION))  
    { 
        session_start(); 
    } 

class showConnection_model
{ 
	public static function getConnection()
	{
		$dbhandle=DataAccessHelper::getConnection();

		$email = $_SESSION['email']; // get current logged in person email 

		$connections_html =""; $requests_html = ""; $recomm_html="";

		// $ConnectionsArr = array();
		// $RequestsArr = array();
		$arr = array();

		$connections  = mysqli_query($dbhandle,"select * from connection WHERE uemail = '$email' ") or die("Failed to query database".mysqli_error($dbhandle));

		$connections1  = mysqli_query($dbhandle,"select * from connection WHERE friendMail ='$email'") or die("Failed to query database".mysqli_error($dbhandle));

		$requests  = mysqli_query($dbhandle,"select * from pending WHERE uemail = '$email'") or die("Failed to query database".mysqli_error($dbhandle));

		$recomm  = mysqli_query($dbhandle,"SELECT * FROM `Users` WHERE email != '".$email."' ") or die("Failed to query database".mysqli_error($dbhandle));



//		echo '<script>alert("'.$connections.'")</script>';
		$count = 0;
		$traverse_col = array();
		$traverse_col[0] = 'friendMail';
		$traverse_col[1] = 'uemail';
		$conn_arr = array();
		$conn_arr[0] = $connections;
		$conn_arr[1] = $connections1;
		if ($conn_arr[0] ->num_rows > 0 || $conn_arr[1] ->num_rows > 0 ) {  // getting expereince content from db 
			
			while ($count<2) {
				
			

			$numrow=$conn_arr[$count]->num_rows ;

			while($numrow!=0)
    		{
				$row1=mysqli_fetch_array($conn_arr[$count]);

			//	echo '<script>alert("'.$row1['friendMail'].'")</script>';
				$friend = mysqli_query($dbhandle,"select * from Users join experience on Users.email = experience.email where Users.email= '".$row1[$traverse_col[$count]]."';") or die("Failed to query database".mysqli_error($dbhandle));

				if($friend->num_rows > 0){  // friend has some experience added yet
						$row2=mysqli_fetch_array($friend);

						$connections_html = $connections_html.'<a style="cursor: default; color: black;" href="">
						<div class="row">
								<div class="col-md-2">
								</div>
								<div class="col-md-8">
									<div class="col-md-3">
										<div style="overflow: hidden;" class="container">
											<div style="display: inline-block;">
												<img class="img-responsive " src="'.$row2['firstName'].'.jpg" alt="pic" width="120" height="345" style="border-radius: 5px"> 

												
											</div>

										</div>
									</div>
									<div class="col-md-3">
										<div><b>'.$row2['firstName'].'  '.$row2['lastName'].'</b></div>
										<div><b>'.$row2['headline'].'</b></div>
									</div>
									<div class="col-md-3">
										<button  style="float:right;" type="button" class="btn btn-primary">Message</button>
										
									</div>
									
								</div>

								<div class="col-md-2">
								</div>
							</div>
						</a>
					
						<div style="height: 20px" class="row"></div>' ;
				
				}
				else{
					$friend = mysqli_query($dbhandle,"select * from Users where Users.email= '".$row1[$traverse_col[$count]]."';") or die("Failed to query database".mysqli_error($dbhandle));

					$row2=mysqli_fetch_array($friend);

						$connections_html = $connections_html.'<a style="cursor: default; color: black;" href="">
						<div class="row">
								<div class="col-md-2">
								</div>
								<div class="col-md-8">
									<div class="col-md-3">
										<div style="overflow: hidden;" class="container">
											<div style="display: inline-block;">
												<img class="img-responsive " src="'.$row2['firstName'].'.jpg" alt="pic" width="120" height="345" style="border-radius: 5px"> 

												
											</div>

										</div>
									</div>
									<div class="col-md-3">
										<div><b>'.$row2['firstName'].'  '.$row2['lastName'].'</b></div>
										<div><b>A Nuces Circle Member</b></div>
									</div>
									<div class="col-md-3">
										<button  style="float:right;" type="button" class="btn btn-primary">Message</button>
										
									</div>
									
								</div>

								<div class="col-md-2">
								</div>
							</div>
						</a>
					
						<div style="height: 20px" class="row"></div>' ;


				}
				//echo '<script>alert("'.$friend->num_rows.'")</script>';
				
				$numrow  = $numrow - 1;
			

			}
			$count = $count+1;
		}

			$arr[0] = $connections_html;
			
		}
		else{

			$arr[0] = "No connections to show";
		}

		$request_num = 1;
		if ($requests ->num_rows > 0) {  
			$numrow=$requests ->num_rows ;

			while($request_num <= $numrow)
    		{
				$row1=mysqli_fetch_array($requests );
				$requester = mysqli_query($dbhandle,"select * from Users join experience on Users.email = experience.email where Users.email= '".$row1['requester']."';") or die("Failed to query database".mysqli_error($dbhandle));

				if($requester->num_rows > 0)
				{  // requester has some experience added yet
						$row2=mysqli_fetch_array($requester);


				$requests_html = $requests_html.'<div  id="request_'.$request_num.'" class="row">
					<div class="col-md-2">
					</div>
					<div class="col-md-8">
						<div class="col-md-3">
							<div style="overflow: hidden;" class="container">
								<div style="display: inline-block;">
									<img class="img-responsive " src="'.$row2['firstName'].'.jpg" alt="pic" width="120" height="345" style="border-radius: 5px"> 

									
								</div>

							</div>
						</div>
						<div class="col-md-3">
							<div><b>'.$row2['firstName'].'</b></div>
							<div><b>'.$row2['headline'].'</b></div>
						</div>
						<div class="col-md-3">
							<form method="POST" action="../controller/ignoreRequestController.php">
							<input style="display:none" name="email_ignore'.$request_num.'" value="'.$row1['requester'].'"></input>
							<button  style="float:right;" name="ignore_btn'.$request_num.'" type="submit" value="submit" class="btn btn-secondary">Ignore</button>
							</form>

							<form method="POST" action="../controller/acceptRequestController.php">
							<input style="display:none" name="email_accept'.$request_num.'" value="'.$row1['requester'].'"></input>
							<button style="float: right; " name="accept_btn'.$request_num.'" type="submit" value="submit" class="btn btn-primary" >Accept</button>
							</form>
						</div>
						
					</div>

					<div class="col-md-2">
					</div>
				</div>
		
				<div style="height: 20px" class="row"></div>' ;

				}
				else{

					$requester = mysqli_query($dbhandle,"select * from Users where Users.email= '".$row1['requester']."';") or die("Failed to query database".mysqli_error($dbhandle));
					$row2=mysqli_fetch_array($requester);


				$requests_html = $requests_html.'<div  id="request_'.$request_num.'" class="row">
					<div class="col-md-2">
					</div>
					<div class="col-md-8">
						<div class="col-md-3">
							<div style="overflow: hidden;" class="container">
								<div style="display: inline-block;">
									<img class="img-responsive " src="'.$row2['firstName'].'.jpg" alt="pic" width="120" height="345" style="border-radius: 5px"> 

									
								</div>

							</div>
						</div>
						<div class="col-md-3">
							<div><b>'.$row2['firstName'].'  '.$row2['lastName'].'</b></div>
							<div><b>A Nuces Circle member</b></div>
						</div>
						<div class="col-md-3">
							<form method="POST" action="../controller/ignoreRequestController.php">
							<input style="display:none" name="email_ignore'.$request_num.'" value="'.$row1['requester'].'"></input>
							<button  style="float:right;" name="ignore_btn'.$request_num.'" type="submit" value="submit" class="btn btn-secondary">Ignore</button>
							</form>

							<form method="POST" action="../controller/acceptRequestController.php">
							<input style="display:none" name="email_accept'.$request_num.'" value="'.$row1['requester'].'"></input>
							<button style="float: right; " name="accept_btn'.$request_num.'" type="submit" value="submit" class="btn btn-primary">Accept</button>
							</form>
						</div>
						
					</div>

					<div class="col-md-2">
					</div>
				</div>
		
				<div style="height: 20px" class="row"></div>' ;
				}
				
				
				$request_num = $request_num +1;
			}
			$_SESSION['num_requests'] = $request_num;

			$arr[1] = $requests_html;
			
		}
		else{

			$arr[1] = "No invitation requests to show";
		}


		if ($recomm->num_rows > 0) {  
			$numrow=$recomm->num_rows ;

			
				
				$recomm_html = $recomm_html.'<div class="row">';
				for($i=0; $i<$numrow; $i++)
				{
					$row1=mysqli_fetch_array($recomm);
					if($i % 4 == 0 && $i != 0){
						$recomm_html = $recomm_html.'</div>';
						$recomm_html = $recomm_html.'<hr style="border-top: 1px solid #C0C0C0;"><div class="row">';
					}
					$recomm_html = $recomm_html.'<a href=""><div style="height: auto;" class="col-md-3">
						<div class="row">
							<div style="overflow: hidden;" class="container">
								<div style="display: inline-block;">
									<img class="img-responsive " src="'.$row1['firstName'].'.jpg" alt="pic" width="120" height="345" style="border-radius: 5px"> 

									
								</div>

							</div>
						</div>
						<div style="height: 10px"  class="row"></div>	
						<div class="row">
							<div style="overflow: hidden;" class="container">
								<div style="display: inline-block;">
									<div><b>'.$row1['firstName'].'   '.$row1['lastName'].'</b></div>
									
								</div>

							</div>
							
						</div>
						<div style="height: 10px"  class="row"></div>	
						<div class="row">
							<div style="overflow: hidden;" class="container">
								<div style="display: inline-block;">
								<div class="col-md-9">
									<form method="POST" name="conReq" action="../controller/sendRequestController.php">
									<input style="display:none" name="email_recomm'.$i.'" value="'.$row1['email'].'"></input>
									<button type="submit" name="'.$i.'" value="submit" class="btn btn-primary">Connect</button>
									
									</form>
								</div>
								
								</div>

							</div>
						</div>
						<div style="height: 10px"  class="row"></div>	
					</div></a>';
					
				}

				
				$_SESSION['num_recomm'] = $numrow;
				$arr[2] = $recomm_html;
		}
		else{
			$arr[2] = "No recommendations to show";
		}

		return $arr;
	} 
}

 ?>