

<?php

// defined('BASEPATH') OR exit('No direct script access allowed');

require_once("DataAccessHelper.php"); 
if(!isset($_SESSION))  
    { 
        session_start(); 
    } 

class sendRequest_model
{ 
	public static function addPending($email)
	{
		$dbhandle=DataAccessHelper::getConnection();
		$sender_mail = $_SESSION['email'];

		$result = mysqli_query($dbhandle,"select * from pending WHERE uemail = '$email' AND requester='$sender_mail' ") or die("Failed to query database".mysqli_error($dbhandle));
		$check = mysqli_query($dbhandle,"select * from pending WHERE uemail = '$sender_mail' AND requester='$email' ") or die("Failed to query database".mysqli_error($dbhandle));
		$already_connected =  mysqli_query($dbhandle,"SELECT * FROM `connection` WHERE (uemail='$email' AND friendMail='$sender_mail') OR (uemail='$sender_mail' AND friendMail='$email')") or die("Failed to query database".mysqli_error($dbhandle));
		if($result->num_rows > 0){

			return "invitation request already sent";
		}
		if($check->num_rows > 0){

			return "invitation request already pending";
		}
		if($already_connected->num_rows > 0){

			return "connection already exist";
		}
		else{
			$result = mysqli_query($dbhandle,"INSERT INTO pending (uemail, requester) VALUES('$email', '$sender_mail')") or die("Failed to query database".mysqli_error($dbhandle));

			return "invitation request sent successfully";
		}
		

	}

}

?>