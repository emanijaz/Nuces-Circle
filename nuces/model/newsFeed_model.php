<?php

// defined('BASEPATH') OR exit('No direct script access allowed');

require_once("DataAccessHelper.php"); 
if(!isset($_SESSION))  
    { 
        session_start(); 
    } 

class newsFeed_model
{ 


	public static function getNewsFeed($email)
	{
		$dbhandle=DataAccessHelper::getConnection();

		$result1 = mysqli_query($dbhandle,"select * from connection WHERE uemail = '$email' OR friendMail='$email'   ") or die("Failed to query database".mysqli_error($dbhandle));

		$prev_post = mysqli_query($dbhandle,"select * from newsFeed WHERE userEmail = '$email' ") or die("Failed to query database".mysqli_error($dbhandle));

		$newsFeed = array();
		$index = 0;
		$html="";
		$prev_post_html = "";
		if ($result1->num_rows > 0) {
			$numrow=$result1->num_rows ;

		//	echo '<script>alert('')</script>'

			while($numrow > 0)
    		{
				$row1=mysqli_fetch_array($result1);
				if($row1['uemail'] == $email){
					$friendMail = $row1['friendMail'];

				}
				else{
					$friendMail = $row1['uemail'];
				}

				$friend_info =  mysqli_query($dbhandle,"select * from Users where email='$friendMail';") or die("Failed to query database".mysqli_error($dbhandle));
				$edu = mysqli_query($dbhandle,"select * from education where email='$friendMail';") or die("Failed to query database".mysqli_error($dbhandle));
				$posts = mysqli_query($dbhandle,"select * from newsFeed where userEmail='$friendMail';") or die("Failed to query database".mysqli_error($dbhandle));
			
			
				$row2=mysqli_fetch_array($edu);
				$row3=mysqli_fetch_array($friend_info);
				$post_count = $posts->num_rows;
				echo '<script>alert('.$post_count.')</script>';
				while($post_count > 0){
					$p=mysqli_fetch_array($posts);

				$html = $html. '<div class="row" style="overflow-wrap: break-word; border-left: 1px solid #e3e3e3; border-right: 1px solid #e3e3e3; padding: 5% 10% 5% 10%; background-color: #E0E0E0;   box-shadow:4px 4px 2px #D3D3D3;  "  id="post1">
					<div class="row" id="post1_headline">
						<div  class="col-md-2">
							<div style="display: inline-block;">
										<img class="img-responsive" src="'.$row3['firstName'].'.jpg" alt="pic" width="120" height="345" style="border-radius: 5px"> 
							</div>
									
						</div>
						<div class="col-md-8" id="post1_person_desc">
								<h5><b>'.$row3['firstName'].'  '.$row3['lastName'].'</b></h5>
								<div>'.$row2['school'].'</div>
						</div>
					</div>
					<div style="padding-left: 2%;"  class="row" id="post1_desc">
						<p>'.$p['postDescription'].'</p>
						 

					</div>
					<div  >
						<button class="btn btn-default"><i class="glyphicon glyphicon-thumbs-up"></i></button>
						<span><b>Like</b></span>
						<button class="btn btn-default"><i class="glyphicon glyphicon-comment"></i></button>
						<span><b>Comment</b></span>
						<button class="btn btn-default"><i class="glyphicon glyphicon-share-alt"></i></button>
						<span><b>Share</b></span>
					</div>
				</div><hr>';


					$post_count--;

				}

				
				
				$numrow  = $numrow - 1;
			}

			$newsFeed[$index++] = $html;
			
		}
		else{

			$newsFeed[$index++] = "No news feed to show!";
		}
		if($prev_post->num_rows > 0){
			$numrow=$prev_post->num_rows ;

			while($numrow!=0)
    		{
    			$row1=mysqli_fetch_array($prev_post);

    			$user = mysqli_query($dbhandle,"select * from Users WHERE email = '$email' ") or die("Failed to query database".mysqli_error($dbhandle));
    			$row2=mysqli_fetch_array($user);

				$prev_post_html = $prev_post_html. '<div class="row" style="overflow-wrap: break-word; border-left: 1px solid #e3e3e3; border-right: 1px solid #e3e3e3; padding: 0% 10% 0% 10%; background-color: #E0E0E0; box-shadow:4px 4px 2px #D3D3D3; ">
					<div class="row" >
						<div  class="col-md-2">
									<div style="display: inline-block;">
										<img class="img-responsive" src="connect.jpg" alt="pic" width="120" height="345" style="border-radius: 5px"> 
									</div>
						</div>
						<div class="col-md-8">
								<h5><b>'.$row2['firstName'].'  '.$row2['lastName'].'</b></h5>
								<div>Student at FAST NUCES</div>
						</div>
					</div>
					<div style="padding-left: 2%;"  class="row" >
						<p>'.$row1['postDescription'].'</p>
						
					</div>
					<div >
						<button class="btn btn-default"><i class="glyphicon glyphicon-thumbs-up"></i></button>
						<span><b>Like</b></span>
						<button class="btn btn-default"><i class="glyphicon glyphicon-comment"></i></button>
						<span><b>Comment</b></span>
						<button class="btn btn-default"><i class="glyphicon glyphicon-share-alt"></i></button>
						<span><b>Share</b></span>
					</div>
				"</div><hr>";';

				$numrow--;
			}
			$newsFeed[$index++] = $prev_post_html ;

		}
		else{
			$newsFeed[$index++] = "No current statuses to show!";
		}
		return $newsFeed;
	}
}

?>