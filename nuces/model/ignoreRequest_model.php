<?php

// defined('BASEPATH') OR exit('No direct script access allowed');

require_once("DataAccessHelper.php"); 
if(!isset($_SESSION))  
    { 
        session_start(); 
    } 



class ignoreRequest_model
{ 
	public static function removePending($request_from)
	{
		$dbhandle=DataAccessHelper::getConnection();
		$request_to = $_SESSION['email'];

		$result = mysqli_query($dbhandle,"select * from connection WHERE uemail = '$request_to' AND friendMail='$request_from' ") or die("Failed to query database".mysqli_error($dbhandle));
		if($result->num_rows > 0){

			return "connection already exist";
		}
		else{
			
			mysqli_query($dbhandle,"DELETE FROM pending WHERE uemail='$request_to' AND requester = '$request_from'") or die("Failed to query database".mysqli_error($dbhandle));

				return "invitation ignored successfully";
		
		}
		

	}

}

 ?>